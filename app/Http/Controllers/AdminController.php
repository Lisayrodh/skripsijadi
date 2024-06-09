<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Daftar;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Tambahkan ini
use App\Models\klinik_metode;
use App\Models\metode;
use App\Models\Admin;
use App\Models\AdminProfile;
use App\Models\verificationToken;
use App\Models\Doctor;
use App\Models\services;
use Illuminate\Support\Facades\DB;
use constGuard;
use constDefaults;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    // public function __construct(){
    //     $this->middleware(['auth','verified']);
    // }
    public function homeklinik()
{
    $admin_name = Auth::guard('admin')->user()->name;
    $alamat_lengkap = Session::get('alamat_lengkap', null); // Dapatkan alamat lengkap dari sesi, jika tidak tersedia, kembalikan nilai default null
    $email = Session::get('email', null);
    $whatsapp = Session::get('whatsapp', null);
    // Pastikan Anda melewatkan data ke tampilan dalam bentuk array
    $data = [
        'admin_name' => $admin_name,
        'alamat_lengkap' => $alamat_lengkap,
        'email'=> $email,
        'whatsapp' => $whatsapp
    ];

    return view('admin.home_admin', $data);
}


    public function adminlogin(Request $request){
        $data = [
            'pageTitle' => 'Klinik Login'
        ];
        return view('admin.auth.admin_login', $data);
    }


    public function login(Request $request){
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if( $fieldType == 'email'){
            $request->validate([
                'login_id' => 'required|email|exists:admins,email',
                'password' => 'required|min:5|max:15'
            ],[
                'login_id.required'=>'Email is required.',
                'login_id.email' => 'Invalid email address.',
                'login_id.exists' => 'Email is not exists in system.',
                'password.requuired' => 'Password is required.'
            ]);
        }else{
            $request->validate([
                'login_id' => 'required|exists:admins,username',
                'password' => 'required|min:5|max:15'
            ],[
                'login_id.required'=>'Email is required.',
                'login_id.exists' => 'Username is not exists in system.',
                'password.requuired' => 'Password is required.'
            ]);

        }
        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );


        if( Auth::guard('admin')->attempt($creds)) {
            // return redirect()->route('admin.home');

            if( !auth('admin')->user()->verified ){
                auth('admin')->logout();
                return redirect()->route('admin.login')->with('fail', 'Your account is not verified.
                Check in your email and click on the link we had sent in order to verify your email
                for clinic account.');
            }else{
                return redirect()->route('admin.home');
            }
        }else{
            return redirect()->route('admin.login')->withInput()->with('fail', 'Incorrect password.');
        }
    }


    public function adminregister(Request $request){

        return view('admin.auth.admin_register');
    }

    public function createaccount(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required|min:5'
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $saved = $admin->save();

        if ($saved) {
            // Generate token
            $token = base64_encode(Str::random(64));

            VerificationToken::create([
                'user_type' => 'admin',
                'email' => $request->email,
                'token' => $token
            ]);

            $actionLink = route('admin.verify', ['token' => $token]);
            $data['action_link'] = $actionLink;
            $data['admin_name'] = $request->name;
            $data['admin_email'] = $request->email;

            // Send activation link to admin email
            $mail_body = view('email-templates.admin-verify-template', $data)->render();

            $mailConfig = [
                'mail_from_email' => config('app.mail_from_email'),
                'mail_from_name' => config('app.mail_from_name'),
                'mail_recipient_email' => $request->email,
                'mail_recipient_name' => $request->name,
                'mail_subject' => 'Verify Klinik Account',
                'mail_body' => $mail_body
            ];

            if (sendEmail($mailConfig)) {
                return redirect()->route('register.success');
            } else {
                // Log error
                Log::error('Failed to send verification email to ' . $request->email);
                return redirect()->route('admin.register')->with('fail', 'Something went wrong while sending verification link.');
            }
        } else {
            return redirect()->route('admin.register')->with('fail', 'Something went wrong.');
        }
    }


    public function verifyaccount(Request $request, $token)
    {
        $verifyToken = VerificationToken::where('token', $token)->first();

        if( !is_null($verifyToken)){
            $admin = Admin::where('email', $verifyToken->email)->first();

            if( !$admin->verified ){
                $admin->verified = 1;
                $admin->email_verified_at = Carbon::now();
                $admin->save();

                return redirect()->route('admin.login')->with('success', 'Great! Your e-mail is verified.
                Login with your credentials and complete setup your clinic account');
            }else{

            }return redirect()->route('admin.login')->with('info', 'Your e-mail is already verified.
            You can now login.');
        }else{
            return redirect()->route('admin.register')->with('fail', 'Invalid Token.');
        }
    }

    public function registersuccess(Request $request){
        return view('admin.register-success');
    }

    public function forgotpassword(Request $request){
        $data = [
            'pageTitle' => 'Forgot Password'
        ];
        return view('admin.forgot-password', $data);
    }

    public function sendpasswordresetlink(Request $request){
        //validasi form
        $request->validate([
            'email'=>'required|email|exists:admins,email'
        ],[
            'email.required'=>'The :attribute is required',
            'email.email'=>'Invalid email address',
            "email.exists"=>'The :attribute is not exsist in our system'
        ]);
        //memberikan detail sendpasswordresetlink
        $admin =  Admin::where('email', $request->email)->first();
        //generate token
        $token = base64_encode(Str::random(64));
        //cek
        $oldToken = DB::table('password_reset_tokens')
                        ->where(['email'=>$admin->email,'guard'=>constGuard::ADMIN])
                        ->first();

        if ($oldToken){
            //update
            DB::table('password_reset_tokens')
            ->where(['email'=>$admin->email,'guard'=>constGuard::ADMIN])
            ->update([
                'token'=>$token,
                'created_at'=>Carbon::now()
            ]);
        }else{
            //insert new reset password token
            DB::table('password_reset_tokens')
                ->insert([
                    'email'=>$admin->email,
                    'guard'=>constGuard::ADMIN,
                    'token'=>$token,
                    'created_at'=>Carbon::now()
                ]);
            }

            $actionLink = route('reset-password',['token'=>$token, 'email'=>urlencode
            ($admin->email)]);

            $data['actionLink'] = $actionLink;
            $data['admin'] = $admin;
            $mail_body = view('email-templates.admin-forgot-email-template', $data)->render();

            $mailConfig = array(
                'mail_from_email' => config('app.mail_from_email'),
                'mail_from_name' => config('app.mail_from_name'),
                'mail_recipient_email' => $admin->email,
                'mail_recipient_name' => $admin->name,
                'mail_subject' => 'Reset Password',
                'mail_body' => $mail_body
            );

            if( sendEmail($mailConfig)){
                return redirect()->route('forgot.password')->with('success','We have e-mailed your password reset link.');

            }else{
                return redirect()->route('forgot.password')->with('fail', 'Something went wrong.');
            }

        }


    public function showresetform(Request $request, $token = null){
        //check toke
        $get_token = DB::table('password_reset_tokens')
                        ->where(['token'=>$token, 'guard'=>constGuard::ADMIN])
                        ->first();

        if ( $get_token){
            //check token
            $diffMins = Carbon::createFromFormat('Y-m-d H:i:s', $get_token->created_at)->diffInMinutes
            (Carbon::now());

            if( $diffMins > constDefaults::tokenExpiredMinutes ){
                //jika token exp
                return redirect()->route('forgot.password',['token'=>$token])->with
                ('fail', 'Token expired. Request another reset password link.');
            }else{
                return view('admin.reset-password')->with(['token'=>$token]);
            }


        }else{
            return redirect()->route('forgot.password', ['token' => $token])->with
            ('fail', 'Invalid token!, request another reset password link' );
        }
    }

    // Dalam controller
public function resetpasswordhandler(Request $request){
    // validasi form
    $request->validate([
        'new_password'=>'required|min:5|required_with:confirm_new_password|same:confirm_new_password',
        'confirm_new_password'=>'required'
    ]);

        // Cari token
        $token = DB::table('password_reset_tokens')
                    ->where(['token'=>$request->token, 'guard'=>constGuard::ADMIN])
                    ->first();

    // cek apakah token ditemukan
    if ($token) {
        // cek apakah email ada dalam token
        $admin = Admin::where('email', $token->email)->first();

        // cek apakah admin ditemukan
        if ($admin) {
            // update password
            Admin::where('email', $admin->email)->update([
                'password'=>Hash::make($request->new_password)
            ]);

            // delete token
            DB::table('password_reset_tokens')->where([
                'email'=>$admin->email,
                'token'=>$request->token,
                'guard'=>constGuard::ADMIN
            ])->delete();

            // kirim email untuk informasi perubahan password
            $data['admin'] = $admin;
            $data['new_password'] = $request->new_password;


            $mail_body = view('email-templates.admin-reset-email-template', $data);

            $mailConfig = array(
                'mail_from_email' => config('app.mail_from_email'),
                'mail_from_name' => config('app.mail_from_name'),
                'mail_recipient_email' => $admin->email,
                'mail_recipient_name' => $admin->name,
                'mail_subject' => 'Password Changed',
                'mail_body' => $mail_body
            );

            sendEmail($mailConfig);

            return redirect()->route('admin.login')->with('success', 'Done!, Your password has been changed. Use new password to login into system.');
        } else {
            // admin tidak ditemukan, tindakan yang sesuai
            return redirect()->back()->with('error', 'Admin not found.'); // atau tindakan lainnya
        }
    } else {
        // token tidak ditemukan, tindakan yang sesuai
        return redirect()->back()->with('error', 'Invalid token.'); // atau tindakan lainnya
    }
}

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('fail', 'You are logged out!');
    }

    // public function profileView(Request $request)
    // {
    //     $data['admin_name'] = Auth::guard('admin')->user()->name;
    //     return view('admin.profile_admin', $data);
    // }


///---------------------------Halaman profile -------------------------////
public function profileView()
{
    $admin = Auth::guard('admin')->user();
    $admin_name = $admin->name; // Mengambil nama admin langsung dari objek admin yang didapatkan dari Auth

    // Mengambil AdminProfile berdasarkan admin_id
    $abouts = AdminProfile::where('id_admin', $admin->id_admin)->first();

    // Periksa apakah $abouts tidak null sebelum memanggil count()
    $data_exists = !is_null($abouts);

    Session::put('alamat_lengkap', $abouts->alamat_lengkap);
    Session::put('email', $abouts->email);
    Session::put('whatsapp', $abouts->whatsapp);

    return view('admin.profile.profile_admin', [
        'data_exists' => $data_exists,
        'abouts' => $abouts,
        'admin_name' => $admin_name // Mengirimkan nama admin langsung ke view
    ]);

}



        // untuk menampilkan form membuat about baru
        public function create()
        {
            $data['admin_name'] = Auth::guard('admin')->user()->name;

            return view('admin.profile.create', $data);
        }

        public function store(Request $request)
{
    // Mendapatkan ID admin yang sedang login
    $admin = Auth::guard('admin')->user()->id_admin;

    // Validasi data yang diterima dari request
    $request->validate([
        'username' => 'required|string',
        'email' => 'required|email|unique:adminprofile,email',
        'nama_klinik' => 'required|string',
        'alamat_lengkap' => 'required|string',
        'kecamatan' => 'required|string',
        'kabupaten' => 'required|string',
        'kode_pos' => 'required|string',
        'whatsapp' => 'required|string',
        'telephone' => 'nullable|string',
        'instagram' => 'nullable|string',
        'facebook' => 'nullable|string',
        'website_klinik' => 'nullable|string',
        'tentangklinik' => 'nullable|string',
    ]);


    // Mendapatkan semua data dari request
    $data = $request->all();

    // Menambahkan ID admin ke dalam data
    $data['id_admin'] = $admin;

    // Menyimpan data ke dalam database menggunakan model AdminProfile
    AdminProfile::create($data);

    // Redirect ke halaman profile admin dengan pesan sukses
    return redirect()->route('admin.profile')
        ->with('success', 'Klinik about created successfully.');
}


    //-------------------- Method untuk menampilkan form edit yang ada------------------//
    public function edit( $adminprofile)
    {
        $admin = Auth::guard('admin')->user();
        $admin_name = $admin->name; // Mengambil nama admin langsung dari objek admin yang didapatkan dari Auth

        // Mengambil AdminProfile berdasarkan admin_id
        $abouts = AdminProfile::where('id_admin', $admin->id_admin)->first();

        return view('admin.profile.edit', [
            'profile' => $abouts,
            'user' => $admin->id_admin,
            'admin_name' => $admin_name
        ]);
    }


    //memperbarui klinik about yang ada di database
    public function update(Request $request, $id_admin)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('adminprofile')->ignore($id_admin, 'id_admin'),
            ],
            'nama_klinik' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'kode_pos' => 'required|string',
            'whatsapp' => 'required|string',
            'telephone' => 'nullable|string',
            'instagram' => 'nullable|string',
            'facebook' => 'nullable|string',
            'website_klinik' => 'nullable|string',
            'tentangklinik' => 'nullable|string',
        ]);

        // Logika untuk menentukan apakah data telah ada sebelumnya
        $dataExists = AdminProfile::where('id_admin', $id_admin)->first();

        // Jika data tidak ada, Anda bisa mengembalikan tampilan dengan pesan error atau redirect ke halaman lain
        if (!$dataExists) {
            return redirect()->back()->with('error', 'Data not found');
        }

        // Jika data ada, lanjutkan dengan proses update
        AdminProfile::where('id_admin', (int) $id_admin)->update([
            'username' => $request->username,
            'nama_klinik' => $request->nama_klinik,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'kode_pos' => $request->kode_pos,
            'whatsapp' => $request->whatsapp,
            'telephone' => $request->telephone,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'website_klinik' => $request->website_klinik,
            'tentangklinik' => $request->tentangklinik,
        ]);

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('admin.profile')
                ->with('success', 'Klinik profile updated successfully');
            }

    //menghapus klinik about dari database
    public function destroy(AdminProfile $adminprofile)
    {
        $adminprofile->delete();

        return redirect()->route('admin.profile.profile_admin')
            ->with('success', 'Klinik about deleted successfully');
    }

    //------------------------Methode--------------------------//

    public function metode()
    {
        $adminId = Auth::guard('admin')->user()->id_admin;;
        $adminprofileid = AdminProfile::where('id_admin', $adminId)->get();
        $metode = klinik_metode::where('id_adminprofile', $adminprofileid)->get();
        $admin_name = Auth::guard('admin')->user()->name;
        $dataMetode = metode::all();
        $mtd = array();
        foreach($dataMetode as $dm) {
            $hrgs = klinik_metode::where('id_metode', $dm->id_metode)->get();
            foreach($hrgs as $hrg) {
                $collectMdt = collect([
                'name' => $dm->name,
                'deskripsi' => $dm->deskripsi,
                'hrg' => $hrg->harga,
                'ket' => $hrg->keterangan

            ]);

            $mtd[] = $collectMdt;
            dd($mtd);

            }

            // return $mtd;

        }

        // echo $mtd;


        // return view('admin.metode.metode_klinik', compact('metode', 'adminId', 'admin_name', 'mtd'));
    }



    public function editmetode($id)
    {
    $adminId = Auth::guard('admin')->user()->id_admin; // Mendapatkan id admin yang sedang login
    $adminprofileid = AdminProfile::where('id_admin', $adminId)->first();
    // $metodekhitan = klinik_metode::where('id_adminprofile', '=', $adminprofileid)->first();
    $metodekhitan = klinik_metode::where('id_adminprofile', $adminprofileid->id_adminprofile)->get();
    $metodeTabel = metode::first();
    $dataMetode = metode::all();
    $admin_name = Auth::guard('admin')->user()->name;

    return view('admin.metode.edit',compact('metodekhitan', 'adminId', 'admin_name', 'metodeTabel', 'dataMetode') );
    }




    public function updatemetode(Request $request, $id)
    {
        // Mendapatkan id admin yang sedang login

        $adminId = Auth::guard('admin')->user()->id_admin;
        $adminprofile = AdminProfile::where('id_admin', $adminId)->first();

        if (!$adminprofile) {
            return redirect()->route('admin.metode.metode_klinik')->with('error', 'Admin profile not found.');
        }
        // dd($request);

        $metodekhitan = klinik_metode::where('id_adminprofile', $adminprofile->id_adminprofile)->get();
        foreach($metodekhitan as $mt) {
            $mtd = klinik_metode::where('id_adminprofile', $adminprofile->id_adminprofile)->where('id_metode', $mt['id_metode'])->first();
            // dd($mtd);
            // dd($request);
            $mtd->harga = $request['rincian_harga_'.$mt['id_metode']];
            $mtd->keterangan = $request['keterangan_'.$mt['id_metode']];

            $mtd->save();

            // $mt->where('id_adminprofile', $adminId)->where('id_metode', $request['keterangan_'.$mt['id_metode']])->save('keterangan');
        }
        // // dd($metodekhitan);


        // if (!$metodekhitan) {
        //     return redirect()->route('admin.metode.metode_klinik')->with('error', 'Metode Khitan not found.');
        // }

        // // Melakukan validasi data input
        // $request->validate([
        //     'rincian_harga' => 'required|string',
        //     'keterangan' => 'required|string',
        // ]);

        // // Memperbarui metode khitan dengan data input
        // $metodekhitan->update($request->only('rincian_harga', 'keterangan'));

        return redirect()->route('admin.metode')->with('success', 'Metode updated successfully.');
    }




    public function destroymetode($id)
    {
        $adminId = Auth::guard('admin')->id(); // Mendapatkan id admin yang sedang login
        klinik_metode::where('id_admin', $adminId)->findOrFail($id)->delete();
        return redirect()->route('admin.metode.metode_klinik')->with('success', 'Metode deleted successfully');
    }


