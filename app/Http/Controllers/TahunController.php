<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormRequests\TahunCreateRequest;
use App\FormRequests\TahunUpdateRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tahun;
class TahunController extends Controller
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
        // $data = Tahun::all();
        // $count = App\Flight::where('active', 1)->count();

        $data = \DB::table('tahun');
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
        $total['total'] = \DB::table('tahun')->count();
      
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
    public function store(TahunCreateRequest $request)
    {
        // dd($request->all());
        $tahun=new Tahun();
        $tahun->tahun= $request->get('tahun');
        $tahun->default = $request->get('default') ;
        $tahun->save();
        if ($tahun->id) {
        // $data['code']=200;
        // $data['msg']='Tambah data SUkses';
            $data['msg']='Sukses !';
            $data['succes']='Tambah Data tahun '.$tahun->tahun.' Sukses' ;
         return $data+['token'=>csrf_token()];
            
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
        $data = Tahun::find($id);
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
    public function update(TahunUpdateRequest $req, $id)
    {
        // dd($req->all());

        $data = Tahun::find($id);
        $datapesan=$data->tahun;
        
        $data->tahun = $req->get('tahun') ;
        $data->default = $req->get('default') ;
        $data->save();

            $cek=Tahun::find($id);
        
       $data['msg']='Sukses !';
        if ( $datapesan !==  $cek->tahun) {
                   $data['succes']='Update tahun '.$data->tahun.' ke '.$datapesan.' sukses';
                return $data+['token'=>csrf_token()];
            }
        else{
            
                   $data['succes']='Update '.$data->tahun.' ke '.$req->tahun.' Gagal / nilainya sama ';
                return $data+['token'=>csrf_token()];
        }        
        // return __function__;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
   
          $data=Tahun::find($id);
          $datapesan=Tahun::find($id);
          // dd($datapesan->nama_skpd);
        if ($data) {
           $data->delete();
           // echo "delete";
        }
          $datax=Tahun::find($id);

        if (!$datax) {
           return 'Sukses menghapus SKPD '.$datapesan->nama_skpd;
        }
        else{
           return 'gagal menghapus SKPD '.$datapesan->nama_skpd;
            
        }
 
        // return __function__;
        //
    }
    public function anyCombobox($value='')
    {
        $data=Tahun::orderBy('tahun', 'asc')->get();
        return $data;
    }
}
