<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class OTPController extends Controller
{
    public function goToOTP(){return view('otp',['title'=>"OTP"]);}

    public function validatePhoneNumber(Request $req)
    {
        $attemptsKey = 'whatsapp_validation_attempts_' . $req->input('phoneNumber');
        $maxAttempts = 5;

        $currentAttempts = Cache::get($attemptsKey, 0);

        if ($currentAttempts >= $maxAttempts) {
            return redirect()->back()->withErrors(['errors'=>"To Many Attempts, Wait 5 Minutes"])->withInput($req->all());
        }


        if ($req->input('otp') == 123123){
            Cache::put($attemptsKey, $currentAttempts + 1, now()->addMinutes(5));
            User::create([
                'nama' => $req->input('nama'),
                'email' => $req->input('email'),
                'handphone' => $req->input('handphone'),
                'provinsi' => $req->input('provinsi'),
                'kabupaten_kota' => $req->input('kabupaten_kota'),
                'kecamatan' => $req->input('kecamatan'),
                'password' => bcrypt($req->input('password')),
            ]);
            return redirect('/login');
        }


        return redirect()->back()->withErrors(['errors'=>"Wrong OTP"])->withInput($req->all());
    }
}
