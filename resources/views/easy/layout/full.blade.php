<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>sppd</title>
	<!-- <link rel="stylesheet" type="text/css" href="../../themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../../themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../demo.css"> -->

	<link rel="stylesheet" type="text/css" href="{{asset('asset/themes/default/easyui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('asset/themes/icon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('asset/demo.cs')}}">
		<!-- <link rel="stylesheet" type="text/css" href="./assets/plugins/font-awesome/css/font-awesome.min.css"> -->
		<!-- <link rel="stylesheet" type="text/css" href="./assets/css/themes.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('asset/fontawesome/css/font-awesome.css')}}">

	<script type="text/javascript" src="{{asset('asset/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset/jquery.easyui.min.js')}}"></script>

		<!-- <script type="text/javascript" src="./assets/js/foundation.min.js"></script>-->
		<style type="text/css">
		.fa{
			font-size: 17px;
		}
		</style>
</head>
<body class="easyui-layout">

	<!-- header ============================================================= -->
	<div data-options="region:'north',border:true" style="height:140px; ">
		<div style="min-height:100%;  background: none repeat scroll 0 0 #a9facd; padding:3px 0px 3px 10px; ">
			<div id="logo" style="display:inline-block; min-width:20%; height:60px; padding:5px; border: medium solid; ">image</div>
			<div id="logo" style="display:inline-block; min-width:20%; height:60px; padding:5px; ">Applikasi SPPD V.01</div>
			<div id="logo" style="float:right; display:inline-block; min-width:20%; height:60px; padding:5px; ">xxxx</div>
		</div>
		<div class="easyui-tabs"  data-options="" style="position:absolute; bottom:0px; height:65px; width:auto">
			<div title="..: Applikasi SPPD -- Surat Perjalanan Perintah Dinas :.." style="padding:0px"  data-options="fit:true">

				<div id="menus" style="position:absolute; bottom:0px; padding:3px 3px 3px 10px ;">
					<a href="#" class="easyui-linkbutton" data-options="plain:true" onclick="javascript:openPage('Home.html');"> <i class="fa fa-home fa-2x">Home</i></a>
					<a href="#" class="easyui-menubutton" data-options="menu:'#mm1',iconCls:''"><i class="fa fa-database fa-2x">Data Master</i></a>
					<a href="#" class="easyui-menubutton" data-options="menu:'#mm2',iconCls:''"><i class="fa fa-file-image-o e fa-2x">Dokumen SPPD</i></a>
					<a href="#" class="easyui-menubutton" data-options="menu:'#mm3'"><i class="fa fa-file-text fa-2x">Manajement</i></a>
					<a href="#" class="easyui-menubutton" data-options="menu:'#mm4'"><i class="fa fa-user-plus fa-2x">Admin</i></a>
					<a href="#" class="easyui-linkbutton" data-options="plain:true" onclick="javascript:alert('logout');logout('easyui');"> <i class="fa fa-user-times fa-2x">Keluar</i></a>
				</div>
			</div>

		</div>
		
	</div>

	<!-- content ============================================================= -->
	<div data-options="region:'center',border:false">
		<div id="content-x" style="width:100%;height:100%">
			<div class="easyui-layout" data-options="fit:true">
				<div data-options="region:'center'">
					<div id="tt" class="easyui-tabs" fit="true">
					<div title="Daftar Dokumen SPPD">
						<table id="contentCenter" fit="true" style="widht: 10000px;" >
						</table>
					</div>
					</div>
				</div>

				<div data-options="region:'south',split:true" style="height:200px;"> 
					<div class="easyui-tabs"  data-options="fit:true">
						<!-- form ================================================= -->
						<div title="Daftar Dokumen SPPD" id="formBottom"  style="padding:3px 0px 0px 10px"  data-options="">
							<div id="formBottom" style=""  >
								<form id="ff" method="post">
									<div id="ForInput" style="width:70%; display:inline-block; float:left; ">
										
										<div style="padding: 2px 0px 10px 10px;"> 
											<label style="display:inline-block; width: 20%"for="nama_singkat">Nama Jenis SPPD : </label>
											<input class="easyui-validatebox" type="text" name="nama_singkat" data-options="validType:'email',required:true" style="width:700px" />
										</div>
										<div style="padding: 2px 0px 10px 10px;"> 
											<label style="display:inline-block; width: 20%"for="nama_singkat">Nama Singkat SPPD : </label>
											<input class="easyui-validatebox" type="text" name="nama_singkat_unit_kerja" data-options="validType:'email',required:true" />
										</div>
									</div>

									<div id="ForButton" style="padding: 2px 0px 10px 10px; display:inline-block;  border:solid;padding:0px 20px 0px 0px;">
										<input type="button" value="Simpan" style="display:block; padding:10px 10px 10px 10px; margin: 0px 0px 20px 0px; ">
										<input type="button" value="Close" style="display:block; padding:10px 10px 10px 10px; margin: 0px 0px 20px 0px; ">
									</div>

								</form>

							</div>


						</div>

					</div>


				</div>
			</div>
		</div>
	</div>


</div>


<!-- widget:  window, dialog, panel ============================================================= -->

<div id="windowA"  title="Window A" style="width:90%;height:100%"></div>
<div id="windowB" ></div>
<div id="windowC" ></div>


    <!-- <div id="win" class="easyui-window" title="My Window" style="width:600px;height:400px"
    data-options="iconCls:'icon-save',modal:true">
 
    </div> -->

