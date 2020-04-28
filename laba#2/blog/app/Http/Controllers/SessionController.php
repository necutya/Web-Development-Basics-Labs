<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function check_login(Request $req) {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        $user_data = array(
            'email' => $req->get('email'),
            'password' =>  $req->get('password')
        );


        if(\Auth::attempt($user_data)) {
            return redirect('home')->with('msg', 'You have been successfully login');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }
    public function logout() {
        \Auth::logout();
        return redirect('home');
    }
}
