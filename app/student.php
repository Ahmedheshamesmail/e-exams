<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $filable = ['name','Nationalid','password'];
}
