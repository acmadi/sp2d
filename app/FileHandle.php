<?php

namespace App;
/*
	Handle FIle Storagge and  handle file identitiy 
    single responsibility  for every methode 
    error / succes => replace with false or true => referto via return value => 
    result => massage ( warning massage / error massage / succes massage ) => refer to via property class 


*/

use Illuminate\Database\Eloquent\Model;

class UploadHandel 
{
	public $result=['pesan'=>[], 'identitas'=>[]];
	public $file_pesan=['error'=>'' ,'succes'=>'' ];
    //
       public function IdentitasHandle($req,$id)
    {   
        // PDF tidak di update / melalui form 
        // Gagal mengupload file PDF
        // Sukses Mengupload DOkumen
        $temp_iden_pesan=['error'=>[
        						'user'=>'Peringatan : File PDF tidak di atur dengan benar !', 
        						'sistem'=>'Terjadi kesalahan upload File PDf '
        						], 
        				  'succes'=>[
        				   			'store'=>'Sukses mengupload Dokumen PDF ',
	        				   		'update'=>'Sukses mengupdate Dokumen PDF '
        				   			]
        				   ];
        $temp_file_pesan=['error'=>'', 'succes'=>''];
        // dd($req->all());
         $file = $req->file('gambar');

         if ($file and $file->getClientMimeType()=='application/pdf') {
            // dd($file);
             		     	$extension = $file->getClientOriginalExtension();

             		         $FileIdentity = File::where('dokumen_id',$id);
             		         // Update
             		         if(count($FileIdentity->get()->toArray())){
             		         		$this->result['identitas']['lama']=$FileIdentity->get()->toArray();
             		      			
             		      			//delete file
	             		            $data_for_update= ['mime' => $file->getClientMimeType(),
	             		                             'original_filename' => $file->getClientOriginalName(),
	             		                             'filename' => $file->getFilename().'.'.$extension];

	             		             if ($FileIdentity->update($update) ) {
	             		             		$this->result['identitas']['baru']=$FileIdentity->get()->toArray();
		             		                $this->$result['pesan']=$temp_iden_pesan['succes']['update'];
		             		                // proses storage
											if (\Storage::delete($FileIdentity->get()->toArray()[0]['filename']) &&
			             		                \Storage::disk('local')->put($file->getFilename().'.'.$extension,  \File::get($file)))
												{
													$this->file_pesan['succes']=$temp_file_pesan['succes'];
													return true;
												}
											else{
													$this->file_pesan['error']=$temp_file_pesan['error'];
													return false;
												}
	             		                return true;

	             		             }
	             		             else{

	             		             return false;
	             		             }
             		         }
             		         // new
             		         else{
             		            // echo " new file";
             		             $new_dokument=new File();
             		             $new_dokument->dokumen_id = $id;
             		             $new_dokument->mime = $file->getClientMimeType();
             		             $new_dokument->original_filename = $file->getClientOriginalName();
             		             $new_dokument->filename = $file->getFilename().'.'.$extension;
             		             	//new identitas
             		             if ($new_dokument->save()) {
             		             		// new pdf
             		             		if (\Storage::disk('local')->put($file->getFilename().'.'.$extension,  \File::get($file))) {

             		             			return true;
             		             		}
             			                $this->$result['pesan']=$temp_iden_pesan['succes']['store'];
             		                 return true;
             		             }
             		             else{
             		             		$this->$result['pesan']=$temp_iden_pesan['error']['sistem'];
             		                 return false;
             		             }
             		             
             		         }
             
            // }
            
         }
         else{
          	$this->$result['pesan']=$temp_iden_pesan['error']['user'];
            return false;
          
         }
    }
    function __fileHandle($file)
    {
    	        $temp_file_pesan=['error'=>[
    	        						'user'=>''
    	        						], 
    	        				  'succes'=>[
    	        				   			'store'=>'Sukses mengupload Dokumen PDF ',
    		        				   		'update'=>'Sukses mengupdate Dokumen PDF '
    	        				   			]
    	        				   ];


     	
    }
}
