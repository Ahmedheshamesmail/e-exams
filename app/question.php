<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
   protected $fillable=['text','answer_id'];
}
