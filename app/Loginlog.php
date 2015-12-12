<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loginlog extends Model
{
	protected $table = 'login_log';
     protected $fillable=
		   [ 
		   		'users_id',
		       'action',
		       'user'
	       ];
        public function users()
           {
               return $this->belongsTo('App\User', 'users_id');
           }
}
