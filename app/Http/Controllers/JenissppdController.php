<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormRequests\JenisSppdCreateRequest;
use App\FormRequests\JenisSppdUpdateRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jenissppd;
class JenissppdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __Construct()
    {
        // $this->middleware('sentry.admin');
    }
    // public function index()
    // {
    //     return __function__;
    //     //
    // }
    public function anyData(Request $req)
    {
        // $data = Jenissppd::all();
        // $count = App\Flight::where('active', 1)->count();

        $data = \DB::table('jenis_sppd');

        if ($req->get('filter_skdp_id')) {
           $result=$data ->where('nama_jenis_sppd', '=', $req->get('filter_skdp_id'))->get();
            // $['rows']=$result;
           return $result;
        }
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
        $total['total'] = \DB::table('jenis_sppd')->count();

      
        // dd($data->get());
        return $total+$datax+array('token'=>csrf_token());
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
    public function store(JenisSppdCreateRequest $request)
    {
        // dd($request->all());
        $jenis_sppd=new Jenissppd();

        $jenis_sppd->nama_jenis_sppd= $request->nama_jenis_sppd;
        $jenis_sppd->nama_singkat_sppd= $request->nama_singkat_sppd;

        $jenis_sppd->save();
        if ($jenis_sppd->id) {
        // $data['code']=200;
        // $data['msg']='Tambah data SUkses';
               $data['msg']='Sukses !';
               $data['succes']='Tambah Data Jenis SPPD '.$jenis_sppd->nama_singkat_sppd.' dengan nama singkat '.$jenis_sppd->nama_singkat_sppd.' Sukses' ;
            return $data+['token'=>csrf_token()];
         // return 'Tambah Data Jenis SPPD '.$jenis_sppd->nama_singkat_sppd.' dengan nama singkat '.$jenis_sppd->nama_singkat_sppd.' Sukses' ;
            
        }

        return __function__;
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
        $data = Jenissppd::find($id);
        return $data;
        // return __function__;
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(JenisSppdUpdateRequest $req, $id)
    {
        // dd($req->all());
        $data_jenis_sppd = Jenissppd::find($id);
        // dd($data_jenis_sppd);
        $data_jenis_sppd_pesan_to_view=$data_jenis_sppd->nama_singkat_sppd;
        
        $data_jenis_sppd->nama_jenis_sppd = $req->get('nama_jenis_sppd') ;
        $data_jenis_sppd->nama_singkat_sppd = $req->get('nama_singkat_sppd') ;
        // $data_jenis_sppd->nama_singkat_unit_kerja = $req->get('nama_singkat_unit_kerja') ;
        $data_jenis_sppd->save();

            $cek=Jenissppd::find($id);
            // var_dump($data_jenis_sppd_pesan_to_view);
            // dd($cek->nama_singkat_sppd);
        
        if ( $data_jenis_sppd_pesan_to_view !==  $cek->nama_singkat_sppd) {
               $data['msg']='Sukses !';
               $data['succes']= 'Update nama skpd '.$data_jenis_sppd->nama_singkat_sppd.' ke '.$data_jenis_sppd_pesan_to_view.' sukses';
            return $data+['token'=>csrf_token()];
                // return 'Update nama skpd '.$data_jenis_sppd->nama_singkat_sppd.' ke '.$data_jenis_sppd_pesan_to_view.' sukses';
            }
        else{
                  $data['msg']='Sukses !';
                  $data['succes']='Update nama skpd '.$data_jenis_sppd->nama_singkat_sppd.' ke '.$req->nama_singkat_sppd.' Gagal / nilainya sama ';
               return $data+['token'=>csrf_token()];
                // return 'Update nama skpd '.$data_jenis_sppd->nama_singkat_sppd.' ke '.$req->nama_singkat_sppd.' Gagal / nilainya sama ';
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
   
          $data_jenis_sppd=Jenissppd::find($id);
          $data_jenis_sppd_pesan=Jenissppd::find($id);
          // dd($data_jenis_sppd_pesan->nama_skpd);
        if ($data_jenis_sppd) {
           $data_jenis_sppd->delete();
           // echo "delete";
        }
          $data_jenis_sppdx=Jenissppd::find($id);

        if (!$data_jenis_sppdx) {
           return 'Sukses menghapus SKPD '.$data_jenis_sppd_pesan->nama_singkat_sppd;
        }
        else{
           return 'gagal menghapus SKPD '.$data_jenis_sppd_pesan->nama_singkat_sppd;
            
        }
 
        // return __function__;
        //
    }
    public function anyCombobox($value='')
    {
        // dd($value);
        $data=Jenissppd::all();
        return $data;
    }

}
