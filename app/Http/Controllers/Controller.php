<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function goToLogin(){return view('login',['title'=>"Login"]);}
    public function goToRegister(){return view('register',['title'=>"Register"]);}
    public function goToHome(){return view('index',['title'=>"Home"]);}

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'handphone' => [
                'required',
                'regex:/^[0-9]{10,14}$/'
            ],
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kecamatan' => 'required',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/'
            ],
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        return redirect('/otp')->withInput($request->all());
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }


}
