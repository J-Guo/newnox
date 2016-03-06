<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //create profile for new user
    public function createProfile(Request $request){

        //get current user
        $user = Auth::user();

        //get user input
        $displayName = $request->input('displayName'); //display name
        $age = $request->input('age'); //age
        $gender = $request->input('gender'); //gender
        $file = $request->file('avatar');

        //get file extension
        $extension = $file->getClientOriginalExtension();
        //generate a unique image name based on user mobile and time
        $name = $user->mobile.time().".".$file->getClientOriginalExtension();

        //store image into storage folder
        $result = Storage::put(
            'avatars/'. $name,
            file_get_contents($request->file('avatar')->getRealPath())
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


    //show profile page for user
    public function showUserProfile(){

        //get current user
        $user = Auth::user();
        //get default storage url
        $storageURL = "..".DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."avatars";
        //get profile photo url from db
        $imageURL = $user->profile_photo;
        //generate the whole url
        $profilePhotoURL =  $storageURL.DIRECTORY_SEPARATOR.$imageURL;

        return view('user-profile')
            ->with('profilePhotoURL',$profilePhotoURL)
            ->with('displayName',$user->display_name);
    }
}
