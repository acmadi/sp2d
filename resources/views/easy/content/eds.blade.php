
<style type="text/css">
.drop-area{
  width:100px;
  height:25px;
  /*border: 1px solid #999;*/
  text-align: center;
  
  cursor:pointer;
}
#thumbnail img{
  margin:auto;
  width:100%;
  height:100%;
  margin:5px;
  z-index:1;
}
#thumbnail {
/*border: solid red;*/
width:700px;
height:700px;
position : absolute;
top:0px;
left:0;
right:0;
margin-left:auto;
margin-right:auto;
z-index:1;
}
canvas{
  border:1px solid red;
}
#upload{
       margin: auto; padding-bottom: 30px; width: 100%; z-index: 200;
}
#upload a{
    display: inline-block;
    font-family: cursive;
    font-size: 30px;
    font-weight: 300;
    left: 0;
    margin-left: auto;
    margin-right: auto;
    padding: 100px;
    position: absolute;
    right: 0;
    top: 0;
    width: 30%;
    z-index: 500;
}
  #F-INPUT div#ForInput{
  width:100%; display:inline-block; float:left; position:relative; top:50px;
  }
  #F-INPUT div#ForInput label{
    display:inline-block; width:20%;
  }
  #F-INPUT div#ForInput div{
  padding: 2px 0px 10px 10px;
  }
  #F-INPUT div#ForInput input.easyui-validatebox{
    width:20%;
  }
       main {
           border: medium solid red;
            padding-top: 100px;
            position: relative;
       }

       .center {
           position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: solid red;
       }
    canvas {
      font-family: 'pixel';
      margin-left: auto;
      margin-right: auto;
      display: block;
      border: 1px solid black;
      cursor: none;
      outline: none;
    }

/**  link menu file ,=== snippet ===============================================================================
*/
#daftar_input_file {
    width: 100%;
    /*background-color: #005555;*/
}

#daftar_input_file ul {
    margin: 0; padding: 0;
    float: left;
}

#daftar_input_file ul li {
    display: inline;
    background-color: #005555;
    margin-left: 1em;
}

#daftar_input_file ul li a {
    float: left; text-decoration: none;
    color: white; 
    padding: 5px 11px;
    background-color:  #005555;
}
 
#daftar_input_file ul li a:visited {
    color: white;
}
 
#daftar_input_file ul li a:hover, #daftar_input_file ul li .current {
    color: white;
    background-color: #5FD367;
}
.div_file{
  clear: both;
}
</style>
<script type="text/javascript">
jQuery(function($){

function removeAllChildrenFromNode (node) {
  var shell;
  // do not copy the contents
  shell = node.cloneNode(false);
  if (node.parentNode) {
    node.parentNode.replaceChild(shell, node);
  }

  return shell;
}
var XFILE;
var fileDiv = document.getElementById("upload");
// var fileInput = document.getElementById("upload-image");

// // console.log(fileInput);
// fileInput.addEventListener("change",function(e){
//         // console.log(this.files);
//   var files = this.files
//      var filename = this.value;
//     var lastIndex = filename.lastIndexOf("\\");
//     if (lastIndex >= 0) {
//         filename = filename.substring(lastIndex + 1);
//     }
//     $('#nama_file').text(filename);
//     // console.log(filename);
//     // document.getElementById('filename').value = filename;
//   // uploadOnChange(this.value)

//   XFILE=this.files;
//   showThumbnail(files)
// },false)

fileDiv.addEventListener("click",function(e){
  // console.log('fileDiv click');
  // $(fileInput).show().focus().click().hide();
  // $(fileInput).show().focus().click();
  // counter = 1;
  AddFileUpload();
  // var addfile;
  // addfile=new AddFileUpload();
  // addfile.run()
  // addfile.getInstance().run();


  // console.log($(fileInput).val())
  e.preventDefault();
},false)

fileDiv.addEventListener("dragenter",function(e){
    // console.log('fileDiv dragenter');
    // AddFileUpload();
  e.stopPropagation();
  e.preventDefault();
},false);

fileDiv.addEventListener("dragover",function(e){
    // console.log('fileDiv dragover');
  e.stopPropagation();
  e.preventDefault();
},false);

fileDiv.addEventListener("drop",function(e){
    // console.log('fileDiv drop');
    // $(fileInput).show().focus().click().hide();

  // console.log($(fileInput).val())
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;

  showThumbnail(files)
},false);

function showThumbnail(files){
    var reader = new FileReader();


    reader.onload = function(event){
     // console.log(event.target.result);
        the_url = event.target.result
  //of course using a template library like handlebars.js is a better solution than just inserting a string
  // <object width='100%' height='100%' type='application/pdf' data=''></object>
  // $('#some_container_div').html("<video width='400' controls><source id='vid-source' src='"+the_url+"' type='video/mp4'></video>")
  // $('#some_container_div').html(" <object width='100%' height='100%' type='application/pdf' data='"+the_url+"'></object>")
   var show = $( "#show:checked" ).length;
  console.log(show);

   // console.log(cektambah);
   if (show == 0) { 
        console.log(show);
        $('#pdf').html(" <object width='100%' height='100%' type='application/pdf' data='"+the_url+"'></object>")
      }
      else{
         $('#pdf').empty();
      }
  // $('#some_container_div').html(" <img src='"+the_url+"'>")
   // $('#name-vid').html(file.name)
   //      $('#size-vid').html(humanFileSize(file.size, "MB"))
   //      $('#type-vid').html(file.type)

    }
    reader.readAsDataURL(files[0]);

   return false;
  
}

$('#show:checked').change(function () {
      if (XFILE) {
        showThumbnail(XFILE);
        
      }
      else{
        
      }

    // if ($(this).is(':checked')) {
    //     console.log($(this).val() + ' is now checked');
    //     showThumbnail(XFILE);
    // } else {
    //     console.log($(this).val() + ' is now unchecked');
    //     showThumbnail(XFILE);
    // }
});
// function showThumbnail(files){

//     pdffile=files[0];
//     // console.log(pdffile.readAsDataURL());
//    // pdffile_url=URL.createObjectURL(pdffile);
//    pdffile_url=pdffile.getAsDataURL();
//       // $.download(pdffile_url, {   }, 'get')
//    loadpdf(pdffile_url)

//    return false;
  
// }


})

