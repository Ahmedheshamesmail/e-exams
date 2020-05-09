<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examstructure extends Model
{
    protected $fillable=['subject_id','chapter_id','numofq','numofd','difficult_id'];
}
