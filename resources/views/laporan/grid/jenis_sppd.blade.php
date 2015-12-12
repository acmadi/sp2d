<div class="easyui-layout" id="duk" data-options="fit:true">
			<div data-options="region:'center'">
				<div id="tt" class="easyui-tabs" fit="true">
				<div title="Laporan SP2D berdasarkan Jenis SP2D">
				
				<table id="contentCenter" fit="true" style="widht: 10000px;" >
				</table>
				</div>
				</div>
			</div>
		</div>
		<!-- datagrid toolbarrrr ================================================== -->
		<div id="tb" style="padding:5px;height:auto">
			<div>
			<form id="filterx" method="post" action="{{route('lap.prev.data',['data'=>'tahun'])}}">
				TAHUN :   
				<input id="tahun" name="tahun"  class="easyui-combobox" style="width:30%">
				<!-- <input id="akhir_tahun" name="akhir_tahun"  class="easyui-combobox" style="width:30%"> -->

				<a id="cari" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</a>
				<a id="pdf" style="display:none" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cetak PDF</a>
				<!-- <a id="excel"  style="display:none"href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cetak Excel</a> -->
			</form>
			</div>
		</div>
		<!-- ======================================================================================= -->
		<script type="text/javascript">

		$('#tahun').combobox({
			url:'{{route('tahun')}}',
			valueField:'id',
			textField:'textXX',
			onSelect: function(filter){
				console.log(filter);
				
			}
		})
		$('#contentCenter').datagrid(
		{
			url:'{{route('lap.prev.data',['data'=>'jenis_sppd'])}}',
			// title:'Daftar Unit Kerja',
			toolbar: '#tb',
			columns:[[
		{field:'nama_jenis_sppd',title:'Jenis SP2D ',width:20},
		{field:'sppd_jumlah',title:'Jumlalh SP2D',width:20,
		},
		{field:'sppd_nilai',title:'Nilai SP2D',width:20, 
		formatter: function(value,row,index){
			if (row.sppd_nilai){
				return toRp(row.sppd_nilai);
			} else {
				return 'tidak terdaftar : '+value;
			}
		}
		}
		]],
		onLoadSuccess: function  (argument) {
			if (argument.rows.length >= 1) {
					$('#excel,#pdf').show();
					return false;
				};
				$('#excel,#pdf').hide();
				return false;
			},
		// height: 200,
		// pagination : true,
		// remoteSort:true,
		rownumbers : true,
		// singleSelect:true,
		striped:true, 
		collapsible:true,
		autoRowHeight:true,
		fitColumns:true
		// scrollbarSize:10,
		// pageSize:10

	});


		$('#content-x').find('.easyui-layout').layout()
		$('#content-x').find('.easyui-linkbutton').linkbutton()
		$('#content-x').find('.easyui-tabs').tabs()
		$('#duk').layout();
/* handle submit form ===================================================================================*/
		$(function(){
			$('#cari').bind('click', function(){
				var tahun= $('#tahun').combobox('getValue');
				$('#contentCenter').datagrid('load', {
					tahun: tahun
				});
				return false;
				$('#filterx').form('submit',{  
					success: function(result){
						$('#contentCenter').datagrid('load',{result});
					} 
				});
			});
			$('#pdf').bind('click', function(){
				/* parameter ======================================================================*/
				var tahun= $('#tahun').combobox('getValue');
					$.download("{{route('pdf',['pdf'=>'jenis_sppd'])}}", { tahun: tahun, _token:'{{csrf_token()}}'  }, 'post')
				return false;
			});
			$('#excel').bind('click', function(){
					$('#filterx').form('submit',{
						url:'',
						success: function(result){
							$('#contentCenter').datagrid('load',{result});
						} 
					});
			});

		});

 </script>