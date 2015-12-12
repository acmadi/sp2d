
@section('footer')
<script type="text/javascript">

		var tandaWindow;
		var keyrepeat;
		keyrepeat=0;
		tandaWindow=false;

		function windowHelper(idGridWindow) {
			// var tandaWindow;

			// alert();
			// var mydialog;
			$(document).keydown(function(event){
			
				// 16 shift
				// 112 f1
				if (event.keyCode==112 && keyrepeat == 0) {
						
					console.log('penerima');
					// console.log($('#windowY').get( 0 ));
				
					console.log('nilai tandaWindow '+tandaWindow );		
					if ( tandaWindow == true && keyrepeat == 0) {
						console.log('tidak sama ');
						$('#windowY').dialog('clear')
						$('#windowY').dialog('close')	
						tandaWindow = false 
						return false;
						console.log('lewat false');

					}
					else if( tandaWindow == false && keyrepeat == 0){
						keyrepeat=1;
						console.log('masuk false ');
						tandaWindow = true
						$('#windowY').dialog({
										title: 'Daftar Penerima // Tekan Esc Untuk Menutup Window ini',
										width: 400,
										height: 400,
										modal:true,cache:false,
										href: '{{route('ajaxgrid', ['page' => 'penerima'])}}/'+idGridWindow,
										minimizable:true,
										collapsible:true,
										resizable:true,
										onClose:function  (argument) {
											$('#windowY').empty();
										}, 
										buttons:[{
											text:'Pilih',
											handler:function(){
												// $('#windowY').dialog('close');
												var row = $('#contentCenter'+'_'+idGridWindow).datagrid('getSelected');//cocokan dengan 
												console.log(row);
												if (row) {
													$('#penerima_id').combogrid({url:'{{route('suplay.penerima.combobox')}}'}).combogrid('setValue', row.id); 
													console.log($('#penerima_id').combogrid('getValue'))
													// $(document).find('.panel.combo-p').remove();
													$('#windowY').panel('clear').dialog('close')
													return false

												}
												else{
													$.messager.alert('Info', 'Anda Belum memilih data di barisnya !' , 'info');
													return false

												}
												
											}
										}],
										onLoad:function(){
										   	console.log('succes!, nilai keyrepeat'+keyrepeat);
										      keyrepeat=0;
										   console.log('succes!, nilai keyrepeat'+keyrepeat);
										   $.messager.show({  
										   title: 'Status',  
										   msg: 'Silahkan !'+'Data Telah Siap'  
										   });
										   return false
										}, 
									onClose:function (x) {
									}
									}).dialog('center')	;	
						return false
							
						
					}
					else{
						keyrepeat=1;
						$.messager.alert('Info', 'Silahkan Menunggu, Data Sedang kami siapkan' , 'info');
						return false
						
						console.log('kosng');
					}

				}
				if (event.keyCode==113 && keyrepeat == 0 ) {
					

					 console.log('FOrm Unit Kerja ')
					if (tandaWindow == true && keyrepeat == 0) {
						console.log('masuk ');
						$('#windowY').dialog('clear')
						$('#windowY').dialog('close')
						tandaWindow = false
						return false;
					}
					else if(tandaWindow == false && keyrepeat == 0){
							keyrepeat=1;
							tandaWindow = true
						console.log('unit kerja ');
							$('#windowY').dialog({
											title: 'Daftar Unit Kerja // Tekan Esc Untuk Menutup Window ini',
											width: 700,
											height: 600,
											modal:true,cache:false,
											href: '{{route('ajaxgrid', ['page' => 'duk'])}}/'+idGridWindow,
											minimizable:true,
											collapsible:true,
											resizable:true,
											buttons:[{
												text:'Pilih',
												handler:function(){

													var row = $('#contentCenter'+'_'+idGridWindow).datagrid('getSelected');//cocokan dengan 
													console.log(row);
													if (row) {
														// $('#unit_kerja_id').combogrid({url:'{{route('suplay.unit-kerja.combobox')}}'}).combogrid('setValue', row.id); 
														// $('#unit_kerja_id').combobox('reload','{{route('suplay.unit-kerja.combobox')}}').combobox('setValue', row.id); 
														$('#unit_kerja_id').combobox('reload','{{route('suplay.unit-kerja.combobox')}}').combobox('setValue', row.nama_unit_kerja); 
														// console.log($('#unit_kerja_id').combogrid('getValue'))
														$('#windowY').panel('clear').dialog('close')
													return false

													}
													else{
														$.messager.alert('Info', 'Anda Belum memilih data di barisnya !' , 'info');
														return false

													}
													
												}
											}],
											onLoad:function(){
												console.log('succes!, nilai keyrepeat'+keyrepeat);
											   keyrepeat=0;
												console.log('succes!, nilai keyrepeat'+keyrepeat);
											   $.messager.show({  
											   title: 'Status',  
											   msg: 'Silahkan '+'Data Telah Siap'  
											   });
											   return false
											}, 
											onClose:function  (x) {
												
											}
										}).dialog('center')	
						return false
						
					}
					else{
						keyrepeat=1;
						$.messager.alert('Info', 'Silahkan Menunggu, Data Sedang kami siapkan' , 'info');
						
						return false
						console.log('kosong ');
					}
				


				}
				if (event.keyCode==13 && keyrepeat == 0) {
					console.log('keyrepeat '+keyrepeat);
					keyrepeat = 1
					// console.log($('#update').attr('disabled'));
					if($('#simpan').attr('disabled')  == undefined){

						console.log('simpan attribut  '+$('#simpan').attr('disabled') )
						$('#simpan').trigger( "click" );
						return false;

					}
					else if($('#update').attr('disabled') == undefined){
						console.log('update attribut  '+$('#update').attr('disabled') )
						// console.log('simpan display  '+$('#simpan').css('display') )
						$('#update').trigger( "click" );
						return false;
					}


				}	if (event.keyCode==114) {
				alert('Tambah SP2D key f3')

				}	if (event.keyCode==115) {
				alert('Tambah SP2D ---key f4')

				}
				if (event.keyCode==27) {
					keyrepeat=0;
					tandaWindow=false;
					console.log('klik esc');
				// alert('Tambah SP2D key esc')
				// console.log(typeof $('#windowY').dialog('dialog'));
				// return false;
				// $('#windowA').window('clear');
				$('#windowY').dialog('close')
						return false


				}
			})
	
			// var tombol= function  () {
			// 	// alert('reload')
			// 		$('#reload_penerima_id').on('click', function(event) {
			// 			event.preventDefault();
			// 			$('#penerima_id').combogrid({url:'{{route('suplay.penerima.combobox')}}'}); 
						
			// 		});
			// 		$('#reload_jenis_sppd_id').on('click', function(event) {
			// 			event.preventDefault();
			// 			$(this).find('.fa').removeClass('fa-lg').addClass('fa-spin');

			// 			$('#jenis_sppd_id').combobox({onLoadSuccess:function  (data) {
			// 					    	$('#reload_jenis_sppd_id').removeClass('fa-spin').addClass('fa-lg')
			// 					    	// body...
			// 					    }}).combobox('reload','{{route('suplay.jenis-sppd.combobox')}}'); 
			// 			 // $( '#jenis_sppd_id' ).switchClass( "fa-lg", "fa-spin", 1000, "easeInOutQuad" );
						
			// 		});
			// 		$('#reload_skpd_id').on('click', function(event) {
			// 			event.preventDefault();
			// 			$('#skpd_id').combogrid({url:'{{route('suplay.skpd.combobox')}}'});  
						
			// 		});
			// }
			// return {
			// 	rel:tombol
			// }
		}
		function isObjectEmpty(obj) {
		  for ( var panel in obj ) {
		    return false;
		  }
		  return true;
		}

		if ($.browser.name !== 'firefox' ) {
				$.messager.show({
					width:700,
				    title:' warning ',
				    msg:'Anda sedang menggunakan browser '+$.browser.name+', Kami Anjurkan untuk berpindah ke Mozilla'+
				     'Atau anda dapat mengunduhnya di  <a href="https://www.mozilla.org/id/firefox/new/?scene=2#download-fx">google <a> ',
				    showType:'slide',
				    style:{
				        right:'',
		                   top:document.body.scrollTop+document.documentElement.scrollTop,
		                   bottom:''
				    }
				});
		};
	</script>

	@endsection