<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
      protected $fillable = [
        'userid', 'friendid',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
