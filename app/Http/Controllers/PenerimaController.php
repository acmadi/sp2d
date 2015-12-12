<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormRequests\PenerimaCreateRequest;
use App\FormRequests\PenerimaUpdateRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Penerima;
class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    // public function index()
    // {
    //     return __function__;
    //     //
    // }
    public function anyData(Request $req)
    {
        // $data = Penerima::all();
        // $count = App\Flight::where('active', 1)->count();

        $data = \DB::table('penerima');
     if ($req->get('page')) {
            // dd($req->get('page')-1);
            if ($req->get('page')==1) {
                $offset=$req->get('page')-1;
            }
            else{
                 $offset=($req->get('page')-1)*$req->get('rows');
            }

            $data->skip($offset);
        }
        if ($req->get('rows')) {
            $data->take($req->get('rows'));
            
        }
        $datax['rows']=$data->get();
        $total['total'] = \DB::table('penerima')->count();
      
        // dd($data->get());
        return $total+$datax+['token'=>csrf_token()];
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    // public function create()
    // {
    //     return __function__;
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PenerimaCreateRequest $request)
    {
        // dd($request->all());
        $penerima=new Penerima();
        $penerima->nama_penerima= $request->nama_penerima;
        // $penerima->nama_singkat_skpd= $request->nama_singkat_skpd;
        $penerima->save();
        if ($penerima->id) {
        // $data['code']=200;
        // $data['msg']='Tambah data SUkses';
                $data['msg']='Sukses !';
               $data['succes']= 'Tambah Data SKPD '.$penerima->nama_penerima.' Sukses';
            return $data;
         // return 'Tambah Data SKPD '.$penerima->nama_penerima.' Sukses' ;
            
        }

        // return __function__;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    // public function show($id)
    // {
    //     return __function__;
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Penerima::find($id);
        return $data;
        return __function__;
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PenerimaUpdateRequest $req, $id)
    {
        // dd($req->all());
        $data = Penerima::find($id);
        $datapesan=$data->nama_penerima;
        
        $data->nama_penerima = $req->get('nama_penerima') ;
        // $data->nama_singkat_skpd = $req->get('nama_singkat_skpd') ;
        $data->save();

            $cek=Penerima::find($id);
        
        if ( $datapesan !==  $cek->nama_penerima) {
                   $data['msg']='Sukses !';
                   $data['succes']= 'Update nama skpd '.$data->nama_penerima.' ke '.$datapesan.' sukses';
                return $data+['token'=>csrf_token()];
                // return 'Update nama skpd '.$data->nama_penerima.' ke '.$datapesan.' sukses';
            }
        else{
                    $data['msg']='Sukses !';
                   $data['succes']= 'Update nama skpd '.$data->nama_penerima.' ke '.$req->nama_penerima.' Gagal / nilainya sama ';;
                return $data+['token'=>csrf_token()];
                // return 'Update nama skpd '.$data->nama_penerima.' ke '.$req->nama_penerima.' Gagal / nilainya sama ';
        }        
        return __function__;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
   
          $data=Penerima::find($id);
          $datapesan=Penerima::find($id);
          // dd($datapesan->nama_penerima);
        if ($data) {
           $data->delete();
           // echo "delete";
        }
          $datax=Penerima::find($id);

        if (!$datax) {
           return 'Sukses menghapus SKPD '.$datapesan->nama_penerima;
        }
        else{
           return 'gagal menghapus SKPD '.$datapesan->nama_penerima;
            
        }
 
        // return __function__;
        //
    }
    public function anyCombobox($value='')
    {
        $data=Penerima::orderBy('nama_penerima', 'asc')->get();
        return $data;
    }
}
