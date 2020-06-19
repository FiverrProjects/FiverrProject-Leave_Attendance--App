<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'emp_id', 'enrolment_id', 'emp_name', 'nid'
    ];
}
