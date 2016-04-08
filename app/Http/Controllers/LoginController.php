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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    /**
     * handle users mobile number form
     * when users submit mobile number form, send a OTP to them
     * @return View
     */
    public function sendOTP(Request $request){

        //set Twilio AccountSid and AuthToken
        $AccountSid = config('services.twilio.sid');
        $AuthToken =  config('services.twilio.token');
        $from = config('services.twilio.from_number');
        //get user type from user input
        $userType = $request->input('userSubmit');

        //get user mobile number
        $mobileNum =$request->input("mobileNum");
        //get current user
        $user = User::where('mobile',$mobileNum)->first();

        //if user does not exist, register for him
        if(empty($user)){
            $newUser = new User();
            $newUser->mobile = $mobileNum;
            $newUser->save();

        }

        //get the registered user
        $user= User::where('mobile',$mobileNum)->first();

        //generate a OTP for user and save it
        $otp = $this->generateOTP(); //live OTP
//        $otp = 2222;   //test OTP
        $user->otp = bcrypt($otp) ;
        $user->save();

        //set message body (OTP)
        $smsBody = 'Your Passcode is: '.$otp;

        //create message client
        $client = new Services_Twilio($AccountSid, $AuthToken);

        //check user mobile phone number is correct or not
        //create message and send it
        try{
            //use it when project goes alive
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
                ->with('message','Your Mobile Number is not correct') ;
        }

    }

    /**
     * handle users OTP form
     * Verify user OTP
     * @return View
     */
    public function verifyOTP(Request $request){

        $digits = $request->input('digit');

        //get 4 digits OTP
        $digit1 = $digits[1];
        $digit2 = $digits[2];
        $digit3 = $digits[3];
        $digit4 = $digits[4];

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

        //get the registered user
        $currentUser = User::where('mobile',$mobileNum)->first();

        /**
         * verify user OTP
         */
//        $verifyResult = ($integer_otp == 2222);
        $verifyResult = Hash::check($integer_otp, $currentUser->otp);


        if($verifyResult){

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

                if($user->display_name == null)
                return redirect('profile/create');
                else
                return redirect('main');
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

                if($user->display_name == null)
                return redirect('faq');
                else
                return redirect('task-nearby');
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

    /**
     * generate a OTP for user
     * @return int
     */
    private function generateOTP(){

        $otp = rand(1000,9999);

        return $otp;

    }

}
