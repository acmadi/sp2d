<div class="easyui-layout" id="duk{{'_'.$grida }}" data-options="fit:true">
			<div data-options="region:'center'">
				<div id="tt{{'_'.$grida }}" class="easyui-tabs" fit="true">
				<div title="Daftar Libur">
				
				<table id="contentCenter{{'_'.$grida }}" fit="true" style="widht: 10000px;" >
				</table>
				</div>
				</div>
			</div>
			<div data-options="region:'south',split:true" style="height:200px;"> 
				<div class="easyui-tabs" id="tabX{{'_'.$grida }}"  data-options="fit:true">
					<!-- form ================================================= -->
					<div title="Form Data Unit Kerj" id="formBottom{{'_'.$grida }}"  onsubmit="return false;" style="padding:3px 0px 0px 10px"  data-options="">
							<form id="F-INPUT{{'_'.$grida }}" method="post">
								<input type="hidden" name="id" id="id{{'_'.$grida }}">
								{!! csrf_field() !!}
								<div id="ForInput{{'_'.$grida }}" style="min-width:70%; display:inline-block; float:left; ">
									<div style="padding: 2px 0px 10px 10px;">
										<label for="nama_skpd" style="display:inline-block; min-width:20%">Nama Tahun</label>:

										<input id="F_skpd_id{{'_'.$grida }}" name="tahun_id"  class="easyui-combobox" 
											  style="min-width:30%"   placeholder="Pilih-Tahun" 
												data-options="prompt:'Pilih-Nama-SKPD',required:true,
												url:'{{route('suplay.tahun.combobox')}}',
												valueField:'id',
												textField:'tahun',
												onSelect: function(filter){
													console.log(filter);
													// return false;
													// alert('selected')
													//$('#contentCenter{{'_'.$grida }}').datagrid('load', {
													   // filter_tahun_id: filter.id
													//});
													// var url = 'get_data2.php?id='+rec.id;
													// $('#cc2').combobox('reload', url);{{'_'.$grida }}
													}
												"
											>
									</div>
									<div style="padding: 2px 0px 10px 10px;"> 
										<label style="display:inline-block; min-width: 20%"for="nama_singkat">Tanggal Libur  </label>
										
										<!-- : <input type="text" name="tanggal_libur_nasional" 
										class="easyui-validatebox textbox"   placeholder="Ketik Tanggal Libur" data-options="prompt:'Ketik Tanggal Libur', required:true" style="min-width:60%" /> -->
										
												:  <input class="easyui-datebox"  name="tanggal_libur_nasional" id="tanggal_libur_nasional" type="text"  
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
									<div style="padding: 2px 0px 10px 10px;"> 
										<label style="display:inline-block; min-width: 20%"for="nama_singkat">Keterangan  </label>
										
										: <input type="text" name="ket"  style="min-width:60%" 
										class="easyui-validatebox textbox"   placeholder="Ketik  Keterangan" data-options="prompt:'Ketik nama singkat Libur', required:true"/>
									</div>
									<div style="padding: 2px 0px 10px 10px; display:none;"> 
										<label style="display:inline-block; min-width: 20%"for="nama_singkat">status  </label>
										
										: <input type="hidden" name="status"  style="min-width:60%" 
										class=""   placeholder="Ketik  status" data-options="prompt:'Ketik status'"/>
									</div>
								</div>

								<div id="ForButton{{'_'.$grida }}" style="padding: 2px 0px 10px 10px; display:inline-block;  padding:0px 20px 0px 0px;">

							<a id="simpan{{'_'.$grida }}" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-floppy-o'">Simpan</a>
							<a id="update{{'_'.$grida }}" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-check-square-o'" >update</a>
							<br>
							<br>
								<a id="close{{'_'.$grida }}" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-close'">Close</a>
									<!-- <input type="button" value="Simpan"> -->
									<!-- <input type="button" value="Close"> -->
								</div>

							</form>



					</div>

				</div>


			</div>
		</div>


		<!-- datagrid toolbarrrr ================================================== -->
		<div id="tb{{'_'.$grida }}" style="padding:5px;height:auto">
			<div style="margin-bottom:5px">
				<a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" plain="true" onclick="javascript:FormTambah{{'_'.$grida }}();">Tambah </a>
				<a href="#" class="easyui-linkbutton" iconCls="fa fa-check-square-o" plain="true" onclick="javascript:AksiKoreksi{{'_'.$grida }}();"> Koreksi</a>
				<a href="#" class="easyui-linkbutton" iconCls="fa fa-refresh" plain="true" onclick="javascript:Refresh{{'_'.$grida }}();" > Refresh</a>

				<a href="#" class="easyui-linkbutton" iconCls="fa fa-close" plain="true" onclick="javascript:AksiHapus{{'_'.$grida }}();" >Hapus</a>
			</div>
			<div>
				Nama Tahun :   
				<input id="filter_skpd{{'_'.$grida }}"  class="easyui-combobox" style="min-width:30%"
				data-options="prompt:'Pilih Tahun',
				url:'{{route('suplay.tahun.combobox')}}',
				valueField:'id',
				textField:'tahun',
				onSelect: function(filter){
					console.log(filter);
					// return false;
					// alert('selected')
					$('#contentCenter{{'_'.$grida }}').datagrid('load', {
					    filter_tahun_id: filter.id
					});
					// var url = 'get_data2.php?id='+rec.id;
					// $('#cc2').combobox('reload', url);{{'_'.$grida }}
					}
				"
				>
			</div>
		</div>
		<script type="text/javascript">
			
	
			// $('#filter_skpd{{'_'.$grida }},#F_skpd_id{{'_'.$grida }}').combobox();
			// $('#filter_skpd{{'_'.$grida }}').combobox(
			// 	{
			// 		url:'{{route('suplay.skpd.combobox')}}',
			// 		valueField:'id',
			// 		textField:'nama_skpd',
			// 		onSelect: function(filter){
			// 			console.log(filter);
			// 			// return false;
			// 			// alert('selected')
			// 			$('#contentCenter{{'_'.$grida }}').datagrid('load', {
			// 			    filter_tahun_id: filter.id
						    
			// 			});
			// 		// var url = 'get_data2.php?id='+rec.id;
			// 		// $('#cc2').combobox('reload', url);{{'_'.$grida }}
			// 	}
			// }
			// )
			// $('#F_skpd_id{{'_'.$grida }}').combobox(
			// {
			// 		url:'{{route('suplay.skpd.combobox')}}',
			// 		valueField:'id',
			// 		textField:'nama_skpd'
			// }
			// )
			function Refresh{{'_'.$grida }}(argument) {
							$('#contentCenter{{'_'.$grida }}').datagrid('load',{}); 
			}
			function FormTambah{{'_'.$grida }}() {
				$.get('{{route('token')}}', function(data) {
							$('#F-INPUT{{'_'.$grida }}').form('clear');
							$("input:hidden[name=_token]").val(data);
						$('#update{{'_'.$grida }}').hide();
						$('#simpan{{'_'.$grida }}').show();
				 	customTitleTab('tabX{{'_'.$grida }}','Tambah Data Libur Baru')

						$('#duk{{'_'.$grida }}').layout('expand','south');
						if ($('#F-INPUT{{'_'.$grida }}').find("input[name='_method']").length >= 1) {
							$('#F-INPUT{{'_'.$grida }}').find("input[name='_method']").remove();
						};
				});
				// alert('Tambahhh')
					// $('#duk').layout('expand','south');{{'_'.$grida }}
				
			}
			function AksiHapus{{'_'.$grida }}() {
				var row = $('#contentCenter{{'_'.$grida }}').datagrid('getSelected');
				
				if (row){
			 	$.messager.confirm('Konfirmasi ', 'Apakah Anda ingin menghapus data '+row.tanggal_libur_nasional, function(r){

					if (r)

					{
				
						 	$.post('{{url('libur')}}/'+row.id, { _method: 'DELETE' }, function(data, textStatus, xhr) {
						 		// alert(data)
						 		// console.log(data)
						 		// console.log(textStatus)
						 		// console.log(xhr)
							 		if (textStatus=='success') {
							 			$.messager.show({  
							 			title: 'Status',  
							 			msg: data  
							 			});	
										$('#contentCenter{{'_'.$grida }}').datagrid('reload');

							 		}
							 		else{
						 				$.messager.show({  
						 				title: 'Gagal !',  
						 				msg: 'Terjadi Kesalahan !'  
						 				});		
										$('#contentCenter{{'_'.$grida }}').datagrid('re load');
							 		}
							 	}).fail(function(data) {
							 		// $.messager.show({  
							 		// title: 'Gagal !',  
							 		// msg: 'Kegagalan koneksi , periksa lagi jaringan anda  !'  
							 		// });	
							 		$.messager.show({  
							 		title: 'Gagal !',  
							 		msg: 'Kegagalan koneksi , periksa lagi jaringan anda  !'  
							 		});	
										$('#contentCenter{{'_'.$grida }}').datagrid('reload');
								    // alert( "error" );
								  });

					}

				});
						 	
				    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
				}
				
			}
			function  AksiKoreksi{{'_'.$grida }}(argument) {
				var row = $('#contentCenter{{'_'.$grida }}').datagrid('getSelected');
				// var url='google.com'
				if (row){

					$.get('{{route('token')}}', function(data) {
								$('#F-INPUT{{'_'.$grida }}').form('clear');
								$("input:hidden[name=_token]").val(data);
								$('#update{{'_'.$grida }}').show();
								$('#simpan{{'_'.$grida }}').hide();
				 	customTitleTab('tabX{{'_'.$grida }}','Koreksi Data Libur '+row.tanggal_libur_nasional)

								$('#F-INPUT{{'_'.$grida }}').form('load','{{url('libur')}}/'+row.id+'/edit');
								$('#duk{{'_'.$grida }}').layout('expand','south');
								
					});
				}
				else{
					$.messager.alert('Info', 'Anda harus memilih baris di tabel terlebih dulu', 'info');
				}
			}
			
		$('#contentCenter{{'_'.$grida }}').datagrid(
		{
			url:'{{route('libur.data')}}',
			// title:'Daftar Libur',
			toolbar: '#tb{{'_'.$grida }}',
			columns:[[
		// {field:'productid',title:'No',width:200},
		{field:'tahun_data',title:'Tahun',width:20},
		{field:'tanggal_libur_nasional',title:'Tanggal Libur',width:20},
		{field:'ket',title:'Keterangan',width:20},
		{field:'status',title:'status',width:20}
		// {field:'productname',title:'Singkatan'}
		]],
		// height: 200,
		pagination : true,
		// remoteSort:true,
		rownumbers : true,
		singleSelect:true,
		striped:true, 
		collapsible:true,
		autoRowHeight:true,
		fitColumns:true,
		queryParams: {
			_token: token
		},	
		onLoadSuccess:function  (data) {
			$('#filter_skpd{{'_'.$grida }},#F_skpd_id{{'_'.$grida }}').combobox();
			$('meta[name="csrf-token"]').attr('content',data.token);
		},
		
		// scrollbarSize:10,
		// pageSize:10
	});


			$('.easyui-layout').layout()
			$('.easyui-datebox').datebox()
			$('.easyui-linkbutton').linkbutton()
			$('.easyui-tabs').tabs()
			$('#duk{{'_'.$grida }}').layout('collapse','south');
			

