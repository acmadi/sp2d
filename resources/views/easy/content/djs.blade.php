{{-- <div id="windowX" fit="true"> --}}
<div class="easyui-layout" id="djs"data-options="fit:true">
	<div data-options="region:'center'">
		<div id="tt" class="easyui-tabs" fit="true">
			<div title="Daftar Jenis SP2D">
				
				<table id="contentCenter" fit="true" style="widht: 10000px;" >
				</table>
			</div>
		</div>
	</div>
	<div data-options="region:'south',split:true" style="height:200px;"> 
		<div class="easyui-tabs" id="tabX"  data-options="fit:true">
			<!-- form ================================================= -->
			<div title="Tambah Data Jenis SP2D" id="formBottom"  style="padding:3px 0px 0px 10px"  data-options="">
			<!-- <input type="hidden" name="id"> -->
					<form id="F-INPUT" method="post"  onsubmit="return false;">
							<input type="hidden" name="id" id="id">
							{{ csrf_field() }}
						<div id="ForInput" style="width:70%; display:inline-block; float:left; ">

							<div style="padding: 2px 0px 10px 10px;"> 
								<label style="display:inline-block; width: 50%" >Nama Jenis SP2D : </label>
								<input id="nama_jenis_sppd" style=" width: 50%" type="text" name="nama_jenis_sppd" 
									class="easyui-textbox"   placeholder="Nama Jenis SP2D" data-options="prompt:'Nama Jenis SP2D', required:true " />
							</div>
							<div style="padding: 2px 0px 10px 10px;"> 
								<label style="display:inline-block; width: 50%"for="nama_singkat_sppd">Nama Singkat SP2D : </label>

								<input  style=" width: 50%" type="text" name="nama_singkat_sppd" 
								class="easyui-textbox"   placeholder="Nama Singkat SP2D" data-options="prompt:'Nama Singkat SP2D', required:true "  />


							</div>
						</div>

						<div id="ForButton" style="padding: 2px 0px 10px 10px; display:inline-block; padding:0px 20px 0px 0px;">
						
							<a id="simpan" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-floppy-o'">Simpan</a><br>
							<a id="update" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-check-square-o'">Update</a>
							<br>
							<br>
							<a id="close" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-close'">Close</a>

						</div>

					</form>



			</div>

		</div>


	</div>
</div>
{{-- </div> --}}

<!-- datagrid toolbarrrr ================================================== -->
<div id="tb" style="padding:5px;height:auto">
	<div style="margin-bottom:5px">
		<a href="#" class="easyui-linkbutton" iconCls="fa fa-plus"  onclick="javascript:FormTambahX();" plain="true"> Tambah </a>
		<a href="#" class="easyui-linkbutton" iconCls="fa fa-check-square-o" onclick="javascript:AksiKoreksi();" plain="true"> Koreksi</a>
		<a href="#" class="easyui-linkbutton" iconCls="fa fa-refresh" plain="true" onclick="javascript:Refresh();" > Refresh</a>

		<a href="#" class="easyui-linkbutton" iconCls="fa fa-close" onclick="javascript:AksiHapus();" plain="true"> Hapus</a>
	</div>
	<div>
		{{-- Nama SKPD :   
		<input id="filter_skpd_id" class="easyui-combobox" style="width:700px"

		> --}}
	</div>
</div>
<script type="text/javascript">
	// $('#content-x').find('.easyui-layout').layout()
