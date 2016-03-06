<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ImagesController extends Controller
{
    public function getProfileImage(){

        $user = Auth::user();
        $storageURL = "..".DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."avatars";
        $imageURL = $user->profile_photo;
        $url =  $storageURL.DIRECTORY_SEPARATOR.$imageURL;

        return view('test.image-test')->with('url',$url);

}
}
