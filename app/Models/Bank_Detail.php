<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank_Detail extends Model
{
    protected  $table = "bank_details";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'affiliate', 'bank_name', 'bsb','account_no','status',
    ];


}
