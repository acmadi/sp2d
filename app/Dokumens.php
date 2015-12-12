<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Dokumens extends Model
{
    protected $table = 'dokumen';
    // protected $table = 'dokumen_update';
    public $timestamps = true;
    protected $fillable =[
    	'tahun',
    	'no_sppd',
    	'tgl_sppd',
    	'jenis_sppd_id',
      'skpd_id',
    	'unit_kerja_id',
      'penerima_id',
    	'penerima_pihak_lain',
    	'keperluan',
    	'no_spm',
    	'tgl_spm',
    	'spm_diajukan',
    	'potongan',
    	'spm_benar',
    	'tgl_pengantar',
    	'tgl_diterima',
    	'no_agenda',
    	'tgl_acc_kasi',
    	'tgl_acc_kabid',
      'tgl_acc_kadis',
    	'status_terlambat',
    	'keterangan',
    	'nama_dokumen',
    	'tgl_referensi',
    	'no_rak',
    	'no_boks',
    	'no_map',
      'users_id'
    	];
        function getColoumn()
        {
            return $this->fillable;
        }
        public function file()
           {
               return $this->hasMany('App\file','dokumen_id');
           }
   
      public function jenissppd()
      {
       return $this->belongsTo('App\Jenissppd','jenis_sppd_id');
      }
      public function penerima()
      {
          return $this->belongsTo('App\Penerima','penerima_id');
      }
      public function skpd()
      {
          return $this->belongsTo('App\Skpd','skpd_id');
      }
        public function unitkerja()
      {
          return $this->belongsTo('App\unitkerja','unit_kerja_id');
      }
      public function user()
      {
          return $this->belongsTo('App\User','users_id');
      }


      function scopeRekaptotal($query,$tahun,$skpd_id='xx')
      {
          $query_X = $this->select(DB::raw('
                                                              count(dokumen.no_sppd) as total_spm_jumlah,
                                                              sum(dokumen.spm_diajukan) as total_spm_nilai,
                                                              sum(dokumen.potongan) as total_spm_potongan,
                                                              count(dokumen.no_sppd) as total_sppd_jumlah,
                                                              sum(dokumen.spm_benar) as total_sppd_nilai
                                                              
                                                              '
                                                          ))
                                                      // $query
                                                       ->where('tahun', '=', $tahun);
        if ($skpd_id !=='xx') {
           $query_X->where('skpd_id', '=',$skpd_id);
        }
        return $query_X->first();
                                                       // ->where('skpd_id', '=',$skpd_id)->get();
      }
 
      public function setTglSppdAttribute($value)
         {  
            //tanggal-bulan-tahun
          // dd($value);
            $explode_date=explode('/', $value);
            // dd($explode_date);
            //tahun-bulan-tanggal
             $this->attributes['tgl_sppd'] = $explode_date[2].'-'.$explode_date[1].'-'.$explode_date[0];
         }
      public function getTglSppdAttribute($value)
         {   $explode_date=explode('-', $value);
            // dd($explode_date);
              return $explode_date[2].'/'.$explode_date[1].'/'.$explode_date[0];
         }
      public function setTglPengantarAttribute($value)
         {  
            //bulan-tanggal-tahun
            $explode_date=explode('/', $value);
            //tahun-bulan-tanggal
             $this->attributes['tgl_pengantar'] = $explode_date[2].'-'.$explode_date[1].'-'.$explode_date[0];
         }
      public function getTglPengantarAttribute($value)
         {   $explode_date=explode('-', $value);

              return $explode_date[2].'/'.$explode_date[1].'/'.$explode_date[0];
         }
      public function setTglDiterimaAttribute($value)
         {  
            //bulan-tanggal-tahun
            $explode_date=explode('/', $value);
            //tahun-bulan-tanggal
             $this->attributes['tgl_diterima'] = $explode_date[2].'-'.$explode_date[1].'-'.$explode_date[0];
         }
      public function getTglDiterimaAttribute($value)
         {   $explode_date=explode('-', $value);

              return $explode_date[2].'/'.$explode_date[1].'/'.$explode_date[0];
         }
      public function setTglAccKasiAttribute($value)
         {  
          // dd($valud);
            //bulan-tanggal-tahun
            $explode_date=explode('/', $value);
            //tahun-bulan-tanggal
             $this->attributes['tgl_acc_kasi'] = $explode_date[2].'-'.$explode_date[1].'-'.$explode_date[0];
         }
      public function getTglAccKasiAttribute($value)
         {   $explode_date=explode('-', $value);
            // dd($valud);

              return $explode_date[2].'/'.$explode_date[1].'/'.$explode_date[0];
         }
      public function setTglAccKabidAttribute($value)
         {  
            //bulan-tanggal-tahun
            $explode_date=explode('/', $value);
            //tahun-bulan-tanggal
             $this->attributes['tgl_acc_kabid'] = $explode_date[2].'-'.$explode_date[1].'-'.$explode_date[0];
         }
      public function getTglAccKabidAttribute($value)
         {   $explode_date=explode('-', $value);

              return $explode_date[2].'/'.$explode_date[1].'/'.$explode_date[0];
         }
      public function setTglAccKadisAttribute($value)
         {  
            //bulan-tanggal-tahun
            $explode_date=explode('/', $value);
            //tahun-bulan-tanggal
             $this->attributes['tgl_acc_kadis'] = $explode_date[2].'-'.$explode_date[1].'-'.$explode_date[0];
         }
      public function getTglAccKadisAttribute($value)
         {   $explode_date=explode('-', $value);

              return $explode_date[2].'/'.$explode_date[1].'/'.$explode_date[0];
         }
      public function setTglReferensiAttribute($value)
         {  
            //bulan-tanggal-tahun
            $explode_date=explode('/', $value);
            //tahun-bulan-tanggal
             $this->attributes['tgl_referensi'] = $explode_date[2].'-'.$explode_date[1].'-'.$explode_date[0];
         }
         

      public function getTglReferensiAttribute($value)
         {   $explode_date=explode('-', $value);

              return $explode_date[2].'/'.$explode_date[1].'/'.$explode_date[0];
         }
      public function setTglSpmAttribute($value)
         {  
          // dd($value);
            //bulan-tanggal-tahun
            $explode_date=explode('/', $value);
            //tahun-bulan-tanggal
             $this->attributes['tgl_spm'] = $explode_date[2].'-'.$explode_date[1].'-'.$explode_date[0];
         }
      public function getTglSpmAttribute($value)
         {   $explode_date=explode('-', $value);

              return $explode_date[2].'/'.$explode_date[1].'/'.$explode_date[0];
         }
    
}




















