<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['_token', 'photo', 'first_name', 'last_name', 'sex_id'];
}
