<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Role;

class LoginController extends Controller
{

    /**
     * handle users mobile number form
     * when users submit mobile number form, send a OTP to them
     * @return View
     */
    public function sendOTP(Request $request){

        //get user mobile number
        $mobileNum =$request->input("mobileNum");
        //get user type from user input
        $userType = $request->input('userType');

        //chech user mobile phone number is correct or not

        /**
         * Some functions here need to be done....
         */

        if(true){

        return view("auth.otp")
            ->with('mobileNum',$mobileNum)
            ->with('userType',$userType);
        }
        else{
        //mobile phone number is incorrect
        return redirect('login')->with('message','Please input correct mobile number');
        }

    }

    /**
     * handle users OTP form
     * Verify user OTP
     * @return View
     */
    public function verifyOTP(Request $request){

        //get 4 digits OTP
        $digit1 = $request->input('digit1');
        $digit2 = $request->input('digit2');
        $digit3 = $request->input('digit3');
        $digit4 = $request->input('digit4');

        //combine 4 digits OTP
        $otp = $digit1.$digit2.$digit3.$digit4;
        //convert it into integer
        $integer_otp = (int) $otp;

        //get user id password from user input
        $authyid = $request->input('userid');
        //get user type from user input
        $userType = $request->input('userType');

        //verify user OTP

        /**
         * Some functions here need to be done....
         */

        if($integer_otp == 2222){

            //register user
            Auth::loginUsingId(1);

            //redirect page depends on user type
            if($userType =="user"){

                //get current user
                $user = Auth::user();
                //if user does not have current role, attach it
                if(!$user->hasRole('user')){
                    //find current role
                    $role = Role::where('name','user')->first();
                    //attach it
                    $user->attachRole($role);
                }

                return redirect('reg-profile');
            }
            if($userType="affiliate"){

                //get current user
                $user = Auth::user();
                //if user does not have current role, attach it
                if(!$user->hasRole('affiliate')){
                    //find current role
                    $role = Role::where('name','affiliate')->first();
                    //attach it
                    $user->attachRole($role );
                }

                return redirect('faq');
            }
        }
        else{
 //           dd($request->input());
            return redirect()->back()->withInput()
                ->with('message','Please input correct Token');
//            dd($request->input());
        }


    }


    /**
     * handle users logout
     * @return View
     */
    public function handleLogout(){

        Auth::logout();
        return redirect('login');

    }
}
