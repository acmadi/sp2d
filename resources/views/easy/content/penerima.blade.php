<?php 
?>
<div class="easyui-layout" id="penerima{{'_'.$grida }}" data-options="fit:true">
			<div data-options="region:'center'">
				<div id="tt{{'_'.$grida }}" class="easyui-tabs" fit="true">
				<div title="Daftar Penerima"> 
				
				<table id="contentCenter{{'_'.$grida }}" fit="true" style="widht: 10000px;" >
				</table>
				</div>
				</div>
			</div>
			<div data-options="region:'south',split:true" style="height:100px;"> 
				<div class="easyui-tabs" id="tabX{{'_'.$grida }}"  data-options="fit:true">
					<!-- form ================================================= -->
					<div title="Form Data Unit Kerj" id="formBottom{{'_'.$grida }}"  style="padding:3px 0px 0px 10px"  data-options="">
							<form id="F-INPUT{{'_'.$grida }}"  onsubmit="return false;" method="post">
							{!! csrf_field() !!}
								<input type="hidden" name="id" id="id{{'_'.$grida }}">
								<div id="ForInput{{'_'.$grida }}" style="width:70%; display:inline-block; float:left; ">
								
									<div style="padding: 2px 0px 10px 10px;"> 
										<label style="display:inline-block; width: 20%"for="nama_singkat">Nama Penerima </label>
										
										<input class="easyui-validatebox textbox" type="text" name="nama_penerima" data-options="validType:'',required:true" />
									</div>
								</div>

								<div id="ForButton{{'_'.$grida }}" style="padding: 2px 0px 10px 10px; display:inline-block; padding:0px 20px 0px 0px;">

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
				<a href="#" id="Ftambah{{'_'.$grida }}"class="easyui-linkbutton" iconCls="fa fa-plus " plain="true" onclick="javascript:FormTambah(this);"> Tambah </a>
				<a href="#" class="easyui-linkbutton" iconCls="fa fa-check-square-o" plain="true" onclick="javascript:AksiKoreksi{{'_'.$grida }}();"> Koreksi</a>
				<a href="#" class="easyui-linkbutton" iconCls="fa fa-refresh" plain="true" onclick="javascript:Refresh{{'_'.$grida }}();" > Refresh</a>

				<a href="#" class="easyui-linkbutton" iconCls="fa fa-close	" plain="true" onclick="javascript:AksiHapus{{'_'.$grida }}();" > Hapus</a>
			</div>
			
		</div>
		<script type="text/javascript">
		// $.extend($.fn.linkbutton.methods, {
		//     disable: function(jq, newposition){
		//     	console.log(jq);
		//     	// alert('linkbuton disable')
		//             // $(this).linkbutton('disable');
		//         // return jq.each(function(){
		//     	// jq.linkbutton('disable')
		//         // });
		//     }
		// });
