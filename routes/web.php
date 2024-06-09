<?php

use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/send-email',function(){
//     $data = [
//         'name' => 'Lisa',
//         'body' => 'Testing Kirim Email'
//     ];

//     Mail::to('lisayihrodh@gmail.com')->send(new SendEmail($data));

//     dd("Email Berhasil dikirim.");
// });



Route::controller(FrontEndController::class)->group(function(){
    Route::get('/', 'homePage')->name('home-page');
    Route::get('/dashboard', 'homePage')->name('dashboard');
});

    Route::get('/metodeKhitan', [FrontEndController::class,'metodeKhitan'])->name('metode-khitan');
    Route::get('/biayaKhitan', [FrontEndController::class,'biayaKhitan'])->name('biaya-khitan');
    Route::get('/lokasikhitan', [FrontEndController::class,'lokasiKhitan'])->name('lokasi-khitan');
    Route::get('/pendaftarankhitan', [FrontEndController::class,'pendaftaranKhitan'])->name('pendaftaran-khitan');
    Route::get('/konsultasikhitan', [FrontEndController::class,'konsultasiKhitan'])->name('konsultasi-khitan');
    Route::get('/edukasikhitan', [FrontEndController::class,'edukasiKhitan'])->name('edukasi-khitan');

    Route::get('/feedback', [FrontEndController::class, 'showForm'])->name('feedback.form');
    Route::post('/feedback', [FrontEndController::class, 'sendFeedback'])->name('feedback.send');


Route::prefix('klinik')->group(function(){
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function (){
        Route::get('/login', [AdminController::class,'adminlogin'])->name('admin.login');
        Route::post('/admin/login', [AdminController::class,'login'])->name('login.handler');



        Route::get('/register', [AdminController::class, 'adminregister'])->name('admin.register');
        Route::post('/create', [AdminController::class, 'createaccount'])->name('createadmin');

        Route::get('/account/verify/{token}', [AdminController::class, 'verifyaccount'])->name('admin.verify');
        Route::get('/register-success', [AdminController::class, 'registersuccess'])->name('register.success');

    });

    // Route untuk pengguna yang sudah login
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function (){
        Route::get('/home', [AdminController::class,'homeklinik'])->name('admin.home');

        Route::post('/logout', [AdminController::class,'logout'])->name('admin.logout');

        Route::get('/forgot-password', [AdminController::class, 'forgotpassword'])->name('forgot.password');
        Route::post('/send-password-reset-link', [AdminController::class, 'sendpasswordresetlink'])->name('send-password-reset-link');
        Route::get('/password/reset/{token}', [AdminController::class, 'showresetform'])->name('reset-password');
        Route::post('/reset-password-handler', [AdminController::class, 'resetpasswordhandler'])->name('reset-password-handler');

        Route::get('/adminprofile', [AdminController::class,'profileView'])->name('admin.profile');
        Route::get('/adminprofile/create', [AdminController::class, 'create'])->name('adminprofile.create');
        Route::post('/adminprofile/store', [AdminController::class, 'store'])->name('adminprofile.store');
        Route::get('/adminprofile/{adminprofile}/edit', [AdminController::class, 'edit'])->name('adminprofile.edit');
        Route::put('/adminprofile/{adminprofile}/update', [AdminController::class, 'update'])->name('adminprofile.update');
        Route::delete('/adminprofile/{adminprofile}/destroy', [AdminController::class, 'destroy'])->name('adminprofile.destroy');

        Route::get('/admin/metode', [AdminController::class, 'metode'])->name('admin.metode');
        Route::get('/adminmetode/{adminmetode}/edit', [AdminController::class, 'editmetode'])->name('adminmetode.edit');
        Route::put('/adminmetode/{adminmetode}/update', [AdminController::class, 'updatemetode'])->name('adminmetode.update');
        Route::delete('/adminmetode/{adminmetode}/destroy', [AdminController::class, 'destroymetode'])->name('adminmetode.destroy');

        Route::get('/doctors', [AdminController::class, 'doctors'])->name('admin.doctors');
        Route::get('/doctors/create', [AdminController::class, 'createdoctor'])->name('doctors.create');
        Route::post('/doctors', [AdminController::class, 'storedoctor'])->name('doctors.store');
        Route::get('/doctors/{id}/edit', [AdminController::class, 'editdoctor'])->name('doctors.edit');
        Route::put('/doctors/{id}', [AdminController::class, 'updatedoctor'])->name('doctors.update');
        Route::delete('/doctors/{id}', [AdminController::class, 'destroydoctor'])->name('doctors.destroy');


        Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
        Route::get('/services/create', [AdminController::class, 'createservices'])->name('services.create');
        Route::post('/services', [AdminController::class, 'storeservices'])->name('services.store');
        Route::get('/services/{id}/edit', [AdminController::class, 'editservices'])->name('adminservices.edit');
        Route::post('/services/{id}', [AdminController::class, 'updateservices'])->name('services.update');
        Route::delete('/services/{id}', [AdminController::class, 'destroyservices'])->name('services.destroy');


        Route::get('/pendaftar', [AdminController::class, 'pendaftar'])->name('admin.pendaftar');
        Route::delete('/pendaftar/{id}', [AdminController::class, 'destroyRegistrant'])->name('hapus.pendaftar');



    });

});

Route::prefix('publik')->group(function () {
        Route::get('/home', [UserController::class,'homeuser'])->name('user.home');

        Route::get('/login', [UserController::class,'loginuser'])->name('user.login');
        Route::post('/login/user', [UserController::class,'userlogin'])->name('login.userhandler');

        Route::post('/logout', [UserController::class,'userlogout'])->name('user.logout');

        Route::get('/register', [UserController::class,'userRegister'])->name('user.register');
        Route::post('/register/create', [UserController::class,'userRegisterCreate'])->name('user-createacc');

        // Rute untuk daftar klinik dan detail klinik
        Route::get('/clinics', [UserController::class, 'listClinics'])->name('user.clinics');
        Route::get('/clinics/{id}', [UserController::class, 'clinicDetails'])->name('user.clinic.details');
        Route::get('/clinic/{id}profile', [UserController::class, 'clinicProfile'])->name('user.clinic.profile');
        Route::get('/clinic/{id}/doctors', [UserController::class, 'clinicDoctors'])->name('user.clinic.doctors');
        Route::get('/clinic/{id}/services', [UserController::class, 'clinicServices'])->name('user.clinic.services');
        Route::get('/clinic/{id}/methods', [UserController::class, 'clinicMethods'])->name('user.clinic.methods');

        Route::get('/profile', [UserController::class, 'userprofile'])->name('user.profile');

        Route::get('/panduan-daftar', [UserController::class, 'panduan'])->name('user.panduan');

        Route::get('/daftar-layanan-khitan', [UserController::class, 'daftarkhitan'])->name('user.daftar');
        Route::post('/daftar-pelayanan-khitan', [UserController::class, 'daftarPelayanan'])->name('daftar-pelayanan-khitan');
        Route::get('/rincian-pendaftaran/{id}', [UserController::class, 'showRincian'])->name('user.rincian');





    });


