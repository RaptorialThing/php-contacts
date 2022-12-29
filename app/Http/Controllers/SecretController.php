<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function addCredentials(Request $request) {
            
        $auth = resolve('littlegatekeeper');

        $loginSuccess = $auth->attempt($request->only([
            'username',
            'password'
        ]));


        if ($loginSuccess) {
            return redirect('/');
        }
        else{
            return back();
        }

    }
}
