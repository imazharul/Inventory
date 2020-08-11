<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email','shopname', 'phone','bank_name', 'bank_branch', 'bank_holder','city', 'address', 'photo','bank_number','status'
    ];
}
