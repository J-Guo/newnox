<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Bank_Detail;

class UsersController extends Controller
{
    /**
     * create profile for new user
     * @return View
     */
    public function createProfile(Request $request){

        //get current user
        $user = Auth::user();

        //get user input
        $displayName = $request->input('displayName'); //display name, need santinize it before save
        $age = $request->input('age'); //age
        $gender = $request->input('gender'); //gender
        $file = $request->file('avatar');

        //get file extension
        $extension = $file->getClientOriginalExtension();
        //generate a unique image name based on user mobile and time
        $name = $user->mobile.time().".".$extension;

        //store image into storage folder
        $result = Storage::put(
            'avatars/'. $name,
            file_get_contents($file->getRealPath())
        );

        //if storage is successful
        if($result){
            //save user information in db
            $user->display_name = $displayName;
            $user->age = $age;
            $user->gender =$gender;
            $user->profile_photo = $name;
            $user->save();

            //redirect to main page
            return redirect('main');
        }
        else{

            return redirect()->back()->withInput()
                ->with('message','Upload Avatar failed, please try again');

        }

        //get the url from storage
        //$url = "../storage/app/avatars".DIRECTORY_SEPARATOR."/php2A76.tmp.png";

       // return view('test.image-test')->with('url',$url);
        //return response()->file($url);
       // dd(storage_path('app/avatars'));
        //dd( File::exists(storage_path('app/avatars'),'php2A76.tmp.png'));
        //dd($result);
    }

    /**
     * show profile page for existing user
     * @return View
     */
    public function showUserProfile(){

        //get current user
        $user = Auth::user();
        //get profile photo url from db
        $imageURL = $user->profile_photo;

        return view('user-profile')
            ->with('imageURL',$imageURL)
            ->with('displayName',$user->display_name);
    }

    /**
     * show edit profile page for existing user
     * @return View
     */
    public function showEditProfile(){

        $user = Auth::user();

        return view('edit-profile')->with('user',$user);
    }

    /**
     * edit profile page for user
     * @return View
     */
    public function editProfile(Request $request){

        //get current user
        $user = Auth::user();

        //get user input
        $displayName = $request->input('displayName'); //display name, need santinize it before save
        $age = $request->input('age'); //age
        $gender = $request->input('gender'); //gender
        $file = $request->file('avatar');

        //get file extension
        $extension = $file->getClientOriginalExtension();
        //generate a unique image name based on user mobile and time
        $name = $user->mobile.time().".".$extension;

        //store image into storage folder
        $result = Storage::put(
            'avatars/'. $name,
            file_get_contents($file->getRealPath())
        );

        //if storage is successful
        if($result){
            //save user information in db
            $user->display_name = $displayName;
            $user->age = $age;
            $user->gender =$gender;
            $user->profile_photo = $name;
            $user->save();

            //redirect to main page
            return redirect('profile/edit')
                ->with('message','Profile Updated Successful');
        }
        else{
            return redirect()->back()->withInput()
                ->with('message','Upload Avatar failed, please try again');
        }


    }



    /*
     |--------------------------------------------------------------------------
     | Affiliate Parts
     |--------------------------------------------------------------------------
     */


    //show profile page for affiliate
    public function showAProfile(){

        //get current user
        $user = Auth::user();
        //get profile photo url from db
        $imageURL = $user->profile_photo;

        return view('affiliate.profile')
            ->with('imageURL',$imageURL)
            ->with('displayName',$user->display_name);
    }

    /**
     * handle begin task request for affiliate
     * if affiliate is new, show profile create page
     * else show task nearby page
     * @return View
     */
    public function beginTask(){

        /*
         * some functions should be done here
         * to check affiliate is new or not
         * if affiliate already has a profie as user
         * the create profile page will not be shown
         */

        if(true){
        return view('affiliate.create-profile');
        }
        else{
        return redirect('task-nearby');
        }
    }

