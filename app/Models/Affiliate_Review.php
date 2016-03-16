<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Affiliate_Review extends Model
{
   protected $table="affiliate_reviews";

   protected $fillable =[
       'comments',
   ];
}
