<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

use App\Dokumens;
use App\Jenissppd;
use App\Skpd;
use App\File;

use App\Tahun;
use App\Libur;

use App\Laporan;
Event::listen('illuminate.query', function($query)
{
  // echo "<pre>";
    // var_dump($query);  	
});

/*
|--------------------------------------------------------------------------
| Application Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// $user = \Auth::user();
// $user = \Sentry::findAllGroups();
// dd($user );

function easy($file='')
{
	return view('easy.layout.'.$file);
}
function easyc($file='', $id=[])
{
	return view('easy.content.'.$file, $id);
}



/* DEMO ROUTE==========================================================================================*/
// if (app()->environment()=='demo') {echo 'demo'; 
// 	$router->get('/', function() {
// 	});
// 	$router->get('db/', function() use ($router) {
// 	});
// }
/* PRODUCTION ROUTE==========================================================================================*/
if (app()->environment()=='production') { //production	// Route::get('sx', function(Request $request)

	// 		{
	// 			$bag = Session::getMetadataBag();
	// 		    $pesan=['error'=>['Peringatan : File PDF tidak di atur dengan benar !', 'Terjadi kesalahan upload File PDf '], 'succes'=>'Sukses mengupload Dokumen PDF '];
	// 		    echo date('m/d/Y H:i:s', time());
	// 		});
// rename file pdf =============================================================================================
			// Route::get('/ren', function(Request $request)
			// {
			// 	// $entry = File::where('dokumen_id','=',91)->first();
			// 	// // echo str_replace('/', '-', $entry->dokumen->no_sppd);
			// 	// $entry->nama_baru=!empty($entry->nama_baru)?$entry->nama_baru:str_replace('/', '-', $entry->dokumen->no_sppd).'-'.$entry->filename;
			// 	// print_r($entry->nama_baru);
			// 	// dd($entry);

			// 	// MIGRASI/ MENGCOPU FILE PDF  DARI ROOT DOKUMEN KE FOLDER DOKUMEN SESUAI DENGAN TABLE FILE 

			// 	 // dd(Dokumens::with('file')->get()->toArray());
			// 	$dirs = \Storage::allDirectories();
			// 	 			// dd($files);
			// 	 $dokumens=Dokumens::with('file','skpd')->get();
			// 	 // $os = array("Mac", "NT", "Irix", "Linux"); // if (in_array("Irix", $os)) {//     echo "Got Irix"; // } // if (in_array("mac", $os)) {//     echo "Got mac"; // } // dd($dokumens); $awalan_nama_dokumen='';
			// 	 $sukses=[];
			// 	 $gagal=[];
			// 	 foreach ($dokumens as $key => $dokumen) {

			// 		 	// $dir=str_slug( str_replace('-', ' ', $dokumen->no_boks));

			// 		 	$dir=$dokumen->no_boks;
			// 	 			if (in_array($dir, $dirs)) {
			// 	 					// handle FIle db
			// 	 					if ($dokumen->file ) {
			// 	 						// if (stripos($dokumen->file, 'ARSIPPROSESSP2D') === false ) {
				 							
			// 	 						// }
			// 							// echo 'proses dokumen SP2D'.$dokumen->file->filename.' dari '.$dokumen->file->filename.' ke '.$dokumen->nama_dokumen.'-'.$dokumen->file->filename." <br> \n";
			// 								$nama_file= str_slug( str_replace('/', '-', $dokumen->no_sppd)).'-'.str_slug( str_replace('/', '-',  $dokumen->nama_dokumen)).'-'.$dokumen->file->filename;
			// 	 							$oldFileName=$dokumen->file->filename;
			// 	 							// $newNameFile=(stripos($dokumen->file->filename , 'ARSIPPROSESSP2D') == false)?$dokumen->nama_dokumen.'-'.$oldFileName: $oldFileName;
			// 	 							$newNameFile=$nama_file;
			// 	 							// $newNameFile=$dokumen->nama_dokumen.'-'.$oldFileName;
			// 	 							// handle soft file pdf 
			// 	 							if (Storage::disk()->exists($oldFileName)) {
			// 										// cek file  di lokasi baru 
			// 										if(!Storage::exists($dir.'/'. $newNameFile)){
			// 	 											Storage::copy($oldFileName,  $dir.'/'. $newNameFile);
			//  											}
			//  											else{
			//  												echo 'file sudah ada ' ;
			//  											}
			// 	 										// update file db
			// 	 										// manipulasi nama file dengan nama baru
			// 	 										$dokumen->file->nama_baru=$newNameFile;
			// 	 										$dokumen->file->dir=$dir;
			// 	 										$dokumen->file->save();
		 // 												// $id=$dokumen->file->id;
		 // 												// unset($dokumen->file->id);
			// 	 										// File::find($id)->update($dokumen->file);
			// 	 										if (Storage::disk()->exists('catatan/log.txt')) {
			// 												Storage::append('catatan/log.txt', 'sukses'.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
				 											
			// 	 										}
			// 	 										else{
			// 	 											// \Storage::makeDirectory('catatan/log.txt');
			// 	 											Storage::put('catatan/log.txt', 'sukses'.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
			// 	 										}

			// 	 							}
			// 							if (Storage::disk()->exists('catatan/log.txt')) {
			// 								Storage::append('catatan/log.txt', 'Sukses : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n ');
											
			// 							}
			// 							else{
			// 								// \Storage::makeDirectory('catatan/');
			// 								Storage::put('catatan/log.txt', 'Sukses : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n '.'\n');
			// 							}

			// 	 					}
			// 	 					elseif(!$dokumen->file){
			// 	 						echo 'file sudah dimodif <br>'."\n";
			// 	 					}
				 					

				 					
			// 	 			}
			// 	 			elseif (!in_array($dir, $dirs)) {
			// 	 					//buat direktori dari no boks
			// 	 					\Storage::makeDirectory($dir);
			// 	 							// handle FIle db
			// 							// echo 'proses dokumen SP2D'.$dokumen->file->filename.' dari '.$dokumen->file->filename.' ke '.$dokumen->nama_dokumen.'-'.$dokumen->file->filename."<br> \n";
				 							
			// 	 							if ($dokumen->file ) {
			// 	 								// echo 'proses file ';
			// 										$nama_file= str_slug( str_replace('/', '-', $dokumen->no_sppd)).'-'.str_slug( str_replace('/', '-',  $dokumen->nama_dokumen)).'-'.$dokumen->file->filename;

			// 	 									$oldFileName=$dokumen->file->filename;
			// 	 									// $newNameFile=(stripos($dokumen->file->filename , 'ARSIPPROSESSP2D') === false)?$dokumen->nama_dokumen.'-'.$oldFileName: $oldFileName;
			// 	 									$newNameFile=$nama_file;
			// 	 									// $newNameFile=$dokumen->nama_dokumen.'-'.$oldFileName;
			// 	 										// echo 'xxxx';
			// 	 									// handle soft file pdf 
			// 	 									if (Storage::disk()->exists($oldFileName)) {
			// 	 											// cek file  di lokasi baru 
			// 	 											if(!Storage::exists($dir.'/'. $newNameFile)){
			// 			 											Storage::copy($oldFileName,  $dir.'/'. $newNameFile);
			// 		 											}
			// 		 											else{
			// 		 												echo 'file sudah ada ' ;
			// 		 											}
			// 	 												// update file db
			// 	 												// manipulasi nama file dengan nama baru
			// 	 												$dokumen->file->nama_baru=$newNameFile;
			// 	 												$dokumen->file->dir=$dir;
			// 	 												// dd($dokumen->file);
			// 	 												$id=$dokumen->file->id;
			// 	 												// unset($dokumen->file->id);
			// 	 												$dokumen->file->save();
			// 	 												// $file = File::find($id)->update($dokumen->file);
			// 	 										// File::find($id)->update($dokumen->file);
			// 	 										if (Storage::disk()->exists('catatan/log.txt')) {
			// 												Storage::append('catatan/log.txt', 'sukses : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
				 											
			// 	 										}
			// 	 										else{
			// 	 											// \Storage::makeDirectory('catatan/log.txt');
			// 	 											Storage::put('catatan/log.txt', 'sukses : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
			// 	 										}

			// 	 									}

			// 	 							}
			// 	 							elseif(!$dokumen->file){

		 // 										if (Storage::disk()->exists('catatan/log.txt')) {
			// 										Storage::append('catatan/log.txt', 'gagal :'.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
		 											
		 // 										}
		 // 										else{
		 // 											// \Storage::makeDirectory('catatan/log.txt');
		 // 											Storage::put('catatan/log.txt', 'gagal : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
		 // 										}
			// 		 								// echo 'file sudah dimodif <br>'."\n";
			// 	 							}
				 							

			// 	 			}
			// 			// $contents = Storage::get('file.jpg');
			// 			// $exists = Storage::disk('s3')->exists('file.jpg');
			// 			// $size = Storage::size('file1.jpg');
			// 			// $time = Storage::lastModified('file1.jpg');
			// 			// 
			// 			// 
			// 	 		// Storage::copy('old/file1.jpg', 'new/file1.jpg');
			// 	 		// Storage::put('file.jpg', $contents);
			// 			// Storage::put('file.jpg', $resource);
			// 			// Storage::move('old/file1.jpg', 'new/file1.jpg');
			// 			// 
			// 			// Storage::prepend('file.log', 'Prepended Text');
			// 			// Storage::append('file.log', 'Appended Text');
			// 			// Storage::delete('file.jpg');
			// 			// Storage::delete(->file1.jpg', 'file2.jpg']);
			// 			// ===========================================================
			// 			// $files = Storage::files($directory);
			// 			// $files = Storage::allFiles($directory);
			// 			// 
			// 	 		// $directories = Storage::directories($directory);
			// 	 		// Recursive...
			// 	 		// $directories = Storage::allDirectories($directory);
			// 			// Storage::deleteDirectory($directory);
			// 			// 
						
			// 	 		// Storage::makeDirectory();
			// 	 			// dd($dokumen);
			// 	 			// exit('masukkk');
			// 	 }
				
			// });
		// echo 'local';
		Route::group(['middleware' => 'sentry.admin'], function ($router) {
		  
				$router->get('/', ['as'=>'home',function() {
						return view('easy.layout.app', ['xcontent'=> easyc('home')]);
					}]);
				$router->get('grid/{page}', ['as'=>'pagegrid',function($page='home') {
						return view('easy.layout.app', ['xcontent'=> easyc($page)]);
					}]);
				$router->get('ajax/{page}/{grida?}/{gridb?}/{gridc?}', ['as'=>'ajaxgrid', function($page='home', $grida='grida', $gridb='gridb', $gridc='gridc') {
						// $Router= new Router();
						$idGrid=[
						'grida'=> $grida,
						'gridb'=> $gridb,
						'gridc'=> $gridc,
						];
						$request= new Request();
								return easyc($page, $idGrid);
				
					}]);
				$router->get('/homec', function() {
					return view('easy.layout.app', ['xcontent'=> view('easy.layout.xcontent')]);

				});
				Route::resource('skpd', 'SkpdController');
				Route::controller('skpd-Data', 'SkpdController', [
				    'anyData' => 'skpd.data',
				    'anyCombobox' => 'suplay.skpd.combobox',
				]);
				Route::resource('dokumens', 'DokumensController');
				Route::controller('dokumens-Data', 'DokumensController', [
				    'anyData' => 'dokumens.data',
				]);
				Route::resource('jenis-sppd', 'JenissppdController');
				Route::controller('jenis-sppd-data', 'JenissppdController', [
				    'anyData' => 'jenis-sppd.data',
				    'anyCombobox' => 'suplay.jenis-sppd.combobox',
				]);
				Route::resource('unit-kerja', 'UnitkerjaController');
				Route::controller('unit-kerja-data', 'UnitkerjaController', [
				    'anyData' => 'unit-kerja.data',
				     'anyCombobox' => 'suplay.unit-kerja.combobox'
				]);


				Route::resource('penerima', 'PenerimaController');
				Route::controller('penerima-Data', 'PenerimaController', [
				    'anyData' => 'penerima.data',
				    'anyCombobox' => 'suplay.penerima.combobox',
				]);
	// -------------------------------------------------------------------------------------------------------
				Route::get('api/csrf', ['as'=>'token',function() {
				    return csrf_token();
				}]);
	/*  file image==============================================================================================================================*/
				Route::get('file', 'FileController@index');
				// Route::get('file/get/{filename}', [
				Route::get('file/get/{id}', [
					'as' => 'file.get', 'uses' => 'FileController@get']);
				Route::post('file/add',[ 
				        'as' => 'file.add', 'uses' => 'FileController@add']);

				Route::post('pdf/{jenis}', ['as'=>'pdf',function(Request $req, $jenis)
				{	
					$view_laporan=[
					'tahun'=>'laporan_menurut_tahun_periode',
					'jenis_sppd'=>'laporan_menurut_jenis_sppd',
					'jenis_skpd'=>'laporan_menurut_jenis_skpd_tahun',
					'per_skpd_tahun'=>'laporan_menurut_per_skpd_tahun'
					];

					if ($jenis=='per_skpd_tahun' || $jenis=='jenis_skpd' ) {
						Config::set('laravel-tcpdf.page_orientation', 'L');
					}
					
					PDF::SetAuthor('Achmadi');
					PDF::SetTitle('Laporan');
					PDF::SetSubject('Laporan');
					PDF::SetKeywords('TCPDF, PDF, example, test, guide');

					PDF::SetHeaderData('', '', '', 'generated by  Achmadi ..: diahmad330@gmail.com :.. ');
					PDF::setHeaderFont(Array('', '', '7'));
					

					PDF::SetMargins(20, 10, 20, 10);
					// PDF::SetTitle('Hello World');

					PDF::AddPage();

					PDF::SetFont('helvetica', '', 8);
					// PDF::Write(0, 'Hello World');
					// $table= view('laporan.laporan_menurut_jenis_skpd_tahun');
					$lap=new Laporan($req);
					$data_lap= $lap->$jenis();
					// dd($data_lap->get('tahun'));
					$table= view('laporan.'.$view_laporan[$jenis], $data_lap);
				
					
					PDF::writeHTML($table, true, false, false, false, '');
					PDF::Output($view_laporan[$jenis]);
					
				}]);
			
				function lapgrid($view='')
				{
					return view('laporan.grid.'.$view);
				}
				Route::group(['prefix' => 'lap_preview'], function()
				{	
					Route::get('grid/{grid}', ['as'=>'lap.prev.grid',function($grid)
						{	
							// return $grid;
								return  lapgrid($grid);
						}]);

					Route::any('data/{data}',['as'=>'lap.prev.data', function(Request $req,$data)
						{
							$lap=new Laporan($req);
							return $lap->$data();
							
						}]);
					Route::any('tahun', ['as'=>'tahun',function()
					{
						$tahun=array();
						$key=0;
						for ($i=1970; $i <= 2050  ; $i++) { 
							$tahun[$key]['id']=$i;
							$tahun[$key]['textXX']=$i.' ';
							$key++;
						}
						return $tahun;

					}]);
				  
				});
		});}
