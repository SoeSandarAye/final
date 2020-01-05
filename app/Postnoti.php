<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postnoti extends Model
{
    //
      protected $fillable = [
        'postid', 'userid', 'noti',
    ];
}