</script>

 <div class="easyui-layout" data-options="fit:true">
 	<div data-options="region:'center',title:' ',split:true">
 	<div class="easyui-tabs" id="tabX"fit="true"  >
 			<div title="Form Tambah Dokumen SP2D" id="formBottom"  style="padding:3px 0px 0px 10px"  style="">
 				<div id="formBottom" style=""  >
 					<form id="F-INPUT" method="post"   onsubmit="return false;" enctype="multipart/form-data" >
          {!! csrf_field() !!}
						<input type="hidden" name="id" id="id">
 						<div id="ForInput" fit="true"  >
              <div>
                <label for="nama_skpd" >Tahun  </label>
                :  <input class="easyui-textbox"  placeholder="Tahun SP2D"  name="tahun" id="tahun" data-options="required:true, prompt:'Tahun SP2D'," value="" />
                <!-- :  <input class="easyui-validatebox " name="tahun" id="tahun" data-options="required:true"  /> -->
              </div>
               
 							<div >
 								<label for="nama_skpd" >No SP2D  </label>

 								:  <input class="easyui-textbox" type="text" name="no_sppd" id="no_sppd" style="width:70%;" data-options="required:true"  value="" />
 							</div>
 							<div > 
 								<label for="nama_singkat" width:20%>Tanggal SP2D </label>

 								:  <input   class="easyui-datebox" type="text"  	 name="tgl_sppd" id="tgl_sppd" 
                        data-options="
                          required:true,
                             onSelect: function(date){
                                 // console.log(AddDate(date,0,'m'));
                                 // console.log($('#mydate').datebox('getValue'));
                                 var date_for_retensi=AddDate($('#tgl_sppd').datebox('getValue'), 15,'Y');
                                 console.log(date_for_retensi);
                                 $('#tgl_referensi').datebox({readonly:true}).datebox('setValue',date_for_retensi);
                                 // console.log($('#mydate').datebox())
                                 // console.log(AddDate(date));
                                 var start_date,end_date;
                                    start_date = $('#tgl_sppd').datebox('getValue')
                                    end_date = $('#tgl_diterima').datebox('getValue');
                                    if(end_date.length == 10 ){
                                       // alert(start_date+'kk')
                                          var hy = new my_date(start_date,end_date, myLibur.libur(),myLibur.get_libur_ori());
                                           console.log(hy.normal_selisih());
                                          console.log(hy.normal_selisih().nilai_normal_selisih);
                                          console.log(hy.normal_selisih().hitung_sabtu_minggu().nilai_date_sabtu_minggu);
                                          console.log('Daftar Libur Sabtu Minggu ');
                                         console.log(hy.list_libur_sabtu_minggu);
                                          console.log(hy.get_list_libur_sabtu_minggu().join(', '));
                                          console.log(hy.list_libur);
                                          console.log('List Libur Nas ');
                                           console.log(hy.list_libur_utc().list_libur_utc_format);
                                          console.log(hy.list_libur_utc());
                                          console.log(hy.get_list_libur_utc_format().join(', '));
                                          console.log(hy.hitung_nilai_list_libur().nilai_list_libur);
                                          console.log(hy.get_daftar_libur_nasional_valid().join(',  '));
                                          console.log(hy.get_nilai_selisih_akhir());
                                          console.log(hy.cek_terlambat());
                                          if(hy.get_nilai_selisih_akhir() >2){
                                            $('#status_terlambat').combobox('select','TELAT');
                                            var ket,nilai_telat;
                                            nilai_telat=hy.get_nilai_selisih_akhir()-2;
                                            ket='Terlambat : '+nilai_telat+' hari, Daftar Tanggal :'+hy.get_daftar_tgl_terlambat(); 
                                            $('#div_keterangan').show();$('#keterangan').val(ket);
                                          }
                                          else if(hy.get_nilai_selisih_akhir() <= 2){
                                            $('#status_terlambat').combobox('select','TEPAT');
                                            $('#div_keterangan').hide();
                                          }
                                      }
                               } ,
                               onChange:function function_name (argument) {
                                  var date_for_retensi=AddDate($('#tgl_sppd').datebox('getValue'), 15,'Y');
                                 console.log(date_for_retensi);
                                 $('#tgl_referensi').datebox({readonly:true}).datebox('setValue',date_for_retensi);
                               }, 
                               formatter:function  (date) {
                                 return DateIdFormatter(date)
                               }, 
                               parser: function  (date) {
                                 return DateIdParser(date)
                               }  
                            " >
 								<DIV style="min-width:30%; display:inline-block;" >
                  <label  for="nama_singkat">
                                  Jenis SP2D </label>
                                  :  <input class="easyui-combobox"  id="jenis_sppd_id" name="jenis_sppd_id" value="" 
                                  data-options="
                                    onLoadSuccess: function  () {
                                        $('#reload_jenis_sppd_id').find('i').removeClass('fa-spin').addClass('fa-lg')
                                    }
                                    ,onBeforeLoad:function  (data) {
                                        $('#reload_jenis_sppd_id').find('i').removeClass('fa-lg').addClass('fa-spin')
                                        },
                                  required:true,
                                  //url:'{{route('suplay.jenis-sppd.combobox')}}',
                                  valueField:'id',
                                  textField:'nama_jenis_sppd'
                
                                  " >  {!! button_refresh('reload_jenis_sppd_id') !!}
                  </DIV>
        
 								<!-- :  <input  name="jenis_sppd_id" id="jenis_sppd_id" class="easyui-combobox" style="width:20%" > -->
 							</div>
 							<div > 
 								<label for="NAMA_SKPD">Nama SKPD  </label>
                                :  <input class="easyui-combogrid"  id="skpd_id" name="skpd_id" value=""
                                data-options="
                                onLoadSuccess: function  () {
                                    $('#reload_skpd_id').find('i').removeClass('fa-spin').addClass('fa-lg')
                                }
                                ,onBeforeLoad:function  (data) {
                                    $('#reload_skpd_id').find('i').removeClass('fa-lg').addClass('fa-spin')
                                    },
                                required:true,
                                    delay: 500, panelWidth: 300,
                                    //url:'{{route('suplay.skpd.combobox')}}',
                                    idField: 'id',
                                    textField: 'nama_skpd',
                                    columns: [[
                                        {field:'id',title:'ID',width:20,sortable:true},
                                        {field:'nama_skpd',title:'SKPD',width:300,sortable:true}
                                    ]]
                                    ,
                                      onChange:function  (newValue, oldValue) {
                                      //alert('xxxxx'+newValue)
                                        $('#unit_kerja_id').combobox({
                                            method:'post',
                                            url:'{{route('suplay.unit-kerja.combobox')}}',
                                            valueField:'id',
                                            textField:'nama_unit_kerja',
                                            onBeforeLoad: function(param){
                                              param.id = newValue;
                                           }
                                        });
                                    }
                                    ,
                                      onSelect:function  (data) {
                                        console.log('ddd '+data);
                                        var g = $('#skpd_id').combogrid('grid');
                                        var r = g.datagrid('getSelected');  
                                        // console.log(r);
                                        $('#no_boks').textbox().textbox('setValue', r.nama_singkat_skpd.toUpperCase()+'-');
                                      }

                                " > {!! button_refresh('reload_skpd_id') !!}
                <!--     <DIV style="min-width:30%; display:inline-block;" >
                     <label  for="unit_kerja_id">
                                     Nama Unit Kerja </label>
                                     :  <input id="unit_kerja_id" name="unit_kerja_id" value="" > [F3] (+ UnitKerja baru) 
                     </DIV> -->

 							<!-- :  <input  name="skpd_id" id="skpd_id" class="easyui-combobox" style="width:20%" > -->
 							</div>
              <div > 
                <label for="unit_kerja_id">Unit Kerja  </label>: 
                  <input class="easyui-combobox" id="unit_kerja_id" name="unit_kerja_id" value="" 
                  data-options="

                    required:true,
                    method:'post',
                    //url:'{{route('suplay.unit-kerja.combobox')}}',
                    valueField:'id',
                    textField:'nama_unit_kerja'
                    "  > [F2] (+ UnitKerja baru) 
              </div>
 							<div > 
 								<label for="nama_singkat">Penerima SP2D  </label>
                                :  <input class="easyui-combogrid" id="penerima_id" name="penerima_id" value=""
                                 data-options="
                                 onLoadSuccess: function  () {
                                     $('#reload_penerima_id').find('i').removeClass('fa-spin').addClass('fa-lg')
                                 }
                                 ,onBeforeLoad:function  (data) {
                                     $('#reload_penerima_id').find('i').removeClass('fa-lg').addClass('fa-spin')
                                     },
                                  required:true,
                                  delay: 500, panelWidth: 400,
                                 //url:'{{route('suplay.penerima.combobox')}}',
                                  idField: 'id',
                                  textField: 'nama_penerima',
                                  columns: [[
                                      {field:'id',title:'ID',width:20,sortable:true},
                                      {field:'nama_penerima',title:'Nama Penerima',width:400,sortable:true}
                                  ]]

                                  " > [F1] (+ Penerima baru) //  {!! button_refresh('reload_penerima_id') !!}

                              <!--   <DIV id="penerima_pihak_lain_view" style="min-width:30%; display:none;" >
                                 <label  for="penerima_pihak_lain">
                                                 Penerima Pihak ke Ketiga </label>
                                                 :  <input id="penerima_pihak_lain" name="penerima_pihak_lain" value="" >
                                 </DIV>
 -->
 								<!-- :  <input  name="penerima" id="penerima_id"  class="easyui-combobox" style="width:20%" > -->
 							</div>
 							<div > 
 								<label for="nama_singkat">Keperluan </label>: 
 								<textarea class="easyui-textbox" data-options="required:true"  cols="40" name="keperluan" id="keperluan" rows=""></textarea>
 							</div>
 							<div > 
 								<label for="nama_singkat">No. SPM  </label>
 								:  <input class="easyui-textbox" type="text"  style="width:70%;" name="no_spm" id="no_spm" data-options="required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Tgl. SPM </label>
								:  <input class="easyui-datebox"  name="tgl_spm" id="tgl_spm" type="text"  
                    data-options="
                      required:true,
                          formatter:function  (date) {
                            return DateIdFormatter(date)
                          }, 
                          parser: function  (date) {
                            return DateIdParser(date)
                          }
                      ">
 							</div>
 							<div > 
 								<label for="nama_singkat">SPM Diajukan  </label>
 								:  <input class="easyui-textbox" data-options="required:true"   type="text" name="spm_diajukan" id="spm_diajukan" data-options="required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Potongan  </label>
 								:  <input class="easyui-textbox" data-options="required:true"  type="text" name="potongan" id="potongan" data-options="required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">SPM yang Diminta </label>
 								:  <input class="easyui-textbox" data-options="required:true" type="text" name="spm_benar" id="spm_benar"  validType="bukanNol "  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Tgl. Pengantar </label>
 								:  <input   class="easyui-datebox"   name="tgl_pengantar" id="tgl_pengantar" 
                         data-options="
                                required:true,
                                  formatter:function  (date) {
                                    return DateIdFormatter(date)
                                  }, 
                                  parser: function  (date) {
                                    return DateIdParser(date)
                                  }
                                    "  >
                  	<label for="nama_singkat">Tgl. Diterima </label>
     								<!-- :  <input class="easyui-validatebox" type="text" name="tgl_diterima" id="tgl_diterima" data-options="required:true"  /> -->
     								:  <input    class="easyui-datebox" name="tgl_diterima" id="tgl_diterima" 
                        data-options="
                                required:true,
                                onSelect: function(date){
                                    var start_date,end_date;
                                    start_date = $('#tgl_sppd').datebox('getValue');
                                    end_date = $('#tgl_diterima').datebox('getValue');
                                    if(start_date.length == 10 ){
                                       // alert(start_date+'kk')
                                          //var hy = new my_date(start_date,end_date,['22/08/1987','02/09/1987','29/09/1987','03/10/1987']);
                                            //console.log(myLibur.get_libur_ori() ); return false;
                                          var hy = new my_date(start_date,end_date,myLibur.libur(),myLibur.get_libur_ori());
                                           console.log(hy.normal_selisih());
                                          console.log(hy.normal_selisih().nilai_normal_selisih);
                                          console.log(hy.normal_selisih().hitung_sabtu_minggu().nilai_date_sabtu_minggu);
                                          console.log('Daftar Libur Sabtu Minggu ');
                                           console.log(hy.list_libur_sabtu_minggu);
                                          console.log(hy.get_list_libur_sabtu_minggu().join(', '));
                                          console.log(hy.list_libur);
                                          console.log('List Libur Nas ');
                                           console.log(hy.list_libur_utc().list_libur_utc_format);
                                          console.log(hy.list_libur_utc());
                                          console.log(hy.get_list_libur_utc_format().join(', '));
                                          console.log(hy.hitung_nilai_list_libur().nilai_list_libur);
                                          console.log(hy.get_daftar_libur_nasional_valid().join(',  '));
                                          console.log(hy.get_nilai_selisih_akhir());
                                          console.log(hy.cek_terlambat());
                                          if(hy.get_nilai_selisih_akhir() >2){
                                            $('#status_terlambat').combobox('select','TELAT');
                                              var ket,nilai_telat;
                                              nilai_telat=hy.get_nilai_selisih_akhir()-2;
                                              ket='Terlambat : '+nilai_telat+' hari, Daftar Tanggal :'+hy.get_daftar_tgl_terlambat(); 
                                            $('#div_keterangan').show();$('#keterangan').val(ket);;
                                          }
                                          else if(hy.get_nilai_selisih_akhir() <=2){
                                            $('#status_terlambat').combobox('select','TEPAT');
                                            $('#div_keterangan').hide();
                                          }
                                      }
                                  } ,
                                  formatter:function  (date) {
                                    return DateIdFormatter(date)
                                  }, 
                                  parser: function  (date) {
                                    return DateIdParser(date)
                                  }">


 							</div>
 							<div > 
 								<label for="nama_singkat">No. Agenda </label>
 								:  <input class="easyui-textbox" data-options="required:true"  type="text" name="no_agenda" style="width:70%;" id="no_agenda"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Tgl. Acc KASI / KASUBID </label>
								:  <input class="easyui-datebox"  name="tgl_acc_kasi" id="tgl_acc_kasi"  
                      data-options="
                        required:true,
                            formatter:function  (date) {
                              return DateIdFormatter(date)
                            }, 
                            parser: function  (date) {
                              return DateIdParser(date)
                            }

                        ">
								<label for="nama_singkat">Tgl. Acc KABID  </label>
								:  <input class="easyui-datebox" name="tgl_acc_kabid" id="tgl_acc_kabid" 
                        data-options="
                          required:true,
                            formatter:function  (date) {
                              return DateIdFormatter(date)
                            }, 
                            parser: function  (date) {
                              return DateIdParser(date)
                            }
                        " >
 							</div>
 						 <div > 
                <label for="nama_singkat">Tgl. Acc KADIS </label>
                :  <input  class="easyui-datebox"  name="tgl_acc_kadis" id="tgl_acc_kadis"  
                     data-options="
                          required:true,
                            formatter:function  (date) {
                              return DateIdFormatter(date)
                            }, 
                            parser: function  (date) {
                              return DateIdParser(date)
                            }
                            ">
              </div>
              <div > 
 								<label for="status_terlambat">Status Keterlambatan  </label>:
                <select id="status_terlambat" class="easyui-combobox" name="status_terlambat" style="width:200px;">
                    <option value="TEPAT">TEPAT-WAKTU</option>
                    <option value="TELAT">TERLAMBAT</option>
                 
                </select>
 							</div>
 							
 							<div id="div_keterangan" style="display:none;"> 
 								<label for="nama_singkat">Keterangan  </label>
 								:  <textarea cols="40" name="keterangan" id="keterangan" rows=""></textarea>
 							</div>
 							<div > 
 								<label for="nama_singkat">Nama Dokumen </label>
 								:  <input class="easyui-textbox" data-options="required:true" ype="text" style="width:70%;"name="nama_dokumen" id="nama_dokumen"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">Tgl. Retensi  </label>
 								:  <input  class="easyui-datebox" name="tgl_referensi" id="tgl_referensi"  
                        data-options="
                          required:true,
                            formatter:function  (date) {
                              return DateIdFormatter(date)
                            }, 
                            parser: function  (date) {
                              return DateIdParser(date)
                            }
                        " >
 								<label for="nama_singkat">No. Rak :  </label>
 								:  <input class="easyui-textbox" type="text" name="no_rak" id="no_rak" data-options="required:true"  />
 							</div>
 							<div > 
 								<label for="nama_singkat">No. Boks  </label>
 								:  <input class="easyui-textbox" type="text" name="no_boks" id="no_boks" data-options="required:true"  />
 								<label for="nama_singkat">No. Map </label>
 								:  <input class="easyui-textbox" type="text" name="no_map" id="no_map" data-options="required:true"  />
 							</div>

              <!-- <div style="display:none;"> -->
              <div style="" id="daftar_input_file">
                   <!-- :  <input id="filex"  name="gambar" type="text" style="width:300px"> -->
                    <label style="float:left"> File  </label>
                    <ul id="daftar_file" style="display:block;">
                    </ul>
                    <br>
                   <!-- <input type="file"  name="gambar" style="width: 100%; height:10%;" id="upload-image" multiple="multiple"> -->
                   <!-- <input type="file" name="gambar" style="width: 30%; height:10%;display:inline-block;" id="upload-image" multiple="multiple"> -->
              </div>
 							<div > 
 								<label for="nama_singkat"> </label>
 								<!-- :  <input type="checkbox" name="tambah" id="tambah"  /> Tambah Dokumen Lagi -->
 							</div>
              </div>
	 						<!-- Button============================================== -->
	 						<div  style="background: none repeat scroll 0 0 #e0ecff;
							    display: inline-block;
							    height: 20px;
							    left: 0;
							    margin: 1px;
							    padding: 10px;
							    position: absolute;
							    top: 58px;
							    width: 94%;">
                  <a id="simpan" href="#" disabled="" class="easyui-linkbutton" data-options="iconCls:'fa fa-floppy-o'">Simpan</a>
                  <a id="update" href="#" disabled="" class="easyui-linkbutton" data-options="iconCls:'fa fa-check-square-o'">update</a>

	 							<!-- <input type="submit"  id="simpan" value="Simpan" data-options="iconCls:'fa fa-floppy-o'"> -->
	 							<!-- <input type="submit"  id="update" value="Update" data-options="iconCls:'fa fa-check-square-o'"> -->
	 							<hr>
	 						</div>


 					</form>

 				</div>


 			</div>

 		</div>

 	</div>
 	<div data-options="region:'east',title:' ',split:true" style="width:50%">
        <!-- <input type="file" style="display:none; width: 100%; height:100%;" id="upload-image" multiple="multiple"></input> -->
        <div id="upload" style="" class="drop-area">
      <i class="fa fa-file-pdf-o fa-6" style=" font-size: 50px;  color: rgb(0,0,255);"></i>
        <!-- <a>   Klik disini untuk menambakan gambar</a> -->

            <!-- <div id="thumbnail" >


              {{ $image or ''}}
            
               -->
            </div>
                <label style="width:100%; background-color:#e0ecff; display:inline-block;" ><input name="show" id="show" type="checkbox" checked>Jangan Tampilkan, File saat ini : <span id="nama_file"></span> </label>
            <!-- <button value="" onclick="javascript:xxxxx()"> Buka PDF di endela baru</button> -->
             <div id="pdf" >


            
              
            </div>

        </div>
    
 	</div>


<script>

</script>

