<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class HomeController extends Controller
{
    //temporary login page for collobrator to sign in,delete it when project launches
    public function showSignin(){

        return view('auth.signin');

    }

    //temporary login page for collobrator to sign in,delete it when project launches
    public function handleSignin(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');

        //if authentication is passed
        if(Auth::attempt(['email' => $email, 'password' => $password])){

            //register a user
          //  Auth::loginUsingId(1);

            return redirect('login');
        }
        else
            return redirect('signin');


    }

    //temporary login page for collobrator to sign out,delete it when project launches
    public function handleSignout(){

        Auth::logout();
        return redirect('signin');

    }

}
