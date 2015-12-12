<?php namespace App\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class PenerimaCreateRequest extends FormRequest{

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
		// $this->sanitize();
		return [
	  	'nama_penerima' => 'required|min:4|alpha_spacex|max:254',
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

	 // public function all()
	 //  {

	  	

	 //      $input = parent::all();
	     
	 //      foreach ($input as $key => $value) {
	      	
	 //      			if ($key !== '_token' ) {
	      			
	 //      				$input[$key]=  sanitize($value) ;
	 //      			}
	 //      }
	 //   	      return $input;
	 //  }

}
