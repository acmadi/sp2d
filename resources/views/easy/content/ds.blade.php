
<div class="easyui-layout" id="dds" data-options="fit:true">
	<div data-options="region:'center'">
	
		<div id="tt" class="easyui-tabs" fit="true">
			<div title="Daftar Data SKPD">

				<table id="contentCenter" fit="true" style="widht: 1000px;" >
				</table>
			</div>
		</div>
	

		</div>

		<div data-options="region:'south',split:true " style="height:200px;" > 
			<div class="easyui-tabs" id="tabX"  data-options="fit:true">
				<div title="Form Tambah SKPD" id="formBottom"  style="padding:3px 0px 0px 10px; "  data-options="">
						<form id="F-INPUT"  method="post" action="{{route('skpd.store')}}">

								<input type="hidden" name="_method" value="PATCH">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

							<input type="hidden" name="id" id="id" value="">	
							<div id="ForInput" style="width:70%; display:inline-block; top:0px; float:left; ">
								<div style="padding: 2px 0px 10px 10px;">

									<label for="nama_skpd" style="display:inline-block; width: 20%">Nama SKPD  </label>

									: <input  type="text" name="nama_skpd" class="easyui-validatebox textbox"   placeholder="Nama SKPD" data-options="prompt:'Nama SKPD ', required:true "/>

								</div>
								<div style="padding: 2px 0px 10px 10px;"> 
									<label style="display:inline-block; width: 20%"for="nama_singkat">Nama Singkatan  </label>

									: <input type="text" name="nama_singkat_skpd" 
									class="easyui-validatebox textbox"   placeholder="Nama Singkat SKPD" data-options="prompt:'Nama Singkat SKPD', required:true " />

								</div>
							</div>

							<div id="ForButton" style="padding: 2px 0px 10px 10px; display:inline-block;  padding:0px 20px 0px 0px;">
							<a id="simpan" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-floppy-o'">Simpan</a>
							<a id="update" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-check-square-o'" >update</a>
							<br>
							<br>
							<a id="close" href="#" class="easyui-linkbutton" data-options="iconCls:'fa fa-close	'">Close</a>
								<!-- <input type="submit" value="Simpan"> -->
								<!-- <input type="button" value="close"  id="close"> -->
							</div>

						</form>



				</div>

			</div>


		</div>
	</div>
</div>
<!-- datagrid toolbarrrr ================================================== -->
<div id="tb" style="padding:5px;height:auto">
	<div style="margin-bottom:5px">
		<a href="#" id="Ftambah"class="easyui-linkbutton" iconCls="fa fa-plus " plain="true" onclick="javascript:FormTambah(this);"> Tambah </a>
		<a href="#" class="easyui-linkbutton" iconCls="fa fa-check-square-o" plain="true" onclick="javascript:AksiKoreksi();"> Koreksi</a>
		<a href="#" class="easyui-linkbutton" iconCls="fa fa-refresh" plain="true" onclick="javascript:Refresh();" > Refresh</a>
		<a href="#" class="easyui-linkbutton" iconCls="fa fa-close" plain="true" onclick="javascript:AksiHapus();" > Hapus</a>
	</div>
	
</div>

