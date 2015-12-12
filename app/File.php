<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
     protected $fillable=
		   [ 'dokumen_id',
		       'filename',
		       'nama_baru',
		       'dir',
		       'mime',
		       'original_filename',
		       'urutan'
	       ];
        public function dokumen()
           {
               return $this->belongsTo('App\Dokumens');
           }
}