// {{route('profile', ['page' => ''])}}
/* LOCAL AND DEVELOPMENT ROUTE==========================================================================================*/

if (app()->environment()=='local') {
	Route::get('db', function() {
		 $holidays=array("2008-12-25","2008-12-26","2009-01-01");
		// return getHariKerja("2008-12-22","2009-01-02",$holidays);
		 $doks = Dokumens::where('tahun',2009)->get();
		 // $libur = Tahun::where('tahun',2009)->first()->liburs;
		 $libur = Libur::select('tanggal_libur_nasional')->where('tahun_id',3)->get() 	;
		 // dd($libur);
		 foreach ($doks as $key => $dok) {
		 	// dd($dok);
		 	// $dok->keterangan=cekTelat($dok->tgl_diterima,$dok->tgl_sppd,$holidays);
		 	echo $key.'--'.$dok->no_sppd.'--'.$dok->tgl_sppd.'--'.$dok->tgl_diterima.'--';
		 	echo cekTelat($dok->tgl_diterima,$dok->tgl_sppd,$libur);
		 	echo '<br>';
		 	$dok->keterangan=cekTelat($dok->tgl_diterima,$dok->tgl_sppd,$libur);
		 	$dok->save();

		 }
	$doks = Dokumens::where('tahun',2009)->get();
	 dd($doks);
		// return cekTelat("2008-12-22","2009-01-02",$holidays);
	});
	

	// Route::get('sx', function(Request $request)
	// 		{
	// 			$bag = Session::getMetadataBag();
	// 		    $pesan=['error'=>['Peringatan : File PDF tidak di atur dengan benar !', 'Terjadi kesalahan upload File PDf '], 'succes'=>'Sukses mengupload Dokumen PDF '];
	// 		    echo date('m/d/Y H:i:s', time());
	// 		});
// rename file pdf =============================================================================================
			// Route::get('/ren', function(Request $request)
			// {
			// 	// $entry = File::where('dokumen_id','=',91)->first();
			// 	// // echo str_replace('/', '-', $entry->dokumen->no_sppd);
			// 	// $entry->nama_baru=!empty($entry->nama_baru)?$entry->nama_baru:str_replace('/', '-', $entry->dokumen->no_sppd).'-'.$entry->filename;
			// 	// print_r($entry->nama_baru);
			// 	// dd($entry);

			// 	// MIGRASI/ MENGCOPU FILE PDF  DARI ROOT DOKUMEN KE FOLDER DOKUMEN SESUAI DENGAN TABLE FILE 

			// 	 // dd(Dokumens::with('file')->get()->toArray());
			// 	$dirs = \Storage::allDirectories();
			// 	 			// dd($files);
			// 	 $dokumens=Dokumens::with('file','skpd')->get();
			// 	 // $os = array("Mac", "NT", "Irix", "Linux"); // if (in_array("Irix", $os)) {//     echo "Got Irix"; // } // if (in_array("mac", $os)) {//     echo "Got mac"; // } // dd($dokumens); $awalan_nama_dokumen='';
			// 	 $sukses=[];
			// 	 $gagal=[];
			// 	 foreach ($dokumens as $key => $dokumen) {

			// 		 	// $dir=str_slug( str_replace('-', ' ', $dokumen->no_boks));

			// 		 	$dir=$dokumen->no_boks;
			// 	 			if (in_array($dir, $dirs)) {
			// 	 					// handle FIle db
			// 	 					if ($dokumen->file ) {
			// 	 						// if (stripos($dokumen->file, 'ARSIPPROSESSP2D') === false ) {
				 							
			// 	 						// }
			// 							// echo 'proses dokumen SP2D'.$dokumen->file->filename.' dari '.$dokumen->file->filename.' ke '.$dokumen->nama_dokumen.'-'.$dokumen->file->filename." <br> \n";
			// 								$nama_file= str_slug( str_replace('/', '-', $dokumen->no_sppd)).'-'.str_slug( str_replace('/', '-',  $dokumen->nama_dokumen)).'-'.$dokumen->file->filename;
			// 	 							$oldFileName=$dokumen->file->filename;
			// 	 							// $newNameFile=(stripos($dokumen->file->filename , 'ARSIPPROSESSP2D') == false)?$dokumen->nama_dokumen.'-'.$oldFileName: $oldFileName;
			// 	 							$newNameFile=$nama_file;
			// 	 							// $newNameFile=$dokumen->nama_dokumen.'-'.$oldFileName;
			// 	 							// handle soft file pdf 
			// 	 							if (Storage::disk()->exists($oldFileName)) {
			// 										// cek file  di lokasi baru 
			// 										if(!Storage::exists($dir.'/'. $newNameFile)){
			// 	 											Storage::copy($oldFileName,  $dir.'/'. $newNameFile);
			//  											}
			//  											else{
			//  												echo 'file sudah ada ' ;
			//  											}
			// 	 										// update file db
			// 	 										// manipulasi nama file dengan nama baru
			// 	 										$dokumen->file->nama_baru=$newNameFile;
			// 	 										$dokumen->file->dir=$dir;
			// 	 										$dokumen->file->save();
		 // 												// $id=$dokumen->file->id;
		 // 												// unset($dokumen->file->id);
			// 	 										// File::find($id)->update($dokumen->file);
			// 	 										if (Storage::disk()->exists('catatan/log.txt')) {
			// 												Storage::append('catatan/log.txt', 'sukses'.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
				 											
			// 	 										}
			// 	 										else{
			// 	 											// \Storage::makeDirectory('catatan/log.txt');
			// 	 											Storage::put('catatan/log.txt', 'sukses'.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
			// 	 										}

			// 	 							}
			// 							if (Storage::disk()->exists('catatan/log.txt')) {
			// 								Storage::append('catatan/log.txt', 'Sukses : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n ');
											
			// 							}
			// 							else{
			// 								// \Storage::makeDirectory('catatan/');
			// 								Storage::put('catatan/log.txt', 'Sukses : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n '.'\n');
			// 							}

			// 	 					}
			// 	 					elseif(!$dokumen->file){
			// 	 						echo 'file sudah dimodif <br>'."\n";
			// 	 					}
				 					

				 					
			// 	 			}
			// 	 			elseif (!in_array($dir, $dirs)) {
			// 	 					//buat direktori dari no boks
			// 	 					\Storage::makeDirectory($dir);
			// 	 							// handle FIle db
			// 							// echo 'proses dokumen SP2D'.$dokumen->file->filename.' dari '.$dokumen->file->filename.' ke '.$dokumen->nama_dokumen.'-'.$dokumen->file->filename."<br> \n";
				 							
			// 	 							if ($dokumen->file ) {
			// 	 								// echo 'proses file ';
			// 										$nama_file= str_slug( str_replace('/', '-', $dokumen->no_sppd)).'-'.str_slug( str_replace('/', '-',  $dokumen->nama_dokumen)).'-'.$dokumen->file->filename;

			// 	 									$oldFileName=$dokumen->file->filename;
			// 	 									// $newNameFile=(stripos($dokumen->file->filename , 'ARSIPPROSESSP2D') === false)?$dokumen->nama_dokumen.'-'.$oldFileName: $oldFileName;
			// 	 									$newNameFile=$nama_file;
			// 	 									// $newNameFile=$dokumen->nama_dokumen.'-'.$oldFileName;
			// 	 										// echo 'xxxx';
			// 	 									// handle soft file pdf 
			// 	 									if (Storage::disk()->exists($oldFileName)) {
			// 	 											// cek file  di lokasi baru 
			// 	 											if(!Storage::exists($dir.'/'. $newNameFile)){
			// 			 											Storage::copy($oldFileName,  $dir.'/'. $newNameFile);
			// 		 											}
			// 		 											else{
			// 		 												echo 'file sudah ada ' ;
			// 		 											}
			// 	 												// update file db
			// 	 												// manipulasi nama file dengan nama baru
			// 	 												$dokumen->file->nama_baru=$newNameFile;
			// 	 												$dokumen->file->dir=$dir;
			// 	 												// dd($dokumen->file);
			// 	 												$id=$dokumen->file->id;
			// 	 												// unset($dokumen->file->id);
			// 	 												$dokumen->file->save();
			// 	 												// $file = File::find($id)->update($dokumen->file);
			// 	 										// File::find($id)->update($dokumen->file);
			// 	 										if (Storage::disk()->exists('catatan/log.txt')) {
			// 												Storage::append('catatan/log.txt', 'sukses : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
				 											
			// 	 										}
			// 	 										else{
			// 	 											// \Storage::makeDirectory('catatan/log.txt');
			// 	 											Storage::put('catatan/log.txt', 'sukses : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
			// 	 										}

			// 	 									}

			// 	 							}
			// 	 							elseif(!$dokumen->file){

		 // 										if (Storage::disk()->exists('catatan/log.txt')) {
			// 										Storage::append('catatan/log.txt', 'gagal :'.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
		 											
		 // 										}
		 // 										else{
		 // 											// \Storage::makeDirectory('catatan/log.txt');
		 // 											Storage::put('catatan/log.txt', 'gagal : '.$dokumen->id.' -> '.$dokumen->no_sppd.'\n');
		 // 										}
			// 		 								// echo 'file sudah dimodif <br>'."\n";
			// 	 							}
				 							

			// 	 			}
			// 			// $contents = Storage::get('file.jpg');
			// 			// $exists = Storage::disk('s3')->exists('file.jpg');
			// 			// $size = Storage::size('file1.jpg');
			// 			// $time = Storage::lastModified('file1.jpg');
			// 			// 
			// 			// 
			// 	 		// Storage::copy('old/file1.jpg', 'new/file1.jpg');
			// 	 		// Storage::put('file.jpg', $contents);
			// 			// Storage::put('file.jpg', $resource);
			// 			// Storage::move('old/file1.jpg', 'new/file1.jpg');
			// 			// 
			// 			// Storage::prepend('file.log', 'Prepended Text');
			// 			// Storage::append('file.log', 'Appended Text');
			// 			// Storage::delete('file.jpg');
			// 			// Storage::delete(->file1.jpg', 'file2.jpg']);
			// 			// ===========================================================
			// 			// $files = Storage::files($directory);
			// 			// $files = Storage::allFiles($directory);
			// 			// 
			// 	 		// $directories = Storage::directories($directory);
			// 	 		// Recursive...
			// 	 		// $directories = Storage::allDirectories($directory);
			// 			// Storage::deleteDirectory($directory);
			// 			// 
						
			// 	 		// Storage::makeDirectory();
			// 	 			// dd($dokumen);
			// 	 			// exit('masukkk');
			// 	 }
				
			// });
		// echo 'local';
		Route::group(['middleware' => 'sentry.admin'], function ($router) {
		  
				$router->get('/', ['as'=>'home',function() {
						return view('easy.layout.app', ['xcontent'=> easyc('home')]);
					}]);
				$router->get('grid/{page}', ['as'=>'pagegrid',function($page='home') {
						return view('easy.layout.app', ['xcontent'=> easyc($page)]);
					}]);
				$router->get('ajax/{page}/{grida?}/{gridb?}/{gridc?}', ['as'=>'ajaxgrid', function($page='home', $grida='grida', $gridb='gridb', $gridc='gridc') {
						// $Router= new Router();
						$idGrid=[
						'grida'=> $grida,
						'gridb'=> $gridb,
						'gridc'=> $gridc,
						];
						$request= new Request();
								return easyc($page, $idGrid);
				
					}]);
				$router->get('/homec', function() {
					return view('easy.layout.app', ['xcontent'=> view('easy.layout.xcontent')]);

				});
				Route::resource('skpd', 'SkpdController');
				Route::controller('skpd-Data', 'SkpdController', [
				    'anyData' => 'skpd.data',
				    'anyCombobox' => 'suplay.skpd.combobox',
				]);
				Route::resource('tahun', 'tahunController');
				Route::controller('tahun-Data', 'tahunController', [
				    'anyData' => 'tahun.data',
				    'anyCombobox' => 'suplay.tahun.combobox',
				]);
				Route::resource('dokumens', 'DokumensController');
				Route::controller('dokumens-Data', 'DokumensController', [
				    'anyData' => 'dokumens.data',
				]);
				Route::resource('jenis-sppd', 'JenissppdController');
				Route::controller('jenis-sppd-data', 'JenissppdController', [
				    'anyData' => 'jenis-sppd.data',
				    'anyCombobox' => 'suplay.jenis-sppd.combobox',
				]);
				Route::resource('unit-kerja', 'UnitkerjaController');
				Route::controller('unit-kerja-data', 'UnitkerjaController', [
				    'anyData' => 'unit-kerja.data',
				     'anyCombobox' => 'suplay.unit-kerja.combobox'
				]);

				Route::resource('libur', 'LiburNasionalController');
				Route::controller('libur-data', 'LiburNasionalController', [
				    'anyData' => 'libur.data',
				     'anyCombobox' => 'suplay.libur.combobox'
				]);


				Route::resource('penerima', 'PenerimaController');
				Route::controller('penerima-Data', 'PenerimaController', [
				    'anyData' => 'penerima.data',
				    'anyCombobox' => 'suplay.penerima.combobox',
				]);
	// -------------------------------------------------------------------------------------------------------
				Route::get('api/csrf', ['as'=>'token',function() {
				    return csrf_token();
				}]);
	/*  file image==============================================================================================================================*/
				Route::get('file', 'FileController@index');
				// Route::get('file/get/{filename}', [
				Route::get('file/get/{id}', [
					'as' => 'file.get', 'uses' => 'FileController@get']);
				Route::post('file/add',[ 
				        'as' => 'file.add', 'uses' => 'FileController@add']);

				Route::post('pdf/{jenis}', ['as'=>'pdf',function(Request $req, $jenis)
				{	
					$view_laporan=[
					'tahun'=>'laporan_menurut_tahun_periode',
					'jenis_sppd'=>'laporan_menurut_jenis_sppd',
					'jenis_skpd'=>'laporan_menurut_jenis_skpd_tahun',
					'per_skpd_tahun'=>'laporan_menurut_per_skpd_tahun'
					];

					if ($jenis=='per_skpd_tahun' || $jenis=='jenis_skpd' ) {
						Config::set('laravel-tcpdf.page_orientation', 'L');
					}
					
					PDF::SetAuthor('Achmadi');
					PDF::SetTitle('Laporan');
					PDF::SetSubject('Laporan');
					PDF::SetKeywords('TCPDF, PDF, example, test, guide');

					PDF::SetHeaderData('', '', '', 'generated by  Achmadi ..: diahmad330@gmail.com :.. ');
					PDF::setHeaderFont(Array('', '', '7'));
					

					PDF::SetMargins(20, 10, 20, 10);
					// PDF::SetTitle('Hello World');

					PDF::AddPage();

					PDF::SetFont('helvetica', '', 8);
					// PDF::Write(0, 'Hello World');
					// $table= view('laporan.laporan_menurut_jenis_skpd_tahun');
					$lap=new Laporan($req);
					$data_lap= $lap->$jenis();
					// dd($data_lap);
					// dd($data_lap->get('tahun'));
					$table= view('laporan.'.$view_laporan[$jenis], $data_lap);
				
					
					PDF::writeHTML($table, true, false, false, false, '');
					PDF::Output($view_laporan[$jenis]);
					
				}]);
			
				function lapgrid($view='')
				{
					return view('laporan.grid.'.$view);
				}
				Route::group(['prefix' => 'lap_preview'], function()
				{	
					Route::get('grid/{grid}', ['as'=>'lap.prev.grid',function($grid)
						{	
							// return $grid;
								return  lapgrid($grid);
						}]);

					Route::any('data/{data}',['as'=>'lap.prev.data', function(Request $req,$data)
						{
							$lap=new Laporan($req);
							return $lap->$data();
							
						}]);
					Route::any('tahun', ['as'=>'tahun',function()
					{
						$tahun=array();
						$key=0;
						for ($i=1970; $i <= 2050  ; $i++) { 
							$tahun[$key]['id']=$i;
							$tahun[$key]['textXX']=$i.' ';
							$key++;
						}
						return $tahun;

					}]);
				  
				});
		});

}


