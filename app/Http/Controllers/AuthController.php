<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
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
}
