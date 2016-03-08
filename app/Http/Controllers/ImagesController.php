<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{

    /**
     * handle images request
     * @return Response
     */
    public function getAvatar($imageName){

        $avatarPath = "app/avatars";

        //set the image url based on image name
        $imageURL = storage_path("app/avatars/{$imageName}");

        return Image::make($imageURL)->response();

    }


    public function getProfileImage(){

        $user = Auth::user();
        $storageURL = "..".DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."avatars";
        $imageURL = $user->profile_photo;
        $url =  $storageURL.DIRECTORY_SEPARATOR.$imageURL;

        return view('test.image-test')->with('url',$url);

}
}
