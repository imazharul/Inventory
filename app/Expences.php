<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expences extends Model
{
    protected $fillable = [
        'month', 'date','year', 'amount','details'
    ];

}