// Route::get('lap/{jenis}', function ($jenis='1')
// {
// 	// $lap1=Dokumens::count('tahun')->groupBy('tahun')->get()->toArray();
// 	// dd($lap1);
// 	if ($jenis==1) {
// 		$users = DB::table('dokumen')
// 		                     ->select(DB::raw('tahun, count(dokumen.tahun) as jumlah, SUM(dokumen.spm_benar) as spm'))
// 		                     // ->where('status', '<>', 1)
// 		                     ->groupBy('tahun')
// 		                     ->get();
// 	    dd($users);
// 	}
// 	if ($jenis==2) {
// 		// $users = Jenissppd::with('dokumens')->get();
// 	    // dd($users);
// 	    $users = DB::table('dokumen')
// 		                     ->select(DB::raw('tahun, count(dokumen.tahun) as jumlah, SUM(dokumen.spm_benar) as spm, jenis_sppd_id'))
// 		                     // ->where('status', '<>', 1)
// 		                     ->groupBy('jenis_sppd_id')
// 		                     ->get();
// 	    dd($users);
		
		               
// 	}
// 	if ($jenis==3) {
// 		// $users = Jenissppd::with('dokumens')->get();
// 	    // dd($users);
// 	    $users = DB::table('dokumen')
// 		                     ->select(DB::raw('dokumen.tahun,
// 								Count(dokumen.no_sppd) AS SPM_jumlah,
// 								Sum(dokumen.spm_diajukan) AS SPM_NILAI,
// 								Sum(dokumen.potongan) AS SPM_POTONGAN,
// 								Count(dokumen.no_sppd) AS SPPD_JUMLAH,
// 								Count(dokumen.spm_benar) AS SPPD_NILAI,
// 								dokumen.no_sppd,
// 								dokumen.keterangan'
// 								))
// 		                     ->where('tahun', '=', 2010)
// 		                     ->groupBy('skpd_id')
// 		                     ->get();
// 	    dd($users);
		
		               
// 	}
// 	if ($jenis==4) {
// 		// $users = Jenissppd::with('dokumens')->get();
// 	    // dd($users);
// 	    $users = DB::table('dokumen')
// 		                     ->select(DB::raw(
// 		                     	'dokumen.tahun,
// 									Count(dokumen.no_sppd) AS SPM_jumlah,
// 									Sum(dokumen.spm_diajukan) AS SPM_NILAI,
// 									Sum(dokumen.potongan) AS SPM_POTONGAN,
// 									Count(dokumen.no_sppd) AS SPPD_JUMLAH,
// 									Sum(dokumen.spm_benar) AS SPPD_NILAI,
// 									dokumen.no_sppd,
// 									dokumen.keterangan'
// 								))
// 		                     ->where('tahun', '=', 2010)
// 		                     ->where('skpd_id', '=', 2)
// 		                     ->groupBy('jenis_sppd_id')
// 		                     ->get();
// 	    dd($users);
		
		               
// 	}
// 	$users = DB::table('users')->count();
	
