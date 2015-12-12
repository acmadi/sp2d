<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormRequests\UnitKerjaCreateRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unitkerja;

class UnitkerjaController extends Controller
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
        // $data = Unitkerja::all();
        // $count = App\Flight::where('active', 1)->count();

        // $data = \DB::table('unit_kerja');
        $data = Unitkerja::with('skpd');
        // dd($data->get());

        if ($req->get('filter_skdp_id')) {
           $result=$data->where('skpd_id', '=', $req->get('filter_skdp_id'))->get();
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
        $datax['rows']=$this->show_relasi_kolom($data->get());
        $total['total'] = \DB::table('unit_kerja')->count();
      
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
             $item['nama_skpd']=$item['skpd']->nama_skpd;
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
    public function store(UnitKerjaCreateRequest $request)
    {
        // dd($request->all());
        $unitkerja=new Unitkerja();
        $unitkerja->skpd_id= $request->skpd_id;
        $unitkerja->nama_unit_kerja= $request->nama_unit_kerja;
        $unitkerja->nama_singkat_unit_kerja= $request->nama_singkat_unit_kerja;
        $unitkerja->save();
        if ($unitkerja->id) {
        // $data['code']=200;
        // $data['msg']='Tambah data SUkses';
               $data['msg']='Sukses !';
               $data['succes']='Tambah Data Unit  Kerja '.$unitkerja->nama_unit_kerja.' dengan nama singkat '.$unitkerja->nama_singkat_unit_kerja.' Sukses' ;
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
        $data = Unitkerja::find($id);
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
    public function update(UnitKerjaCreateRequest $req, $id)
    {
        // dd($req->all());
        $data_unit_kerja = Unitkerja::find($id);
        // dd($data_unit_kerja);
        $data_unit_kerja_pesan_to_view=$data_unit_kerja->nama_unit_kerja;
        
        $data_unit_kerja->skpd_id = $req->get('skpd_id') ;
        $data_unit_kerja->nama_unit_kerja = $req->get('nama_unit_kerja') ;
        $data_unit_kerja->nama_singkat_unit_kerja = $req->get('nama_singkat_unit_kerja') ;
        $data_unit_kerja->save();

            $cek=Unitkerja::find($id);
        
               $data['msg']='Sukses !';
        if ( $data_unit_kerja_pesan_to_view !==  $cek->nama_unit_kerja) {
               $data['succes']='Update nama skpd '.$data_unit_kerja->nama_unit_kerja.' ke '.$data_unit_kerja_pesan_to_view.' sukses';
            return $data;
                // return 'Update nama skpd '.$data_unit_kerja->nama_unit_kerja.' ke '.$data_unit_kerja_pesan_to_view.' sukses';
            }
        else{
               $data['succes']='Update nama skpd '.$data_unit_kerja->nama_unit_kerja.' ke '.$req->nama_unit_kerja.' Gagal / nilainya sama ';
            return $data;
                // return 'Update nama skpd '.$data_unit_kerja->nama_unit_kerja.' ke '.$req->nama_unit_kerja.' Gagal / nilainya sama ';
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
   
          $data_unit_kerja=Unitkerja::find($id);
          $data_unit_kerja_pesan=Unitkerja::find($id);
          // dd($data_unit_kerja_pesan->nama_skpd);
        if ($data_unit_kerja) {
           $data_unit_kerja->delete();
           // echo "delete";
        }
          $data_unit_kerjax=Unitkerja::find($id);

        if (!$data_unit_kerjax) {
           return 'Sukses menghapus SKPD '.$data_unit_kerja_pesan->nama_unit_kerja;
        }
        else{
           return 'gagal menghapus SKPD '.$data_unit_kerja_pesan->nama_unit_kerja;
            
        }
 
        // return __function__;
        //
    }
    public function anyCombobox(Request $req)
    {
        // dd($req->get('id'));
        if ($req->get('id')) {
            return Unitkerja::where('skpd_id', $req->get('id'))->orderBy('nama_unit_kerja', 'desc')->get();
        }
        $data=Unitkerja::orderBy('nama_unit_kerja', 'desc')->get();
        return $data;

    }

}
