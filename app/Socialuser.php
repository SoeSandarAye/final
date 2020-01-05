<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socialuser extends Model
{
    //
    protected $primaryKey = 'userid';
      protected $fillable = [
        'userid', 'phone', 'dob', 'gender' , 'photo','address','status',
    ];


    public function user(){

		return $this->belongsTo('App\User');
		
	}
}