// 	$price = DB::table('orders')->max('price');

// });
 
 Route::group(['namespace' => 'extend\sentinel'], function(){
        Route::get('profile/editPass', ['as' => 'ExtendProfile.editPass.edit', 'uses' => 'ProfileController@editPass']);
    Route::post('profile/password', ['as' => 'sentinel.profile.password', 'uses' => 'ProfileController@changePasswordX']);
    Route::put('profile', ['as' => 'sentinel.profile.update', 'uses' => 'ProfileController@updateX']);
        Route::any('users/data', ['as' => 'ExtendUser.users.data', 'uses' => 'UserController@getUsers']);
    Route::put('users/{hash}', ['as' => 'sentinel.users.update', 'uses' => 'UserController@updateX']);
    Route::post('users', ['as' => 'sentinel.users.store', 'uses' => 'UserController@storeX']);
        Route::any('groups/data', ['as' => 'ExtendGroup.groups.data', 'uses' => 'GroupController@getGroups']);
    Route::post('groups', ['as' => 'sentinel.groups.store', 'uses' => 'GroupController@storeX']);
        Route::any('groups/{hash}/edit-permission', ['as' => 'ExtendGroup.groups.editpermission', 'uses' => 'GroupController@EditPermission']);
        Route::any('groups/{hash}/CUP', ['as' => 'ExtendGroup.groups.CUP', 'uses' => 'GroupController@CreateUpdatePermission']);
});