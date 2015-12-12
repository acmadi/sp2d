<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libur extends Model
{
    

    protected $table = 'libur_nasional';
     // public $incrementing  = false;
     public $timestamps = true;
     // protected $guarded = ['id', 'account_id'];

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */

     protected $fillable =[
        // 'nama_skpd',
        'tanggal_libur_nasional',
        'status',
        'tahun_id',
        'ket'
     	];
     public $kolom=[
    // 'A'=>'tahun',
       ];

      // private $rules = array(
     
      //    /*Sebenarnyaaa ==============================================================*/
     	// 'A'=>	'required|numeric|digits:4',
     	// 'B'=>	'required|numeric|digits:4',
     	// 'C'=>	'required|numeric|digits_between:1,5',
     	// 'D'=>	'required|numeric|digits_between:1,5',
     	// 'E'=>	'required|numeric|digits_between:1,5',
     	// 'F'=>	'required|numeric|digits_between:1,5',
     	// 'G'=>'required|numeric|digits_between:1,20',
     	// 'H'=>'required|numeric|digits_between:1,20',
     	// 'I'=>'required|numeric|digits_between:1,20',
     	// 'J'=>'required|numeric|digits_between:1,20',
     	// 'K'=>'required|numeric|digits_between:1,20',
     	// 'L'=>'required|numeric|digits_between:1,20',
     	// 'M'=>'required|numeric|digits_between:1,20',
     	// 'N'=>'required|numeric|digits_between:1,20',
     	// 'O'=>'required|numeric|digits_between:1,20',
     	// 'P'=>'required|numeric|digits_between:1,20',
     	// 'Q'=>'required|numeric|digits_between:1,20',
     	// 'R'=>'required|numeric|digits_between:1,20'

      //    );

     public function validate($data)
     {
         // make a new validator object
         $v = \Validator::make($data, $this->rules);
         // return the result
         return $v;

         // return $v->passes();
     }
     
     public function tahun()
      {
          return $this->belongsTo('App\Tahun','tahun_id');
      }
      public function setTanggalLiburNasionalAttribute($value)
         {  
            //tanggal-bulan-tahun
          // dd($value);
            $explode_date=explode('/', $value);
            // dd($explode_date);
            //tahun-bulan-tanggal
             $this->attributes['tanggal_libur_nasional'] = $explode_date[2].'-'.$explode_date[1].'-'.$explode_date[0];
         }
      public function getTanggalLiburNasionalAttribute($value)
         {   
            // dd($value);
          $explode_date=explode('-', $value);
            // dd($explode_date);
              return $explode_date[2].'/'.$explode_date[1].'/'.$explode_date[0];
         }

}