/* Load Grid Handling ===============================================================================*/
	 						
		$('#contentCenter{{'_'.$grida }}').datagrid(
		{
			url:'{{route('penerima.data')}}',
			// title:'Daftar Unit Kerja',
			toolbar: '#tb{{'_'.$grida }}',
			columns:[[
		// {field:'productid',title:'No',width:200},
		{field:'nama_penerima',title:'Penerima ',width:20},
		// {field:'nama_unit_kerja',title:'Nama Unit Kerja',width:20},
		// {field:'nama_unit_kerja',title:'',width:20},
		// {field:'nama_singkat_unit_kerja',title:'Nama Singkat Unit Kerja ',width:20}
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
		onLoadSuccess: function  (data) {
		 $('meta[name="csrf-token"]').attr('content',data.token);
		}
		// scrollbarSize:10,
		// pageSize:10
	});


			$('.easyui-layout').layout()
			$('.easyui-linkbutton').linkbutton()
			$('.easyui-tabs').tabs()
			$('#penerima{{'_'.$grida }}').layout('collapse','south');

			// $('#penerima').layout();{{'_'.$grida }}
/* Action Handling ======================================================================================*/
	function Refresh{{'_'.$grida }}(argument) {
					$('#contentCenter{{'_'.$grida }}').datagrid('load',{}); 
	}
	function FormTambah(ini) {
			// $('#penerima').layout('expand','south');{{'_'.$grida }}
			$(ini).linkbutton('disable');
			$.get('{{route('token')}}', function(data) {
					// $(ini).linkbutton('enable');
				    $('.easyui-validatebox').validatebox({required: true, width:100 });
						$('#F-INPUT{{'_'.$grida }}').form('clear');
						$("input:hidden[name=_token]").val(data);
				 	customTitleTab('tabX{{'_'.$grida }}','--: Tambah Data Penerima Baru :--')

					$('#penerima{{'_'.$grida }}').layout('expand','south');
					if ($('#F-INPUT{{'_'.$grida }}').find("input[name='_method']").length >= 1) {
						$('#F-INPUT{{'_'.$grida }}').find("input[name='_method']").remove();
					};
					$('#update{{'_'.$grida }}').hide();
					$('#simpan{{'_'.$grida }}').show();
			});
		
	}
	function AksiHapus{{'_'.$grida }}() {
		var row = $('#contentCenter{{'_'.$grida }}').datagrid('getSelected');
		
		if (row){
		 	$.messager.confirm('Konfirmasi ', 'Apakah Anda ingin menghapus data '+row.nama_penerima, function(r){
				if (r)
				{
				 	$.post('{{url('penerima')}}/'+row.id, { _method: 'DELETE' }, function(data, textStatus, xhr) {
				 		// alert(data)
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
		else{
			$.messager.alert('Info', 'Anda harus memilih baris di tabel terlebih dulu', 'info');
		}
		
	}
	function  AksiKoreksi{{'_'.$grida }}(argument) {
		var row = $('#contentCenter{{'_'.$grida }}').datagrid('getSelected');
		// var url='google.com'
		if (row){
			 $('#update{{'_'.$grida }}').show();
		 	$('#simpan{{'_'.$grida }}').hide();
			 // $('#F-INPUT').form('load',row);{{'_'.$grida }}
			 $('#F-INPUT{{'_'.$grida }}').form('load','{{url('penerima')}}/'+row.id+'/edit');
				 	customTitleTab('tabX{{'_'.$grida }}','Koreksi Data Penerima '+row.nama_penerima)

			 $('#penerima{{'_'.$grida }}').layout('expand','south');
			 if ($('#F-INPUT{{'_'.$grida }}').find("input[name='_method']").length <= 1) {
			 	$('#F-INPUT{{'_'.$grida }}').append('<input type="hidden" name="_method" value="PATCH">');
			 };
		}
		else{
			$.messager.alert('Info', 'Anda harus memilih baris di tabel terlebih dulu', 'info');
		}
	}
			
	

/* handle submit form================================================================================================*/

	$(function(){


	    $('#close{{'_'.$grida }}').bind('click', function(){
	    	// alert('close')
					$('#penerima{{'_'.$grida }}').layout('collapse','south');
	        // alert('easyui');
	    });
	    $('#simpan{{'_'.$grida }}').bind('click', function(){

	        	$('#F-INPUT{{'_'.$grida }}').form('submit',{  url:'{{route('penerima.store')}}',
	        							success: function(result){
	        								// console.log(result);
	        									pesan_top_center(result)
	        									
	        								if (result.succes){
	        									$('#F-INPUT{{'_'.$grida }}').form('clear');
		        									FormTambah()
	        									$('#contentCenter{{'_'.$grida }}').datagrid('reload');
	        								}
	        								else {
	        									// pesan_top_center(result)
	        									$('#contentCenter{{'_'.$grida }}').datagrid('reload');
	        								} 
	        							} 
	        						});
	    });
	    $('#update{{'_'.$grida }}').bind('click', function(){
	    			var row = $('#contentCenter{{'_'.$grida }}').datagrid('getSelected');
	            	$('#F-INPUT{{'_'.$grida }}').form('submit',{ url:'{{url('penerima')}}/'+$('#id{{'_'.$grida }}').val(),
	            							onSubmit: function(param){
	            							    param._method = 'PATCH';
	            							},
	            							success: function(result){
												pesan_top_center(result)
	            								if (result.succes){
	            									// $('#this').dialog('close'){{'_'.$grida }}
	            									$('#contentCenter{{'_'.$grida }}').datagrid('reload');
	            								}
	            								else {
	            									$('#contentCenter{{'_'.$grida }}').datagrid('reload');
	            									
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