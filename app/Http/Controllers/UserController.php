<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\UserMiddleware;
use App\Models\Admin;
use App\Models\metode;
use App\Models\Daftar;
use Carbon\Carbon;

class UserController extends Controller
{

    public function homeuser(){
        $user = Auth::guard('user')->user();
        $user_name = $user->name;

        return view('user.home_user', ['user_name' => $user_name]);
    }


    public function loginuser(Request $request){

        return view('user.auth.user_login');
    }

    public function userlogin(Request $request){
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5|max:15'
            ], [
                'login_id.required' => 'Email is required.',
                'login_id.email' => 'Invalid email address.',
                'login_id.exists' => 'Email does not exist in the system.',
                'password.required' => 'Password is required.'
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:5|max:15'
            ], [
                'login_id.required' => 'Username is required.',
                'login_id.exists' => 'Username does not exist in the system.',
                'password.required' => 'Password is required.'
            ]);
        }

        $creds = [
            $fieldType => $request->login_id,
            'password' => $request->password
        ];

        if (Auth::guard('user')->attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->withInput()->with('fail', 'Incorrect email/username or password.');
        }
    }



    public function userRegister(){
        return view('user.auth.user_register');
    } //End Method



    public function userRegisterCreate(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required|min:5'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $saved = $user->save();

        if ($saved) {
            return redirect()->route('user.login')->with('success', 'Great! Your e-mail is ready');
        } else {
            return redirect()->route('user.register')->with('fail', 'Something went wrong.');
        }
    }


    public function userlogout(Request $request)
    {
        Auth::guard('user')->logout();

        return redirect()->route('user.login')->with('fail', 'You are logged out!');
    }


    //-------------------------- list clinics  ------------------------------//

    // Metode untuk daftar klinik
    public function listClinics()
    {
        $clinics = Admin::all();
        return view('user.clinics.clinics', ['clinics' => $clinics]);
    }

    // Metode untuk detail klinik
    public function clinicDetails($id)
    {
        $clinic = Admin::findOrFail($id);
        return view('user.clinics.details', ['clinic' => $clinic]);
    }

    //---------------------- profile ------------//

    public function userprofile()
    {

        return view('user.profile.profile');
    }

    //---------------------- panduan ----------//
    public function panduan()
    {

        return view('user.panduan.panduan');
    }

    //-------------- daftar ---------------//
    public function daftarkhitan()
    {
        $clinics = Admin::all();
        return view('user.daftar.daftar',compact('clinics'));
    }

    public function daftarPelayanan(Request $request)
    {
        $user = Auth::guard('user')->user()->id_user;
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'nama_orang_tua' => 'required',
            'whatsapp' => 'required',
            'whatsapportu' => 'required',
            'alamat' => 'required',
            'klinik' => 'required|exists:admins,id',
            'riwayat_kesehatan' => 'nullable',
        ]);

        // Mendapatkan semua data dari request
        $data = $request->all();

        // Menambahkan ID user ke dalam data
        $data['id_user'] = $user;

        // Simpan data pendaftaran ke database
        Daftar::create($data);

        // Redirect ke halaman dengan rincian pendaftaran
        return redirect()->route('user.rincian', ['id_user' => $user])
                        ->with('success', 'Pendaftaran berhasil.');

    }


        // Method untuk menampilkan rincian pendaftaran
        public function showRincian($id)
        {
            // Ambil data pendaftaran berdasarkan ID
            $user = User::findOrFail($id);

            // Kirim data pendaftaran ke view
            return view('user.daftar.rincian_daftar', compact('user'));
        }


    // ------------------relasi ---------//

    public function clinicProfile($id)
    {
        $clinic = Admin::with('profile')->findOrFail($id);
    return view('user.clinics.profile', compact('clinic'));
    }

    public function clinicDoctors($id)
    {
        $clinic = Admin::with('doctors')->findOrFail($id);
        return view('user.clinics.doctors', compact('clinic'));
    }

    public function clinicServices($id)
    {
        $clinic = Admin::with('services')->findOrFail($id);
        return view('user.clinics.services', compact('clinic'));
    }

    public function clinicMethods($id)
    {
        $clinic = Admin::with('methods')->findOrFail($id);
        $dataMetode = metode::all(); // Mengambil semua data metode
        return view('user.clinics.methods', compact('clinic', 'dataMetode'));
    }
}
