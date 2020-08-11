<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emplyee extends Model
{
    protected $fillable = [
        'name', 'email','n_id', 'phone','experience', 'salary', 'vacation','city', 'address', 'photo','status'
    ];
}
