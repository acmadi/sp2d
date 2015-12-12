<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormRequests\LiburCreateRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libur;

class LiburNasionalController extends Controller
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
        // $data = Libur::all();
        // $count = App\Flight::where('active', 1)->count();

        // $data = \DB::table('unit_kerja');
        $data = Libur::with('tahun');
        // dd($data->get());

        if ($req->get('filter_tahun_id')) {
           $result=$data->where('tahun_id', $req->get('filter_tahun_id'))->get();
            // $['rows']=$result;
           // return $result;
           $datax['rows']=$this->show_relasi_kolom($result);
           // return $this->show_relasi_kolom($result);
           return $datax+['token'=>csrf_token()];
        
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
        // $datax['rows']=$data->get();
        // $datax['rows']=$this->show_relasi_kolom($data->get(),'skpd','nama_skpd','skpd');
        $datax['rows']=$this->show_relasi_kolom($data->orderBy('tahun_id','ASC')->orderBy('tanggal_libur_nasional','ASC')->get());
        $total['total'] = \DB::table('libur_nasional')->count();
      
        // dd($data->get());
        return $total+$datax+['token'=>csrf_token()];
        //
    }
    // public function show_relasi_kolom($collection='',  $get_key_from_collection, $get_value_from_collection, $sub_key_or_new_key)
    // {
    //     return $collection->each(function ($item, $key,  $get_key_from_collection='', $get_value_from_collection='', $sub_key_or_new_key='') {
    //         // var_dump($item['nama_unit_kerja']);
    //         // $item['nama_unit_kerja']='xxxxx--'.$item['skpd']->nama_skpd;
    //         // var_dump($item['skpd']->nama_skpd);
    //         // return $item['skpd']=$item['skpd']['nama_skpd'];
    //          // $item['skpd']=$item['skpd']->nama_skpd;
    //          $item[$sub_key_or_new_key]=$item[$get_key_from_collection]->$get_value_from_collection;
    //         // if (/* some condition */) {
    //         //     return false;
    //         // }
    //     });
    // }
     public function show_relasi_kolom($collection='')
    {
        return $collection->each(function ($item, $key) {
            // var_dump($item['nama_unit_kerja']);
            // $item['nama_unit_kerja']='xxxxx--'.$item['skpd']->nama_skpd;
            // var_dump($item['skpd']->nama_skpd);
            // return $item['skpd']=$item['skpd']['nama_skpd'];
             // $item['skpd']=$item['skpd']->nama_skpd;
             
             $item['tahun_data']=!empty($item['tahun']->tahun)?$item['tahun']->tahun:'Tidak Punya Referensi Tahun';
            // if (/* some condition */) {
            //     return false;
            // }
        });
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
    public function store(LiburCreateRequest $request)
    {
        // dd($request->all());
        // dd($request->get('tanggal_libur_nasional'));
        $libur=new Libur();
        $libur->tanggal_libur_nasional= $request->get('tanggal_libur_nasional');
        $libur->status= $request->get('status');
        $libur->ket= $request->get('ket');
        $libur->tahun_id= $request->get('tahun_id');
        $libur->save();
        if ($libur->id) {
        // $data['code']=200;
        // $data['msg']='Tambah data SUkses';
               $data['msg']='Sukses !';
               $data['succes']='Tambah Data Libur '.$libur->tanggal_libur_nasional.' dengan keterangan '.$libur->ket.' Sukses' ;
            return $data;
         // return 'Tambah Data Unit  Kerja '.$unitkerja->nama_unit_kerja.' dengan nama singkat '.$unitkerja->nama_singkat_unit_kerja.' Sukses' ;
            
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
        $data = Libur::find($id);
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
    public function update(LiburCreateRequest $req, $id)
    {
        // dd($req->all());
        $libur = Libur::find($id);
        $libur_pesan_to_view=$libur->tanggal_libur_nasional;
            $libur->tanggal_libur_nasional= $req->get('tanggal_libur_nasional');
            $libur->status= $req->get('status');
            $libur->ket= $req->get('ket');
            $libur->tahun_id= $req->get('tahun_id');        
        $libur->save();

            $cek=Libur::find($id);
        
               $data['msg']='Sukses !';
        if ( $libur_pesan_to_view !==  $cek->tanggal_libur_nasional) {
               $data['succes']='Update nama Tangggal Libur '.$libur->tanggal_libur_nasional.' ke '.$libur_pesan_to_view.' sukses';
            return $data;
                // return 'Update nama Tangggal Libur '.$libur->nama_unit_kerja.' ke '.$libur_pesan_to_view.' sukses';
            }
        else{
               $data['succes']='Update nama Tangggal Libur '.$libur->tanggal_libur_nasional.' ke '.$req->tanggal_libur_nasional.' Gagal / nilainya sama ';
            return $data;
                // return 'Update nama Tangggal Libur '.$libur->nama_unit_kerja.' ke '.$req->nama_unit_kerja.' Gagal / nilainya sama ';
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
   
          $libur=Libur::find($id);
          $libur_pesan=Libur::find($id);
          // dd($libur_pesan->nama_skpd);
        if ($libur) {
           $libur->delete();
           // echo "delete";
        }
          $liburx=Libur::find($id);

        if (!$liburx) {
           return 'Sukses menghapus Tangggal Libur '.$libur_pesan->tanggal_libur_nasional;
        }
        else{
           return 'gagal menghapus Tangggal Libur '.$libur_pesan->tanggal_libur_nasional;
            
        }
 
        // return __function__;
        //
    }
    public function anyCombobox(Request $req)
    {
        // dd($req->get('id'));
        if ($req->get('id')) {
            return Libur::where('tahun_id', $req->get('id'))->orderBy('tanggal_libur_nasional', 'desc')->get();
        }
        $data=Libur::orderBy('tanggal_libur_nasional', 'desc')->get();
        return $data;

    }

}
