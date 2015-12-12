<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormRequests\SkpdCreateRequest;
use App\FormRequests\SkpdUpdateRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Skpd;
class SkpdController extends Controller
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
        // $data = Skpd::all();
        // $count = App\Flight::where('active', 1)->count();

        $data = \DB::table('skpd');
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
        $total['total'] = \DB::table('skpd')->count();
      
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
    public function store(SkpdCreateRequest $request)
    {
        // dd($request->all());
        $skpd=new Skpd();
        $skpd->nama_skpd= $request->nama_skpd;
        $skpd->nama_singkat_skpd= $request->nama_singkat_skpd;
        $skpd->save();
        if ($skpd->id) {
        // $data['code']=200;
        // $data['msg']='Tambah data SUkses';
            $data['msg']='Sukses !';
            $data['succes']='Tambah Data SKPD '.$skpd->nama_skpd.' dengan nama singkat '.$skpd->nama_singkat_skpd.' Sukses' ;
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
        $data = Skpd::find($id);
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
    public function update(SkpdUpdateRequest $req, $id)
    {
        // dd($req->all());

        $data = Skpd::find($id);
        $datapesan=$data->nama_skpd;
        
        $data->nama_skpd = $req->get('nama_skpd') ;
        $data->nama_singkat_skpd = $req->get('nama_singkat_skpd') ;
        $data->save();

            $cek=Skpd::find($id);
        
       $data['msg']='Sukses !';
        if ( $datapesan !==  $cek->nama_skpd) {
                   $data['succes']='Update nama skpd '.$data->nama_skpd.' ke '.$datapesan.' sukses';
                return $data+['token'=>csrf_token()];
            }
        else{
            
                   $data['succes']='Update nama skpd '.$data->nama_skpd.' ke '.$req->nama_skpd.' Gagal / nilainya sama ';
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
   
          $data=Skpd::find($id);
          $datapesan=Skpd::find($id);
          // dd($datapesan->nama_skpd);
        if ($data) {
           $data->delete();
           // echo "delete";
        }
          $datax=Skpd::find($id);

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
        $data=Skpd::orderBy('nama_skpd', 'asc')->get();
        return $data;
    }
}
