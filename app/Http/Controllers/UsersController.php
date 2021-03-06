<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Bank_Detail;
use Intervention\Image\Facades\Image;
use App\Http\Requests\editBankRequest;

class UsersController extends Controller
{
    /**
     * create profile for new user
     * @return View
     */
    public function createProfile(Request $request){

        /**
         * Validate user input
         */
        $this->validate($request,[
            'displayName' => 'required',
            'avatar' => 'mimes:jpeg,bmp,png'
        ]);

        //get current user
        $user = Auth::user();

        //get user input
        $displayName = $request->input('displayName'); //display name, need santinize it before save
        $age = $request->input('age'); //age
        $gender = $request->input('gender'); //gender
        $preference = $request->input('preference'); //preference
        $public_profile = (boolean) $request->input('public_profile');//set profile public or not
        $file = $request->file('avatar');

        //if user wants to upload profile photo
        if($file){

            //get file extension
            $extension = $file->getClientOriginalExtension();
            //generate a unique image name based on user mobile and time
            $name = $user->mobile.time().".".$extension;

            $img = Image::make($file);
            $img->resize(100,100);

            //store image into storage folder through Laravel Filesystem
            $result = Storage::put(
                'avatars/'. $name,
                $img->encode()
            );

            //store image through Intervention method
//        $result = $img->save(storage_path('app/avatars/').$name);

//        dd($result);

            //if storage is successful
            if($result){
                //save user information in db
                $user->display_name = $displayName;
                $user->age = $age;
                $user->gender =$gender;
                $user->profile_photo = $name;
                $user->preference = $preference;
                $user->public_profile = $public_profile;
                $user->save();

                //redirect to main page
                return redirect('main');
            }
            else{

                return redirect()->back()->withInput()
                    ->with('message','Upload Avatar failed, please try again');

            }

        }
        //if user does not want to upload photo, give him a default one
        else{

            //save user information in db
            $user->display_name = $displayName;
            $user->age = $age;
            $user->gender =$gender;
            $user->profile_photo = "default.jpg";
            $user->preference = $preference;
            $user->public_profile = $public_profile;
            $user->save();

            //redirect to main page
            return redirect('main');

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

        /**
         * validate user input
         */
        $this->validate($request,[
            'displayName' => 'required',
            'avatar' => 'image'
        ]);

        //get current user
        $user = Auth::user();

        //get user input
        $displayName = $request->input('displayName'); //display name, need santinize it before save
        $age = $request->input('age'); //age
        $gender = $request->input('gender'); //gender
        $preference = $request->input('preference'); //preference
        $public_profile = (boolean) $request->input('public_profile');//set profile public or not
        $file = $request->file('avatar');

        //if user wants to change profile image
        if($file){
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
                $user->preference = $preference;
                $user->public_profile = $public_profile;
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
        else{

            //save user information in db
            $user->display_name = $displayName;
            $user->age = $age;
            $user->gender =$gender;
            $user->save();

            //redirect to main page
            return redirect('profile/edit')
                ->with('message','Profile Updated Successful');

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
        //get current affiliate
        $affiliate = Auth::user();
        
        if($affiliate->display_name == null){
        return redirect('aprofile/create');
        }
        else{
        return redirect('task-nearby');
        }
    }

    public function showACreateProfile(){

        return view('affiliate.create-profile');
    }

    /**
     * create profile for new affiliate
     * @return View
     */
    public function createAProfile(Request $request){

        $this->validate($request,[
            'displayName' => 'required',
            'avatar' => 'image'
        ]);

        //get current user
        $user = Auth::user();

        //get user input
        $displayName = $request->input('displayName'); //display name, need santinize it before save
        $age = $request->input('age'); //age
        $gender = $request->input('gender'); //gender
        $preference = $request->input('preference'); //preference
        $public_profile = (boolean) $request->input('public_profile');//set profile public or not
        $file = $request->file('avatar');

        //if affiliate wants to upload image
        if($file){

            //get file extension
            $extension = $file->getClientOriginalExtension();
            //generate a unique image name based on user mobile and time
            $name = $user->mobile.time().".".$extension;

            //crop the uploaded image
            $img = Image::make($file);
            $img->resize(100,100);

            //store image into storage folder
            $result = Storage::put(
                'avatars/'. $name,
                $img->encode()
            );

            //if storage is successful
            if($result){
                //save user information in db
                $user->display_name = $displayName;
                $user->age = $age;
                $user->gender =$gender;
                $user->profile_photo = $name;
                $user->preference = $preference;
                $user->public_profile = $public_profile;
                $user->save();

                //redirect to task nearby
//            return redirect('task-nearby');
                //rediret to bank detail
                return redirect('bank-detail/create');

            }
            else{

                return redirect()->back()->withInput()
                    ->with('message','Upload Avatar failed, please try again');

            }
        }
        //if affiliate does not want to upload image
        else{

            $user->display_name = $displayName;
            $user->age = $age;
            $user->gender =$gender;
            $user->profile_photo = 'default2.jpg';
            $user->preference = $preference;
            $user->public_profile = $public_profile;
            $user->save();

            //rediret to bank detail
            return redirect('bank-detail/create');

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

        /**
         * Validate user input
         */
        $this->validate($request,[
            'displayName' => 'required',
            'avatar' => 'image'
        ]);

        //get current user
        $user = Auth::user();

        //get user input
        $displayName = $request->input('displayName'); //display name, need santinize it before save
        $age = $request->input('age'); //age
        $gender = $request->input('gender'); //gender
        $preference = $request->input('preference'); //preference
        $public_profile = (boolean) $request->input('public_profile');//set profile public or not
        $file = $request->file('avatar');

        //if affiliate wants to change profile photo
        if($file){

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
            $user->preference = $preference;
            $user->public_profile = $public_profile;
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
        else{

            //save user information in db
            $user->display_name = $displayName;
            $user->age = $age;
            $user->gender =$gender;
            $user->preference = $preference;
            $user->public_profile = $public_profile;
            $user->save();

            return redirect('aprofile/edit')
                ->with('message','Profile Updated Successful');
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

       /**
        * valid affiliate input
        */
       $this->validate($request,[

           'userName' => 'required',
           'bankName' => 'required',
           'bsbNo' => 'required',
           'accountNo' => 'required',

       ]);

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
    public function editBankDetail(editBankRequest $request){

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
