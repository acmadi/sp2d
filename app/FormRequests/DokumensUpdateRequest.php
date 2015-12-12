<?php namespace App\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class DokumensUpdateRequest extends FormRequest{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 * coba |exists:skpd,id 
	 * @return array
	 */
	public function rules()
	{

			// 'nama_skpd' => 'required|min:4|alpha_spacex|max:254',
	     	// 'nama_singkat_skpd' => 'required|min:4|alpha_spacex|max:20'
		return [
				'tahun'=> 'required|numeric|digits:4|between:2009,2030' 
				,'no_sppd'=> 'required|min:4|max:50' 
				,'tgl_sppd'=> 'required|isDateId'  // date
				,'jenis_sppd_id'=> 'required|exists:jenis_sppd,id'    // id 
				,'skpd_id'=> 'required|exists:skpd,id'    // id 
				,'unit_kerja_id'=> 'required|exists:unit_kerja,id'    // id 
				,'penerima_id'=> 'required|exists:penerima,id'    // id 
				// ,'penerima_pihak_lain'=> 'required| ' 
				,'keperluan'=> 'required|min:8 ' 
				,'no_spm'=> 'required|min:4|max:50' 
				,'tgl_spm'=> 'required|isDateId'  // date
				,'spm_diajukan'=> 'required| ' 
				,'potongan'=> 'required| ' 
				,'spm_benar'=> 'required| ' 
				,'tgl_pengantar'=> 'required|isDateId'  // date
				,'tgl_diterima'=> 'required|isDateId'  // date
				,'no_agenda'=> 'required| ' 
				,'tgl_acc_kasi'=> 'required|isDateId'  // date
				,'tgl_acc_kabid'=> 'required|isDateId'  // date
				,'tgl_acc_kadis'=> 'required|isDateId'  // date
				,'status_terlambat'=> 'required| ' 
				// ,'keterangan'=> 'required| ' 
				,'nama_dokumen'=> 'required|min:4|max:100' 
				,'tgl_referensi'=> 'required|isDateId'  // date
				,'no_rak'=> 'required| ' 
				,'no_boks'=> 'required| ' 
				,'no_map'=> 'required| ' 
	
		];
	}


	public function response(array $errors)
	   {
	
		   	$data['msg']='Gagal';
		   	$data['errors']=$errors;
		   	$data['code']=403;
		   	// echo json_encode($data);
		   	return \Response::make(json_encode($data), 403);
	   }
	 public function forbiddenResponse()
	 {
	     return \Response::make('Permission denied foo!', 200);
	 }

}
