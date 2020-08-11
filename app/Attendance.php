<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'attendance_date', 'attendance_year','attendance','edit_attandence','month'
    ];
}