/* handle submit form======================================*/
$(function(){
    $('#close{{'_'.$grida }}').bind('click', function(){
    	// alert('close')
				$('#duk{{'_'.$grida }}').layout('collapse','south');
        // alert('easyui');
    });
    $('#simpan{{'_'.$grida }}').bind('click', function(){

        	$('#F-INPUT{{'_'.$grida }}').form('submit',{  url:'{{route('libur.store')}}',
					        		onSubmit: function(param){
					        			var isValid = $(this).form('validate');
					        			if (!isValid){
					        			    console.log('masuk');
					        			    $('#simpan').removeAttr('disabled');
					        			      $.messager.show({  
					        			      title: 'Status',  
					        			      msg: 'data tidak lengkap'
					        			      });
					        			     return false 
					        			}
					        		return true
					        		},
        							success: function(result){
        								if (result.code ==  200 ){
        									$.messager.show({  
        										title: 'Status',  
        										msg: 'Data SKPD Berhasil Dimasukkan !'  
        									});
        									$('#F-INPUT{{'_'.$grida }}').form('clear');
        									// $('#this').dialog('close'){{'_'.$grida }}
        									$('#contentCenter{{'_'.$grida }}').datagrid('reload');
        								}
        								else {
        									FormTambah{{'_'.$grida }}()
        									$('#contentCenter{{'_'.$grida }}').datagrid('reload');
        									pesan_top_center(result)
        									// $.messager.show({  
        									// 	title: 'Status',  
        									// 	msg: result  
        									// });
        								} 
        							} 
        						});
    });
    $('#update{{'_'.$grida }}').bind('click', function(){
    			var row = $('#contentCenter{{'_'.$grida }}').datagrid('getSelected');
            // console.log($('#id').val());return false;{{'_'.$grida }}
            	$('#F-INPUT{{'_'.$grida }}').form('submit',{ url:'{{url('libur')}}/'+$('#id{{'_'.$grida }}').val(), 
            								onSubmit: function(param){
            								    param._method = 'PATCH';
            								    var isValid = $(this).form('validate');
            								    if (!isValid){
            								        console.log('masuk');
            								        $('#update{{'_'.$grida }}').removeAttr('disabled');
            								          $.messager.show({  
            								          title: 'Status',  
            								          msg: 'data tidak lengkap'
            								          });
            								         return false 
            								    }
            								    return true
            								},
            							success: function(result){

            								if (result.code ==  200 ){
            									$.messager.show({  
            										title: 'Status',  
            										msg: 'Data SKPD Berhasil Dimasukkan !'  
            									});
            									// $('#this').dialog('close'){{'_'.$grida }}
            									$('#contentCenter{{'_'.$grida }}').datagrid('reload');
            								}
            								else {
            									$('#contentCenter{{'_'.$grida }}').datagrid('reload');
            									pesan_top_center(result)
            									// $.messager.show({  
            									// 	title: 'Status',  
            									// 	msg: result  
            									// });
            								} 
            							} 
            						});
        });

});
		</script>