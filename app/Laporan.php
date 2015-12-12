<?php 
namespace App;
use Illuminate\Http\Request;
use DB;
use App\Dokumens;
use App\Jenissppd;
use App\Skpd;


/**
* 
*/
class Laporan
{
	
	public $req;
	function __construct(Request $req)
	{
		$this->req=$req;
	
	}
	function tahun($awal_tahun='',$akhir_tahun='')
	{
		if($this->req->get('awal_tahun') && $this->req->get('akhir_tahun')){

		// dd($this->req->all());
			// echo "masukkkk";
			$awal_tahun=$this->req->get('awal_tahun');
			$akhir_tahun=$this->req->get('akhir_tahun');
			 $data['rows']= DB::table('dokumen')
			                     ->select(DB::raw('tahun, count(dokumen.tahun) as jumlah, SUM(dokumen.spm_benar) as spm'))
			                     // ->where('status', '<>', 1)
			                     ->whereBetween('tahun', [$awal_tahun, $akhir_tahun])
			                     ->groupBy('tahun')
			                     ->get();
		    // dd($data);
			                     return $data+$this->req->all();
		}
		
	}
	function jenis_sppd($tahun='')
	{
		if($this->req->get('tahun') ){
			$tahun=$this->req->get('tahun') ;
		     // $data['rows']= DB::table('dokumen')
		     // $results= Dokumens::with('jenissppd')
			    //                  ->select(DB::raw('tahun, count(dokumen.tahun) as jumlah, SUM(dokumen.spm_benar) as spm, jenis_sppd_id'))
			    //                  // ->where('status', '<>', 1)
			    //                  ->groupBy('jenis_sppd_id')
		 	   //                   ->where('tahun', '=', $tahun)
			    //                  ->get();
				/* get rekap data dokument======================================================================================*/
			    $jenissppd_s=Jenissppd::all();
			    $data['rows']=array();
			      foreach ($jenissppd_s as $key => $jenissppd) {
			      	// dd($jenissppd->rekapdokumen($tahun,$skpd_id)->toArray());
			      	$data['rows'][$key]=array_merge($jenissppd->toArray(), $jenissppd->rekapdokumen($tahun)->toArray());

			      }
			      /* get rekap total dokument======================================================================================*/
			      $dokumen=new Dokumens;
			      $total=$dokumen->rekaptotal($tahun)->toArray();
	
			// $data['rows']=$this->show_relasi_kolom($results);
	        return $data + $this->req->all() +  $total;
		 }
	}

	  public function show_relasi_kolom($collection='')
    {
        return $collection->each(function ($item, $key) {
             $item['nama_jenis_sppd']=$item['jenissppd']->nama_jenis_sppd;
        });
    }
    
	function jenis_skpd($tahun='')
	{
		if($this->req->get('tahun') ){
			$tahun=$this->req->get('tahun');
				/* get rekap data dokument======================================================================================*/
			    $Skpd_s=Skpd::all();
			    $data['rows']=array();
			      foreach ($Skpd_s as $key => $skpd) {
			      	$data['rows'][$key]=array_merge($skpd->toArray(), $skpd->rekapdokumen($tahun)->toArray());

			      }

			        $dokumen=new Dokumens;
			      $total=$dokumen->rekaptotal($tahun)->toArray();
			     
			     return $data + $this->req->all()  + $total;
		}
		 	
	}
		function per_skpd_tahun($tahun='',$skpd_id='')
		{	
				// dd($this->req->all());
			if($this->req->get('tahun') && $this->req->get('skpd_id') ){

				$tahun=$this->req->get('tahun');
				$skpd_id=$this->req->get('skpd_id');
				// $nama_skpd=Skpd::find($skpd_id)->toArray();
				

			    /* get data filter skpd dokument======================================================================================*/
			    $skpd=Skpd::find($skpd_id)->toArray();

				/* get rekap data dokument======================================================================================*/
			    $jenissppd_s=Jenissppd::all();
			    // dd($jenissppd_s);
			    $data['rows']=array();
			      foreach ($jenissppd_s as $key => $jenissppd) {
			      	// dd($jenissppd->rekapdokumen($tahun,$skpd_id)->toArray());
			      	$data['rows'][$key]=array_merge($jenissppd->toArray(), $jenissppd->rekapdokumen($tahun,$skpd_id)->toArray());

			      }
			      /* get rekap total dokument======================================================================================*/
			      $dokumen=new Dokumens;
			      $total=$dokumen->rekaptotal($tahun,$skpd_id)->toArray();
			     
			     return $data + $this->req->all() + $skpd + $total;
			     // return collect($data)->merge( $this->req->all())->merge( $skpd)->merge($total);
			     // dd($data);
			 }	
		}
}
	// select tahun, skpd_id, Count(dokumen.no_sppd) AS SPM_jumlah, Sum(dokumen.spm_diajukan) AS SPM_NILAI, Sum(dokumen.potongan) AS SPM_POTONGAN, Count(dokumen.no_sppd) AS SPPD_JUMLAH, Sum(dokumen.spm_benar) AS SPPD_NILAI, dokumen.no_sppd, dokumen.keterangan
 // from `dokumen` where `tahun` = '2012' and `skpd_id` = '2' group by `jenis_sppd_id`
			
// select dokumen.tahun, dokumen.jenis_sppd_id, dokumen.skpd_id, Count(dokumen.no_sppd) AS SPM_jumlah, Sum(dokumen.spm_diajukan) AS SPM_NILAI, Sum(dokumen.potongan) AS SPM_POTONGAN, Count(dokumen.no_sppd) AS SPPD_JUMLAH, Sum(dokumen.spm_benar) AS SPPD_NILAI, dokumen.no_sppd, dokumen.keterangan from `dokumen` 
// where `dokumen`.`jenis_sppd_id` in (1, 3, 4, 9) and `tahun` = 2012 and `skpd_id` = 2 GROUP BY jenis_sppd_id

// select dokumen.tahun, Count(dokumen.no_sppd) AS SPM_jumlah, Sum(dokumen.spm_diajukan) AS SPM_NILAI, Sum(dokumen.potongan) AS SPM_POTONGAN, Count(dokumen.no_sppd) AS SPPD_JUMLAH, Sum(dokumen.spm_benar) AS SPPD_NILAI, dokumen.no_sppd, dokumen.keterangan from `dokumen` 
// where `dokumen`.`jenis_sppd_id` in (?, ?, ?, ?) and `tahun` = ? and `skpd_id` = ? group by `jenis_sppd_id`


// SELECT
// jenis_sppd.*,
// dokumen.tahun, Count(dokumen.no_sppd) AS SPM_jumlah, Sum(dokumen.spm_diajukan) AS SPM_NILAI, Sum(dokumen.potongan) AS SPM_POTONGAN, Count(dokumen.no_sppd) AS SPPD_JUMLAH, Sum(dokumen.spm_benar) AS SPPD_NILAI, dokumen.no_sppd, dokumen.keterangan
// FROM
// jenis_sppd
// RIGHT JOIN dokumen
// ON jenis_sppd.id = dokumen.jenis_sppd_id
// where `dokumen`.`jenis_sppd_id` in (1, 3, 4, 9) and `tahun` = 2012 and `skpd_id` = 2 GROUP BY jenis_sppd_id