/* Load Grid Handling ===============================================================================*/

	$('#djs').layout()
	$('#content-x').find('.easyui-linkbutton').linkbutton();
	$('#contentCenter').datagrid(
	{
		url:'{{ route('jenis-sppd.data') }}',
					// title:'Daftar Unit Kerja',
					toolbar: '#tb',
					columns:[[
			{field:'nama_jenis_sppd',title:'Jenis SP2D ',width:20},
			{field:'nama_singkat_sppd',title:'Singkatan ',width:20}
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
			onLoadSuccess: function  (data) {
			 $('meta[name="csrf-token"]').attr('content',data.token);
			}
			// scrollbarSize:10,
			// pageSize:10
		});

	// $('#filter_skpd_id').combobox({
	// 	url:'{{route('suplay.skpd.combobox')}}',
	// 	valueField:'id',
	// 	textField:'nama_skpd',
	// 	onSelect: function(rec){
	// 		alert('selected')
	// 			// var url = 'get_data2.php?id='+rec.id;
	// 			// $('#cc2').combobox('reload', url);
	// 		}

	// 	});
	// $('#content-x').find('.easyui-layout').layout()
	// $('#content-x').find('.easyui-linkbutton').linkbutton()
	// $('#content-x').find('.easyui-tabs').tabs()
	// $('#djs').layout('collapse','south');


	$('#djs').find('.easyui-layout').layout()
	$('#djs').find('.easyui-linkbutton').linkbutton()
	$('#djs').find('.easyui-tabs').tabs()
	
	$('#djs').layout('collapse','south');

	// $('#windowX')
/* Action Handling ======================================================================================*/


	$('#F-INPUT').form({onLoadError:function  (error) {
		console.log(error);
		$.messager.alert(error.statusText, error.responseText, 'info');
	}});
	function Refresh (argument) {
					$('#contentCenter').datagrid('reload',{}); 
	}
	function FormTambahX() {
		$.get('{{route('token')}}', function(data) {
			    $('.easyui-validatebox').validatebox({required: true, width:100 });
			$('#F-INPUT').form('clear');
			$("input:hidden[name=_token]").val(data);
			$('#update').hide();
			$('#simpan').show();
				 	customTitleTab('tabX','Tambah Data Jenis SP2D Baru')

			$('#djs').layout('expand','south');
			if ($('#F-INPUT').find("input[name='_method']").length >= 1) {
				$('#F-INPUT').find("input[name='_method']").remove();
			};
		});
		
	}
	function AksiHapus() {
					var row = $('#contentCenter').datagrid('getSelected');
			if (row){
			 	// console.log(row.id);
			 	$.messager.confirm('Konfirmasi ', 'Apakah Anda ingin menghapus data '+row.nama_jenis_sppd, function(r){
			 					if (r)
			 					{
			
						 	$.post('{{url('jenis-sppd')}}/'+row.id, { _method: 'DELETE' }, function(data, textStatus, xhr) {
							 		if (textStatus=='success') {
							 			$.messager.show({  
							 			title: 'Status',  
							 			msg: data  
							 			});	
										$('#contentCenter').datagrid('reload');

							 		}
							 		else{
						 				$.messager.show({  
						 				title: 'Gagal !',  
						 				msg: 'Terjadi Kesalahan !'  
						 				});		
										$('#contentCenter').datagrid('reload');
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
										$('#contentCenter').datagrid('reload');
								    // alert( "error" );
								  });

					}
				});
			    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
			}
			
		
	}
	function  AksiKoreksi(argument) {
			var row = $('#contentCenter').datagrid('getSelected');
				// var url='google.com'
				if (row){
				 	console.log(row.id);
					 $('#update').show();
				 	$('#simpan').hide();
				 	customTitleTab('tabX','Koreksi Data Jenis SP2D '+row.nama_jenis_sppd)

				 	
					 // $('#F-INPUT').form('load',row);
					 $('#F-INPUT').form('load','{{url('jenis-sppd')}}/'+row.id+'/edit');
					 $('#djs').layout('expand','south');
					 if ($('#F-INPUT').find("input[name='_method']").length <= 1) {
					 	$('#F-INPUT').append('<input type="hidden" name="_method" value="PATCH">');
					 };
				}
				else{
					$.messager.alert('Info', 'Anda harus memilih baris di tabel terlebih dulu', 'info');
				}
		}
	
	/* handle form action ==================================================================*/
	 $(function(){
	 	$('#F-INPUT').keyup(function(event){
	 		if (event.keyCode==112) {
	 		alert('Tambah Djs key f1')

	 		}
	 		if (event.keyCode==113) {
	 		alert('Tambah Djs key f2')

	 		}
	 		if (event.keyCode==114) {
	 		alert('Tambah Djs key f4')

	 		}	if (event.keyCode==115) {
	 		alert('Tambah Djs key f4')

	 		}
	 		if (event.keyCode==27) {
	 		alert('Tambah Djs key esc')

	 		}
	 	});
	     $('#close').bind('click', function(){
	 				$('#djs').layout('collapse','south');
	     });
	     $('#simpan').bind('click', function(){

	         	$('#F-INPUT').form('submit',{  url:'{{route('jenis-sppd.store')}}',
						         		onSubmit: function(param){
						         		    var isValid = $(this).form('validate');
						         		    if (!isValid){
						         		      // $.messager.progress('close'); 
						         		        $.messager.show({  
						         		        title: 'Status',  
						         		        msg: 'data tidak lengkap'
						         		        });
						         		      return false 
						         		    }
						         		    return isValid;
						         		}, 
	         							success: function(result){

	         								if (result.code ==  200 ){
	         									$.messager.show({  
	         										title: 'Status',  
	         										msg: 'Data SKPD Berhasil Dimasukkan !'  
	         									});
	         									$('#F-INPUT').form('clear');
	         									// $('#this').dialog('close')
	         									$('#contentCenter').datagrid('reload');
	         								}
	         								else {
	         									FormTambahX()
	         									$('#contentCenter').datagrid('reload');
	         									pesan_top_center(result)
	         									// $.messager.show({  
	         									// 	title: 'Status',  
	         									// 	msg: result  
	         									// });
	         								} 
	         							} 
	         						});
	     });
	     $('#update').bind('click', function(){
	     			var row = $('#contentCenter').datagrid('getSelected');
	             // console.log($('#id').val());return false;
	             	$('#F-INPUT').form('submit',{ url:'{{url('jenis-sppd')}}/'+$('#id').val(),
							             	onSubmit: function(param){
							             	    param._method = 'PATCH';
							             	    var isValid = $(this).form('validate');
							             	    if (!isValid){
							             	      // $.messager.progress('close'); 
							             	        $.messager.show({  
							             	        title: 'Status',  
							             	        msg: 'data tidak lengkap'
							             	        });
							             	      return false 
							             	    }
							             	    return isValid;
							             	}, 
	             							success: function(result){

	             								if (result.code ==  200 ){
	             									$.messager.show({  
	             										title: 'Status',  
	             										msg: 'Data SKPD Berhasil Dimasukkan !'  
	             									});
	             									// $('#this').dialog('close')
	             									$('#contentCenter').datagrid('reload');
	             								}
	             								else {
	             									$('#contentCenter').datagrid('reload');
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