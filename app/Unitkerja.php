<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unitkerja extends Model
{
    protected $table = 'unit_kerja';
     public $timestamps = false;
       protected $fillable =[
     	'skpd_id',
     	'nama_unit_kerja',
     	'nama_singkat_unit_kerja'
     	];

    // public function comments()
    //  {
    //      return $this->hasMany('App\Comment');
    //      //or
    //      return $this->hasMany('App\Comment', 'foreign_key');
    // 	//or
    //      return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    //  }
    
     //inverse comment < kepunyaan / dimiliki oleh post  on => comment class 
      public function skpd()
        {
            return $this->belongsTo('App\Skpd','skpd_id');
            //or 
             // return ->belongsTo('App\Post', 'foreign_key');
             // or 
             // return ->belongsTo('App\Post', 'foreign_key', 'other_key');
        }
        public function dokumens()
         {
             return $this->hasMany('App\Dokumens','unit_kerja_id');
             //or
            //  return $this->hasMany('App\Comment', 'foreign_key');
            // //or
            //  return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
         }
    //retrieve data 1-n
    // $comments = App\Post::find(1)->comments;
    
    // foreach ($comments as $comment) {
        //
    // }
    //or jadinya 1-1
    // $comment = App\Comment::find(1);
    
    // echo $comment->post->title;
    //retrieve data with constraint post has many < comment where 1-n
     // = App\Post::find(1)->comments()->where('title', 'foo')->first();
    
}