    /**
     * create profile for new affiliate
     * @return View
     */
    public function createAProfile(Request $request){

        //get current user
        $user = Auth::user();

        //get user input
        $displayName = $request->input('displayName'); //display name, need santinize it before save
        $age = $request->input('age'); //age
        $gender = $request->input('gender'); //gender
        $file = $request->file('avatar');

        //get file extension
        $extension = $file->getClientOriginalExtension();
        //generate a unique image name based on user mobile and time
        $name = $user->mobile.time().".".$extension;

        //store image into storage folder
        $result = Storage::put(
            'avatars/'. $name,
            file_get_contents($file->getRealPath())
        );

        //if storage is successful
        if($result){
            //save user information in db
            $user->display_name = $displayName;
            $user->age = $age;
            $user->gender =$gender;
            $user->profile_photo = $name;
            $user->save();

            //redirect to task nearby
            return redirect('task-nearby');
        }
        else{

            return redirect()->back()->withInput()
                ->with('message','Upload Avatar failed, please try again');

        }
    }

    /**
     * show edit profile page for existing affiliate
     * @return View
     */
    public function showEditAProfile(){

        $user = Auth::user();

        return view('affiliate.edit-profile')->with('user',$user);
    }

    /**
     * edit profile page for affiliate
     * @return View
     */
    public function editAProfile(Request $request){

        //get current user
        $user = Auth::user();

        //get user input
        $displayName = $request->input('displayName'); //display name, need santinize it before save
        $age = $request->input('age'); //age
        $gender = $request->input('gender'); //gender
        $file = $request->file('avatar');

        //get file extension
        $extension = $file->getClientOriginalExtension();
        //generate a unique image name based on user mobile and time
        $name = $user->mobile.time().".".$extension;

        //store image into storage folder
        $result = Storage::put(
            'avatars/'. $name,
            file_get_contents($file->getRealPath())
        );

        //if storage is successful
        if($result){
            //save user information in db
            $user->display_name = $displayName;
            $user->age = $age;
            $user->gender =$gender;
            $user->profile_photo = $name;
            $user->save();

            //redirect to main page
            return redirect('aprofile/edit')
                ->with('message','Profile Updated Successful');
        }
        else{
            return redirect()->back()->withInput()
                ->with('message','Upload Avatar failed, please try again');
        }

    }

    /**
     * show bank detail create page for affiliate
     * @return View
     */
    public function showBankDetail(){
        return view('affiliate.bank-detail');
    }

   /**
    * create bank detail for affiliate
    * @return View
   */
   public function createBankDetail(Request $request){

       //get affiliate name
       $userName = $request->input('userName');
       //get bank name
       $bankName = $request->input('bankName');
       //get bsb
       $bsbNo =  $request->input('bsbNo');
       //get account number
       $accNo = $request->input('accountNo');

       /*
        * some validations should be done here....
        */

       //create a new bank detail instance
       $bankDetail = new Bank_Detail();
       $bankDetail->affiliate = Auth::user()->id;
       $bankDetail->name = $userName;
       $bankDetail->bank_name = $bankName;
       $bankDetail->bsb =  $bsbNo;
       $bankDetail->account_no=  $accNo;
       //and save information
       $bankDetail->save();

       return redirect('task-nearby');
       //dd($accNo );
   }

    /**
     * show bank detail edit page for affiliate
     * @return View
     */
    public function showBankDetailEdit(){

        $affiliate = Auth::user();
        $bankDetail = Bank_Detail::where('affiliate',$affiliate->id)->first();

        return view('affiliate.edit-bank-detail')
               ->with('bankDetail',$bankDetail);

    }

    /**
     * edit bank detail for affiliate
     * @return View
     */
    public function editBankDetail(Request $request){

        //get affiliate name
        $userName = $request->input('userName');
        //get bank name
        $bankName = $request->input('bankName');
        //get bsb
        $bsbNo =  $request->input('bsbNo');
        //get account number
        $accNo = $request->input('accountNo');

        /*
        * some validations should be done here....
        */

        //create a new bank detail instance
        $bankDetail = Bank_Detail::where('affiliate',Auth::user()->id)->first();
        $bankDetail->name = $userName;
        $bankDetail->bank_name = $bankName;
        $bankDetail->bsb =  $bsbNo;
        $bankDetail->account_no=  $accNo;
        //and save information
        $bankDetail->save();

        return redirect('task-nearby');

    }
}