<script type="text/javascript">
$('#vv').validatebox({
    required: true,
    validType: 'email'
});
function FormTambah (argument) {
	$.get('{{route('token')}}', function(data) {
		    $('.easyui-validatebox').validatebox({required: true, width:100 });
		$('#F-INPUT').form('clear');
		$("input:hidden[name=_token]").val(data);
		customTitleTab('tabX','Tambah Data SKPD Baru')
		$('#dds').layout('expand','south');
		if ($('#F-INPUT').find("input[name='_method']").length >= 1) {
		$('#F-INPUT').find("input[name='_method']").remove();
		};
		$('#update').hide();
		$('#simpan').show();
	
	});
}
function AksiKoreksi (argument) {
	var row = $('#contentCenter').datagrid('getSelected');
	// var url='google.com'
	if (row){
	 	console.log(row);
		 $('#update').show();
	 	$('#simpan').hide();
	 	customTitleTab('tabX','Koreksi Data SKPD '+row.nama_skpd)
	 	// var pp = $('#tabX').tabs('getSelected'); 
	 	// // var tab = pp.panel('options').tab;
	 	//  $('#tabX').tabs('update',{
		 // 	tab:pp,
		 // 	options : {
		 // 	title : 'Koreksi Data " '+row.nama_skpd+' "'
		 // 	}
	 	// }); 
	
		 // $('#F-INPUT').form('load',row);
		 $('#F-INPUT').form('load','{{url('skpd')}}/'+row.id+'/edit');
		 $('#dds').layout('expand','south');
		 if ($('#F-INPUT').find("input[name='_method']").length <= 1) {
		 	$('#F-INPUT').append('<input type="hidden" name="_method" value="PATCH">');
		 };
		  // $('#F-INPUT').find("input[name='_method']").remove();

	    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
	}
	else{
		$.messager.alert('Info', 'Anda harus memilih baris di tabel terlebih dulu', 'info');
	}
	
}
function Refresh (argument) {
				$('#contentCenter').datagrid('load',{}); 
}
function AksiHapus (argument) {
	var row = $('#contentCenter').datagrid('getSelected');
	
	if (row){
	 	console.log(row.id);
	 	$.messager.confirm('Konfirmasi ', 'Apakah Anda ingin menghapus data '+row.nama_skpd, function(r){
			if (r)
			{
				 	$.post('{{url('skpd')}}/'+row.id, { _method: 'DELETE' }, function(data, textStatus, xhr) {
				 		// console.log(data)
				 		// console.log(textStatus)
				 		// console.log(xhr)
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
								$('#contentCenter').datagrid('re load');
					 		}
					 	}).fail(function(data) {
					 		$.messager.show({  
					 		title: 'Gagal !',  
					 		msg: 'Kegagalan koneksi , periksa lagi jaringan anda  !'  
					 		});	
								$('#contentCenter').datagrid('re load');
						  });

			}
		});
	    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
	}
	
}
/* setting loading page=================================================================*/
	var toolbarx=[
	{
		text:'Tambah',
		iconCls: 'fa fa-plus',
		handler: function(){
			// alert('tambah');
			$.get('{{route('token')}}', function(data) {
				    $('.easyui-validatebox').validatebox({required: true, width:100 });
				$('#F-INPUT').form('clear');
				$("input:hidden[name=_token]").val(data);
				$('#dds').layout('expand','south');
				if ($('#F-INPUT').find("input[name='_method']").length >= 1) {
				$('#F-INPUT').find("input[name='_method']").remove();
				};
				$('#update').hide();
				$('#simpan').show();
			
			});
					 // console.log($( "input[name='_method']" ).val())
					 // var find =$( "input[name='_method']" ).val('');
					 // // var find=$('#F-INPUT').find("input:name['_method']");
					 // console.log(find);
					 // console.log($( "input[name='_method']" ).val())
			}
		},{
			text:'Koreksi',
			iconCls: 'fa fa-close',
			handler: function(){
				// alert('dddddddddddddd')
				// return false
				var row = $('#contentCenter').datagrid('getSelected');
				// var url='google.com'
				if (row){
				 	console.log(row.id);
					 $('#update').show();
				 	$('#simpan').hide();
					 // $('#F-INPUT').form('load',row);
					 $('#F-INPUT').form('load','{{url('skpd')}}/'+row.id+'/edit');
					 $('#dds').layout('expand','south');
					 if ($('#F-INPUT').find("input[name='_method']").length <= 1) {
					 	$('#F-INPUT').append('<input type="hidden" name="_method" value="PATCH">');
					 };
					  // $('#F-INPUT').find("input[name='_method']").remove();

				    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
				}
				else{
					$.messager.alert('Info', 'Anda harus memilih baris di tabel terlebih dulu', 'info');
				}
			}
		},{
			text:'Refresh',
			iconCls: 'fa fa-refresh',
			handler: function(){
				$('#contentCenter').datagrid('reload'); 
			}
		},{
			text:'Hapus',
			iconCls: 'fa fa-times',
			handler: function(){
				var row = $('#contentCenter').datagrid('getSelected');
				
				if (row){
				 	console.log(row.id);
				 	var url=''
				
				 	$.post('{{url('skpd')}}/'+row.id, { _method: 'DELETE' }, function(data, textStatus, xhr) {
				 		// alert(data)
				 		// console.log(data)
				 		// console.log(textStatus)
				 		// console.log(xhr)
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
								$('#contentCenter').datagrid('re load');
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
								$('#contentCenter').datagrid('re load');
						    // alert( "error" );
						  });

				
				    // $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
				}
			}
		}
		];
	
	$('#contentCenter').datagrid(
	{
		url:'{{route('skpd.data')}}',
	// title:'Daftar Detail SKPD',
	toolbar: '#tb',
		columns:[[
		// {field:'productid',title:'No',width:200},
		{field:'nama_skpd',title:'Nama SKPD ',width:20},
		{field:'nama_singkat_skpd',title:' Nama Singkat SKPD'}
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
	$('#content-x').find('.easyui-layout').layout()
	$('#content-x').find('.easyui-linkbutton').linkbutton()
	$('#content-x').find('.easyui-tabs').tabs()
	$('#dds').layout('collapse','south');

	/* form button handel============================================================================*/
	$(function(){
	    $('#close').bind('click', function(){
					$('#dds').layout('collapse','south');
	        // alert('easyui');
	    });
	    $('#simpan').bind('click', function(){

	        	$('#F-INPUT').form('submit',{  url:'{{route('skpd.store')}}',
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
	        									FormTambah()
	        									$('#contentCenter').datagrid('reload');
	        									pesan_top_center(result)
	        									// var pesan='';
	        									// var obj = jQuery.parseJSON( result );
	        									// $.each(obj.errors, function(index, val) {
	        									// 			 // console.log(index);
	        									// 			 // console.log(typeof val);
	        									// 			 pesan +='<li>'+ val[0] +'</li>';

	        									// });
	        									// pesan ='<ul>'+pesan+'<ul>';
	        									// // alert( obj.name === "John" );
	        									// $.messager.show({  
	        									// 	width:400,
	        									// 	timeout:30000,
	        									// 	height:150, 
	        									// 	style:{
	        									// 			// backgroundColor:red,
	        									// 			// padding:0,
	        									// 			right:'',
	        									// 			top:document.body.scrollTop+document.documentElement.scrollTop,
	        									// 			bottom:''
	        									// 		},
	        									// 	title: 'Status',  
	        									// 	msg: pesan  
	        									// });
	        								} 
	        							} 
	        						});
	    });
	    $('#update').bind('click', function(){
				var row = $('#contentCenter').datagrid('getSelected');
	        // console.log($('#id').val());return false;
	        	$('#F-INPUT').form('submit',{ url:'{{url('skpd')}}/'+$('#id').val(), 
	        							onSubmit: function(param){
            								    param._method = 'PATCH';
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