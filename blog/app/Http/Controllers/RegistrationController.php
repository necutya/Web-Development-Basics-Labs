<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register() {
        return view("auth.register");
    }

    public function check_register(Request $req) {
        $this->validate($req, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed'
        ]);

        $user_data = array(
            'name' => $req->get('name'),
            'email' => $req->get('email'),
            'password' =>  \Hash::make($req->get('password'))
        );

        \DB::table('users')->insert($user_data);

        return redirect('login')->with('msg', 'You have been successfully register. Now, you can login.');
    }
}
