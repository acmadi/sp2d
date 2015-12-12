<div class="easyui-layout" id="duk" data-options="fit:true">
			<div data-options="region:'center'">
				<div id="tt" class="easyui-tabs" fit="true">
				<div title="Laporan SP2D berdasarkan Tahun ">
				
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
				 TAHUN AWAL : 
				<input id="awal_tahun" name="awal_tahun"  class="easyui-combobox" style="width:30%">
				TAHUN AKHIR : <input id="akhir_tahun" name="akhir_tahun"  class="easyui-combobox" style="width:30%">

				<a id="cari" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</a>
				<a id="pdf" style="display:none" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cetak PDF</a>
				<!-- <a id="excel"  style="display:none"href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cetak Excel</a> -->
			</form>
			</div>
		</div>
		<!-- ======================================================================================= -->
		<script type="text/javascript">

		$('#awal_tahun,#akhir_tahun').combobox({
			url:'{{route('tahun')}}',
			valueField:'id',
			textField:'textXX',
			onSelect: function(filter){
				console.log(filter);
				
			}
		})
		$('#contentCenter').datagrid(
		{
			url:'{{route('lap.prev.data',['data'=>'tahun'])}}',
			// title:'Daftar Unit Kerja',
			toolbar: '#tb',
			columns:[[
		{field:'tahun',title:'Tahun ',width:20},
		{field:'jumlah',title:'Jumlalh SP2D',width:20},
		{field:'spm',title:'Nilai SP2D',width:20,
		formatter: function(value,row,index){
			if (row.spm){
				return toRp(row.spm);
			} else {
				return toRp(00);
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
				var awal_tahun= $('#awal_tahun').combobox('getValue');
				var akhir_tahun= $('#akhir_tahun').combobox('getValue');
				$('#contentCenter').datagrid('load', {
					awal_tahun: awal_tahun,	    
					akhir_tahun: akhir_tahun    
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
				var awal_tahun= $('#awal_tahun').combobox('getValue');
				var akhir_tahun= $('#akhir_tahun').combobox('getValue');
					$.download("{{route('pdf',['pdf'=>'tahun'])}}", { awal_tahun: awal_tahun,akhir_tahun:akhir_tahun, _token:'{{csrf_token()}}'  }, 'post')
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