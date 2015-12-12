<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\File;

class FileController extends Controller
{
	public function get($id){
	
		// $entry = File::where('filename', '=', $filename)->firstOrFail();
		// $file = \Storage::disk('local')->get($entry->filename);
 		

		// // return (new \Response($file, 200))
  //             // ->header('Content-Type', $entry->mime);
		// return response($file,200)
  //           ->header('Content-Type', $entry->mime);

		// ===============================================================================================
				// $entry = File::where('filename', '=', $filename)->firstOrFail();
		 	// 	if (\Storage::exists($entry->filename)) {
				// 	$file = \Storage::disk('local')->get($entry->filename);

				// 	// return (new \Response($file, 200))
			 //              // ->header('Content-Type', $entry->mime);
				// 	return response($file,200)
			 //            ->header('Content-Type', $entry->mime);
		 			
		 	// 	}
		 	// 	else{
		 	// 		return 'File Rusak atau tidak ditemukan, Silahkan Update Ulang ';
		 	// 	}

		 			$entry = File::find(base64_decode($id));
		 			// dd($entry);

 				if ($entry) {
	 				$dirfile= (empty($entry->nama_baru))?$entry->filename:$entry->dir.'/'.$entry->nama_baru;
 					// echo $dirfile;
 					// ARSIPPROSESSP2D-UYUYphpFDCC.tmp.pdf
 					// dinas-p/ARSIPPROSESSP2D-UYUYphpF441.tmp.pdf
	 					// dd($dirfile);
	 					// dd($dirfile);
	 					// "SEKWAN-II/164-sp2d-nhl-setwn-09-arsipprosessp2d-164-sp2d-nhl-setwn-09-phpCAC5.tmp.pdf";
	 					          // "164-sp2d-nhl-setwn-09-arsipprosessp2d-164-sp2d-nhl-setwn-09-1-php757E.tmp"
				 		if (\Storage::exists($dirfile)) {

							$file = \Storage::get($dirfile);
							// return (new \Response($file, 200))
					              // ->header('Content-Type', $entry->mime);
							return response($file,200)
					            ->header('Content-Type', $entry->mime);
				 			
				 		}
				 		elseif(!empty($entry->filename) && \Storage::exists($entry->filename)){
				 					$file = \Storage::get($entry->filename );
				 					// return (new \Response($file, 200))
				 			              // ->header('Content-Type', $entry->mime);
				 					return response($file,200)
				 			            ->header('Content-Type', $entry->mime); 

				 		}
				 		else{
				 			return 'File tidak ditemukan, Silahkan Update Ulang ';

				 		}
 				}
		 		else{
		 			return 'Data File Rusak atau tidak ditemukan, Silahkan Update Ulang ';
		 		}
	}
     
}