//----------------------Doctors-------------------///

    public function doctors()
    {
        $adminId = Auth::guard('admin')->id();
        $admin_name = Auth::guard('admin')->user()->name;
        $doctors = Doctor::all();

        return view('admin.doctors.doctors', compact('adminId', 'admin_name', 'doctors'));
    }


    public function createdoctor()
{
    $adminId = Auth::guard('admin')->user()->id_admin;
    $admin_name = Auth::guard('admin')->user()->name;
    return view('admin.doctors.create', compact('adminId', 'admin_name'));
}

public function storedoctor(Request $request)
{
    $admin = Auth::user()->id_admin;
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'description' => 'required|string',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'twitter' => 'nullable|url',
        'facebook' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
    ]);

    $photoPath = $request->file('photo')->store('img/doctors', 'public');

    dd($admin);
    // Menangkap semua data dari request dan menambahkan ID admin serta path foto
    $data = $request->all();

    $data['id_admin'] = $admin;
    $data['photo'] = $photoPath;


    Doctor::create($data);

    return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil ditambahkan!');
}




public function editdoctor($id)
{
    $adminId = Auth::guard('admin')->user()->id_admin;
    $admin_name = Auth::guard('admin')->user()->name;
    $doctor = Doctor::findOrFail($id);
    return view('admin.doctors.edit', compact('adminId', 'admin_name', 'doctor'));
}

