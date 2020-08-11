<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name','email','type','shop','phone','bankname','bankbranch','bankholder','banknumber','city', 'address', 'photo','status'
    ];
}