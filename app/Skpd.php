<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Skpd extends Model
{
    

    protected $table = 'skpd';
     // public $incrementing  = false;
     public $timestamps = false;
     // protected $guarded = ['id', 'account_id'];

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    
     protected $fillable =[
     	'nama_skpd',
     	'nama_singkat_skpd'
     	];
     public $kolom=[
    // 'A'=>'tahun',
    // 'B'=>'kd_urusan',
    // 'C'=>'kd_bidang',
    // 'D'=>'kd_program',
    // 'E'=>'kd_kegiatan',
    // 'F'=>'kd_skpd',
    // 'G'=>'realisasi_bulan_1',
    // 'H'=>'realisasi_bulan_2',
    // 'I'=>'realisasi_bulan_3',
    // 'J'=>'realisasi_bulan_4',
    // 'K'=>'realisasi_bulan_5',
    // 'L'=>'realisasi_bulan_6',
    // 'M'=>'realisasi_bulan_7',
    // 'N'=>'realisasi_bulan_8',
    // 'O'=>'realisasi_bulan_9',
    // 'P'=>'realisasi_bulan_10',
    // 'Q'=>'realisasi_bulan_11',
    // 'R'=>'realisasi_bulan_12'
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
     public function unitkerja()
      {
          return $this->hasMany('App\Unitkerja','skpd_id');
          //or
         //  return $this->hasMany('App\Comment', 'foreign_key');
         // //or
         //  return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
      }
      public function dokumens()
      {
          return $this->hasMany('App\Dokumens','skpd_id');
          //or
         //  return $this->hasMany('App\Comment', 'foreign_key');
         // //or
         //  return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
      }
      function scopeRekapdokumen($query,$tahun,$skpd_id='xx')
      {
          // $query_X = $this->dokumens()->select(DB::raw('
          //                                                     count(dokumen.no_sppd) as spm_jumlah,
          //                                                     sum(dokumen.spm_diajukan) as spm_nilai,
          //                                                     sum(dokumen.potongan) as spm_potongan,
          //                                                     count(dokumen.no_sppd) as sppd_jumlah,
          //                                                     sum(dokumen.spm_benar) as sppd_nilai,
          //                                                     dokumen.keterangan as keterangan_sppd
          //                                                     '
          //                                                 ))
          $query_X = $this->dokumens()->select(DB::raw('
                                                              count(dokumen.no_sppd) as spm_jumlah,
                                                              sum(dokumen.spm_diajukan) as spm_nilai,
                                                              sum(dokumen.potongan) as spm_potongan,
                                                              count(dokumen.no_sppd) as sppd_jumlah,
                                                              sum(dokumen.spm_benar) as sppd_nilai,
                                                              dokumen.keterangan as keterangan_sppd,
                                                               SUM(CASE WHEN dokumen.status_terlambat="TELAT" THEN 1 ELSE 0 END) as keterangan
                                                              '
                                                          ))
                                                      // $query
                                                       ->where('tahun', '=', $tahun);
        if ($skpd_id !== 'xx') {
           $query_X->where('skpd_id', '=',$skpd_id);
        }
        return $query_X->first();
                                                       // ->where('skpd_id', '=',$skpd_id)->get();
      }
     
     //  //inverse comment < kepunyaan / dimiliki oleh post  on => comment class 
     //   public function post()
     //     {
     //         return ->belongsTo('App\Post');
     //         //or 
     //          return ->belongsTo('App\Post', 'foreign_key');
     //          //or 
     //          return ->belongsTo('App\Post', 'foreign_key', 'other_key');
     //     }
     // //retrieve data 1-n
     // $comments = App\Post::find(1)->comments;
     
     // foreach ($comments as $comment) {
     //     //
     // }
     // //or jadinya 1-1
     // $comment = App\Comment::find(1);
     
     // echo $comment->post->title;
     // //retrieve data with constraint post has many < comment where 1-n
     //  = App\Post::find(1)->comments()->where('title', 'foo')->first();
}