public function updatedoctor(Request $request, $id)
{
    $admin = Auth::guard('admin')->user()->id_admin;

    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'description' => 'required|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'twitter' => 'nullable|url',
        'facebook' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
    ]);

    // Ambil data dokter berdasarkan ID
    $doctor = Doctor::findOrFail($id);

    // Jika ada foto baru yang diupload, simpan foto baru
    if ($request->hasFile('photo')) {
        // Hapus foto lama
        Storage::disk('public')->delete($doctor->photo);

        // Simpan foto baru
        $photoPath = $request->file('photo')->store('img/doctors', 'public');
        $doctor->photo = $photoPath;
    }

    // Update data dokter dengan data yang baru
    $doctor->name = $request->name;
    $doctor->position = $request->position;
    $doctor->description = $request->description;
    $doctor->twitter = $request->twitter;
    $doctor->facebook = $request->facebook;
    $doctor->instagram = $request->instagram;
    $doctor->linkedin = $request->linkedin;

    // Simpan perubahan
    $doctor->save();

    return redirect()->route('admin.doctors')->with('success', 'Data dokter berhasil diperbarui!');
}

public function destroydoctor($id)
{
    $doctor = Doctor::findOrFail($id);
    $doctor->delete();

    return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil dihapus!');
}





//--------------------Services------------------//

