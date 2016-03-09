<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sent_Offer extends Model
{
    protected  $table="sent_offers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_maker', 'price', 'date','place','status',
    ];
}
