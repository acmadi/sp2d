<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Jenissppd extends Model
{
    protected $table = 'jenis_sppd';
    public $timestamps = false;
    protected $fillable =[
    	'nama_jenis_sppd',
    	'nama_singkat_sppd'
    	];
        public $property;
    	public function dokumen()
    	{
    		return $this->hasMany('App\Dokumens','jenis_sppd_id');
    	}

        function scopeRekapdokumen($query,$tahun,$skpd_id='xx')
        {
            $data_x= $this->dokumen()->select(DB::raw(
                                                            'dokumen.tahun,dokumen.jenis_sppd_id,dokumen.skpd_id,
                                                                count(dokumen.no_sppd) as spm_jumlah,
                                                                sum(dokumen.spm_diajukan) as spm_nilai,
                                                                sum(dokumen.potongan) as spm_potongan,
                                                                count(dokumen.no_sppd) as sppd_jumlah,
                                                                sum(dokumen.spm_benar) as sppd_nilai,
                                                                dokumen.no_sppd,
                                                                dokumen.keterangan as x,
                                                                 SUM(CASE WHEN dokumen.status_terlambat="TELAT" THEN 1 ELSE 0 END) as keterangan

                                                                '
                                                            ))
                                                                 // COUNT(dokumen.status_terlambat='TELAT') as keterangan
                                                        // $query
                                                         ->where('tahun', '=', $tahun);
            if ($skpd_id !== 'xx') {
             $data_x->where('skpd_id', '=',$skpd_id);
            }                                         
            return $data_x->first();
                                                         // ->where('skpd_id', '=',$skpd_id)->get();
        }
        function scopeRekaptotal($query,$tahun,$skpd_id)
        {
            return $this->dokumen()->select(DB::raw(
                                                            '
                                                                count(dokumen.no_sppd) as total_spm_jumlah,
                                                                sum(dokumen.spm_diajukan) as total_spm_nilai,
                                                                sum(dokumen.potongan) as total_spm_potongan,
                                                                count(dokumen.no_sppd) as total_sppd_jumlah,
                                                                sum(dokumen.spm_benar) as total_sppd_nilai,
                                                                
                                                                '
                                                            ))
                                                        // $query
                                                         ->where('tahun', '=', $tahun)
                                                         ->where('skpd_id', '=',$skpd_id)
                                                         ->first();
                                                         // ->where('skpd_id', '=',$skpd_id)->first();
                                                         // ->where('skpd_id', '=',$skpd_id)->get();
        }
        public function xxx($dataToSet)
           {
                $this->property=$dataToSet;
           }
    
}