public function services()
{
    $admin = Auth::guard('admin')->user();

    if (!$admin) {
        return redirect()->route('admin.login')->withErrors('Anda harus login sebagai admin untuk mengakses halaman ini.');
    }

    $adminId = $admin->id_admin;
    $admin_name = $admin->name;
    $dataServices = services::all(); // Pastikan model Services Anda sesuai

    return view('admin.services.services', compact('adminId', 'admin_name', 'dataServices'));
}


public function createservices()
{
    $admin = Auth::guard('admin')->user();

    if (!$admin) {
        return redirect()->route('admin.login')->withErrors('Anda harus login sebagai admin untuk mengakses halaman ini.');
    }

    $adminId = $admin->id_admin;
    $admin_name = $admin->name;

    return view('admin.services.create', compact('adminId', 'admin_name'));
}

public function storeservices(Request $request)
{
    $admin = Auth::guard('admin')->user();

    if (!$admin) {
        return redirect()->route('admin.login')->withErrors('Anda harus login sebagai admin untuk mengakses halaman ini.');
    }

    $adminId = $admin->id_admin;

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:500'
    ]);

    $data = $request->all();
    $data['id_admin'] = $adminId;

    services::create($data);

    return redirect()->route('admin.services')->with('success', 'Pelayanan berhasil ditambahkan!');
}

public function destroyservices($id)
{
    $adminId = Auth::guard('admin')->user()->id_admin; // Mendapatkan id admin yang sedang login

    // Mencari layanan berdasarkan ID dan id_admin
    $service = services::where('id_services', $id)->where('id_admin', $adminId)->first();


    if ($service) {
        // Hapus data layanan dari database
        $service->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Layanan berhasil dihapus.');
    } else {
        // Redirect kembali ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
    }
}



//--------------------Pendaftar------------------//

public function pendaftar()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.login')->withErrors('Anda harus login sebagai admin untuk mengakses halaman ini.');
        }

        $adminId = $admin->id_admin;
        $admin_name = $admin->name;

        $registrants = Daftar::with('clinic')->get(); // Mengambil semua data pendaftar beserta data klinik yang terkait


        return view('admin.pendaftar.pendaftar', compact('adminId', 'admin_name', 'registrants'));
    }

}
