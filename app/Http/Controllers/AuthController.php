<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $user = new User([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $save = $user->save();

        if ($save) {
            return redirect('/');
        } else {
            return redirect()->back();
        }
    }

    public function loginView() {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }else{
            return redirect()->back()->withErrors(['msg' => 'Username atau password SALAH!']);
        }
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
