<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalMetodeKhitan;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FrontEndController extends Controller
{
    public function homePage (Request $request){
        $data = [
            'pageTitle' => 'KhitanCare'
        ];
        return view('front.pages.home', $data);
    }

    public function dashboard(Request $request){

        return view('front.pages.home');
    }

    public function metodeKhitan(Request $request) {

        $metode = GlobalMetodeKhitan::get();

        return view('front.pages.metode_khitan', ['metode' => $metode]);
    }

    public function biayaKhitan(Request $request) {

        $metode = GlobalMetodeKhitan::get();

        return view('front.pages.metode_khitan', ['metode' => $metode]);
    }

    public function lokasiKhitan(Request $request){

        return view('front.pages.lokasi_khitan');
    }

    public function pendaftaranKhitan(Request $request){

        return view('front.pages.pendaftaran_khitan');
    }

    public function konsultasiKhitan(Request $request){

        return view('front.pages.konsultasi_khitan');
    }

    public function edukasiKhitan(Request $request){

        return view('front.pages.edukasi_khitan');
    }

    public function showForm()
    {
        return view('front.pages.emails.formfeedback');
    }

    public function sendFeedback(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('khitancare@gmail.com')->send(new FeedbackMail($details));

        return redirect()->route('feedback.form')->with('success', 'Your feedback has been sent successfully.');
    }


}
