<div class="easyui-layout" id="duk" data-options="fit:true">
			<div data-options="region:'center'">
				<div id="tt" class="easyui-tabs" fit="true">
				<div title="Laporan SP2D Per-SKPD Tahun">
				
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
				Pilih SKPD :   
				<input id="skpd_id" name="skpd_id"  class="easyui-combobox" style="width:30%"> PILIH TAHUN : 
				<input id="tahun" name="tahun"  class="easyui-combobox" style="width:30%">

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
		$('#skpd_id').combobox({
		    url:'{{route('suplay.skpd.combobox')}}',
		    // method:'get',
		    valueField:'id',
		    textField:'nama_skpd'
		});

		$('#contentCenter').datagrid(
		{
			url:'{{route('lap.prev.data',['data'=>'per_skpd_tahun'])}}',
			// title:'Daftar Unit Kerja',
			toolbar: '#tb',
			columns:[[ 
		{field:'nama_jenis_sppd',title:'Jenis SP2D ',width:20},
		{field:'spm_jumlah',title:'Jumlah SPM',width:20},
		{field:'spm_nilai',title:'Nilai SPM',width:20,
		formatter: function(value,row,index){
			if (row.spm_nilai){
				return toRp(row.spm_nilai);
			} else {
				return toRp(00);
			}
		}},
		{field:'spm_potongan',title:'Potongan SPM',width:20,
		formatter: function(value,row,index){
			if (row.spm_potongan){
				return toRp(row.spm_potongan);
			} else {
				return toRp(00);
			}
		}},
		{field:'sppd_jumlah',title:'Jumlah SP2D',width:20},
		{field:'sppd_nilai',title:'Nilai SP2D',width:20,
		formatter: function(value,row,index){
			if (row.sppd_nilai){
				return toRp(row.sppd_nilai);
			} else {
				return toRp(00);
			}
		}
		},
		{field:'keterangan',title:'Keterangan',width:20,
			formatter: function(value,row,index){
				// .isNaN(testValue)
				return !isNaN(parseFloat(row.keterangan)) && parseFloat(row.keterangan)>0 ?row.keterangan+' Butah SP2D Telat':'';
				// return IsNumeric(row.keterangan)?row.keterangan+' Butah SP2D Telat':'';
				// return row.keterangan +' Butah SP2D Telat';
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
				var skpd_id= $('#skpd_id').combobox('getValue');
				$('#contentCenter').datagrid('load', {
					tahun: tahun,
					skpd_id: skpd_id
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
				var skpd_id= $('#skpd_id').combobox('getValue');
					$.download("{{route('pdf',['pdf'=>'per_skpd_tahun'])}}", { tahun: tahun,
					skpd_id: skpd_id, _token:'{{csrf_token()}}'  }, 'post')
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