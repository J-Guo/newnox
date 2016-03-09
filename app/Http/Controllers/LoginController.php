<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Services_Twilio;
use Services_Twilio_RestException;
use App\Role;
use App\User;

class LoginController extends Controller
{

    /**
     * handle users mobile number form
     * when users submit mobile number form, send a OTP to them
     * @return View
     */
    public function sendOTP(Request $request){

        //set your AccountSid and AuthToken
        $AccountSid = config('services.twilio.sid');
        $AuthToken =  config('services.twilio.token');
        $from = config('services.twilio.from_number');
        //get user type from user input
        $userType = $request->input('userType');

        //get user mobile number
        $mobileNum =$request->input("mobileNum");
        //set message body (OTP)
        $smsBody = "2222";

        //create message client
        $client = new Services_Twilio($AccountSid, $AuthToken);

        //check user mobile phone number is correct or not
        //create message and send it
        try{
            $message = $client->account->messages->sendMessage(
                $from,
                $mobileNum,
                $smsBody
            );

            return view("auth.otp")
                ->with('mobileNum',$mobileNum)
                ->with('userType',$userType);
        }
        catch(Services_Twilio_RestException $e){
            return redirect()->back()->withInput()
                ->with('message',$e->getMessage()) ;
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

        //get user mobile number
        $mobileNum =$request->input("mobileNum");
        //get user id password from user input
        $authyid = $request->input('userid');
        //get user type from user input
        $userType = $request->input('userType');

        //verify user OTP

        /**
         * Some functions here need to be done....
         */

        if($integer_otp == 2222){

            //check user exist or not
            $results = User::where('mobile',$mobileNum)->first();

            //if user does not exist, register for him
            if(empty($results )){
                $newUser = new User();
                $newUser->mobile = $mobileNum;
                $newUser->save();

            }

            //get the registered user
            $currentUser = User::where('mobile',$mobileNum)->first();
            //logging the user
            Auth::login($currentUser);

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

                //check user is new user or old user
                //some functions should be done here....

                return redirect('profile/create');
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

                //check user is new user or old user
                //some functions should be done here....

                return redirect('faq');
            }
        }
        else{
            return redirect()->back()->withInput()
                ->with('message','Please input correct Token');
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