<div id="mm1" style="width:150px;">
	<div data-options="iconCls:'fa fa-home'" ><a href="#" data-link="xxx"><a href="#" data-link="dds.html">Data SKPD</a></div>
	<div data-options="iconCls:'icon-redo'"><a href="#" data-link="xxx"><a href="#" data-link="duk.html">Data Unit Kerja</a></div>
	<div class="menu-sep"></div>
	<div><a href="#" data-link="djs.html">Daftar Jenis SPPD</a></div>
<!-- 	<div><a href="#" data-link="xxxCopy">Copy</a></div>
	<div><a href="#" data-link="xxxPaste">Paste</a></div> -->
			<!-- 	<div class="menu-sep"></div>
				<div>
					<span>Toolbar</span>
					<div>
						<div>Address</div>
						<div>Link</div>
						<div>Navigation Toolbar</div>
						<div>Bookmark Toolbar</div>
						<div class="menu-sep"></div>
						<div>New Toolbar...</div>
					</div>
				</div> 
				<div data-options="iconCls:'icon-remove'">Delete</div>
				<div>Select All</div>-->
			</div>
			<div id="mm2" style="width:100px;">
				<div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx"><a href="#" data-link="lds.html">List Dokumen SPPD</a></div>
				<div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx"><a href="#" data-link="eds.html">Entry Data</a></div>
				<div class="menu-sep"></div>
				<div>
					<span>Pelaporan SPPD</span>
					<div id="submm2" >
						<div><a href="#" onclick="javascript:openPage('jst.HTML');"  data-link="jst.HTML"  >Jumlah SPPD Berdasarkan Tahun</a></div>
						<div><a href="#" onclick="javascript:openPage('jsj.HTML');" data-link="jsj.HTML" >Jumlah SPPD Berdasarkan Jenis</a></div>
						<div class="menu-sep"></div>
						<div><a href="#"  onclick="javascript:openPage('jss.HTML');"  data-link="jss.HTML" >Jumlah SPPD menurut SKPD</a></div>
						<div><a href="#"  onclick="javascript:openPage('jsjs.HTML');"  data-link="jsjs.HTML">Jumlah SPPD Berdasarkan Jenis Per SKPD</a></div>

					</div>
				</div>

				<!-- <div>Help</div>
				<div>Update</div>
				<div>About</div> -->
			</div>
			<div id="mm3" style="width:100px;">
				<div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx">Setting Applikasi</a></div>
				<div class="menu-sep"></div>
				<div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx">Manajemen User</a></div>
				<div class="menu-sep"></div>
				<div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx">Hak Akses</a></div>
				<div class="menu-sep"></div>
				
			</div>
			<div id="mm4" style="width:100px;">
				<div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx">User Profile</a> </div>
				<div class="menu-sep"></div>
				<div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx">Password</a> </div>
				<div class="menu-sep"></div>
				<div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx">Help</a></div>
				<div class="menu-sep"></div>
				<div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx">Logout</a></div>
				<div class="menu-sep"></div>
				
			</div>

			<!-- datagrid toolbarrrr ================================================== -->
			<div id="tb" style="padding:5px;height:auto">
				<div style="margin-bottom:5px">
					<a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" onclick="javascript:TambahDokSPPD('Home');"plain="true">Tambah </a>
					<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"> Koreksi</a>
					<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Refresh</a>
					<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Lihat Dokumen</a>
					<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Hapus</a>
					<!-- <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true">Tampilkan Filter Dokumen</a> -->
					<input type="checkbox">Tampilkan Filter Dokumen
				</div>
				<div>
					Nama SKPD :   
					<input id="cc_skpd" class="easyui-combobox" style="width:700px"
					
					>
				</div>
			</div>
			<!-- JS for bottstrap  ============================================================= -->
			<script type="text/javascript">
				$('#mm').menu({
					onClick:function(item){
		        //...
		    }
		});
				$('#contentCenter').datagrid(
				{
					url:'datagrid_data1.json',
					// title:'Daftar Unit Kerja',
					toolbar: '#tb',
					columns:[[
			// {field:'productid',title:'No',width:200},
			{field:'productid',title:'Tahun ',width:20},
			{field:'productid',title:'No. SPPD ',width:20},
			{field:'productid',title:'Tgl. SPPD '},
			{field:'productid',title:'Jenis SPPD ',width:20},
			{field:'productid',title:'SKPD ',width:20},
			{field:'productid',title:'Penerima ',width:20},
			{field:'productid',title:'Keperluan ',width:20}
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
			fitColumns:true
			// scrollbarSize:10,
			// pageSize:10
		});

				$('#cc_skpd, #cc_skpd2').combobox({
					url:'combobox_data.json',
					valueField:'id',
					textField:'text',
					onSelect: function(rec){
						alert('selected')
				// var url = 'get_data2.php?id='+rec.id;
				// $('#cc2').combobox('reload', url);
			}

		});


		jQuery(document).ready(function($) {
				$( "p" ).click(function( event ) {
				alert( event.currentTarget === this ); // true
				});
			$('#mm1,#mm2,#mm3,#mm4,submm2').on('click', function(event) {
				// event.preventDefault();
				// event.target.is('a')
				// console.log($('#menus,#mm1,#mm2,#mm3,#mm4').find('a'));
				console.log(event.target);
					if ($(event.target).is('a')) {
						openPage($(event.target).attr('data-link'))
					
				};

				
			});
		});
		function openPage(url) {
			$.get(url, function(data) {
				var isi= $('#content-x').empty().html(data)
				console.log(isi);
				

			});
		}


	</script>

</body>
</html>