<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User_Review extends Model
{
    protected  $table = "user_reviews";

    protected $fillable=[
        'comments',
    ];
}
