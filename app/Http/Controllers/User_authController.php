<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User_authController extends Controller
{
    public function showLogin($guard){
        return response()->view('cms.auth.login',compact('guard'));
    }

    public function Login(Request $request){

        $validator = Validator($request->all() ,[
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'

        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        if (!$validator->fails()) {
            if (Auth::guard($request->get('guard'))->attempt($credentials, $request->get('remember_me'))) {
                return response()->json(['icon' => 'success', 'title' => 'The login process succeeded'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Login failed'], 400);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }

    public function Logout(Request $request){

        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('view.login' , 'admin');
    }

}
