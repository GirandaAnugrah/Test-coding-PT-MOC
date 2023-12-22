<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(Request $request){
        // dd($request);
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|email',
            'noTelp' => 'required|numeric',
            'provinsi' => 'required|max:100',
            'kota' => 'required|max:100',
            'kecamatan' => 'required|max:100',
            'password' => 'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
        ]);
        Session::put('noTelp', $request->noTelp);
        return $this->generate_otp();
    }

    public function generate_otp(){
        try{
            $currentTime = now()->timestamp;

            $lastOTPSendTime = Session::get('lastOTPSendTime');
            $attempts = Session::get('attempts', 0);
            $noTelp = Session::get('noTelp');
            if ($lastOTPSendTime && $currentTime - $lastOTPSendTime >= 5 * 60) {
                $attempts = 0;
                Session::forget('lastOTPSendTime');
                Session::put('attempts', $attempts);
            }
            if ($attempts >= 5) {
                $message = "Generate OTP telah mencapai batas mohon tunggu beberapa saat lagi";
                return view('pages.alert');
            }
            $token = env('MY_TOKEN');
            $otp = Str::random(6);
            $response = Http::get('https://wa.ikutan.my.id/send/'.$token.'/'.$noTelp,[
                'text' => $otp
            ]);
            // dd($response);

            Session::put('lastOTPSendTime', $currentTime);
            $attempts++;
            Session::put('attempts', $attempts);
            Session::put('myOtp', $otp);

            return view('auth.validate',['otp' => $response,'error' => false]);
        }catch(\Exception $e){
            $otp = 1329839;
            return view('auth.validate',['otp' => $response,'error' => true]);
        }
    }

    public function check_otp(Request $request){
        $myOtp = Session::get('myOtp',"null");

        if($myOtp != $request->otp) return view('auth.validate',['otp' => $myOtp,'error' => true]);

        return view('welcome');
    }
}
