<div style="    max-width: 100%;
    max-height: 100%;
    overflow: scroll;">
     <form method="POST" id="formPermission" name="formPermission"  action="{{ url('groups') }}/{{ $group_id }}/CUP" accept-charset="UTF-8">
     <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <input class="btn btn-primary" value="Simpan Perubahan" id="simpan" type="button">

  
     	<div id="{{-- $table['table'] --}}" >{{-- $table['id'] --}}</div>
	    <ul>
	    <?php $i=0;?>
	    @foreach($config as $key_action => $action)
	    	<li>
	   		 <!--Controllers : {{ $action['Controllers'] }} methode => {{ $action['methode'] }} -> name -->
	   		
	    		
	    		<?php $tanda=0; 
			    		// $id_akses=0; 
			    		$viewakses=0;
	    				//default
	    				// $id_akses='belum ada';
    					$arr_id=$key_action;
    					// $table_id=$table['id'];
	    				$id_akses=null; 
	    				$aksesvalue=0;
	    		?>
				    	{{-- cocokan  dan manipulasi--}}			
	    			@if(count($permissions))
			    		@foreach($permissions as $akses )
			    			<?php 
				    				if ($akses['arr_id']== $key_action ){
					    				$id_akses=$akses['id'];

				    					$viewakses=$akses['akses'];
				    					$arr_id=$akses['arr_id'];
				    					$aksesvalue=$akses['akses'];
				    					break;
				    				}
				    				else{
				    					if ($tanda==0){
					    				//$v_id_akses='belum ada';
				    					$viewakses=$action['akses'];
				    					$arr_id=$key_action;
				    					}

				    				}
			    			?>
			    		@endForeach
			    	@endIf
					<div style="display:inline-block; width:30%;">
                     {{ $i.'-'.$action['name'] }}
                     </div>
			    	<!-- table_id : --> <input type="hidden" name="data[{{$key_action}}][table_id]" value="">
			    	<!-- Id :  --><input type="hidden" name="data[{{$key_action}}][id]" value="{{ $id_akses }}">
			    	<!-- group_id: --> <input type="hidden" name="data[{{$key_action}}][group_id]" value="{{ $group_id}}">
			    	<!-- akses: <input type="hidden" name="datax[{{$key_action}}][akses]" value="{{ $aksesvalue }}"> -->
			    	<?php if($aksesvalue == 1){ //echo "-- $aksesvalue --";?> 

					    <input style="width:200px;height:30px" class="easyui-switchbutton" type="checkbox"
					     name="data[{{$key_action}}][akses]"  data-options="onText:'Ijinkan',offText:'Blokir'" checked>

				    	<!-- <input type="radio" name="data[{{$key_action}}][akses]" value="1" checked > Aktif  -->
				    	<!-- <input type="radio" name="data[{{$key_action}}][akses]" value="0"> Nonaktif -->
			    	<?php }else{?>
			    	<input style="width:200px;height:30px" class="easyui-switchbutton" type="checkbox"
			    	 name="data[{{$key_action}}][akses]" data-options="onText:'Ijinkan',offText:'Blokir'" >
				    	<!-- <input type="radio" name="data[{{$key_action}}][akses]" value="1"  > Aktif  -->
				    	<!-- <input type="radio" name="data[{{$key_action}}][akses]" value="0" checked> Nonaktif -->
			    	<?php }?>
			    	<!-- arr_id : --> <input type="hidden" name="data[{{$key_action}}][arr_id]" value="{{ $arr_id }}">
			    	<br>
	    	</li> 
	    	<?php $i++?>  	
	    @endForeach
	    </ul>

    </form>
    <!-- <input id="sb" style="width:50px;height:30px"> -->
    <!-- <hr> -->
        <!-- <input class="easyui-switchbutton" checked> -->
    <!-- <input style="width:200px;height:30px" class="easyui-switchbutton" data-options="onText:'Ijinkan',offText:'Blokir'" checked> -->
    </div>
    <script type="text/javascript">
    (function(){
    	    $('#simpan').bind('click', function(){
    	    		$(this).attr('disabled', 'disabled');

    	    		$('#formPermission').form('submit',{  
    	    								success: function(result){
    	    									console.log(result);
    	    									if (result ){
    	    										$.messager.show({  
    	    											title: 'Status',  
    	    											msg: 'Data Berhasil Dimasukkan !'  
    	    										});
    	    										$('#this').dialog('close')

    	    										$('#panelPermission').panel('open').panel('refresh', '{{ url('groups')}}/{{ $group_id }}/edit-permission');
    	    										// $('#panelPermission').panel({
    	    										//     // width:500,
    	    										//     href:'{{ url('groups')}}/'+row.id+'/edit-permission',
    	    										//     title:'Edit Permission for Group { '+row.name+' }',
    	    										//     tools:[{
    	    										//         iconCls:'icon-add',
    	    										//         handler:function(){alert('new')}
    	    										//     },{
    	    										//         iconCls:'icon-save',
    	    										//         handler:function(){alert('save')}
    	    										//     }]
    	    										// }); 

    	    									}
    	    									else {
    	    										$.messager.show({  
    	    											title: 'Status',  
    	    											msg: result  
    	    										});
    	    									} 
    	    								} 
    	    							});
    					// $('#djs').layout('collapse','south');
    	    });
    	

    })();

    // $(function(){
    //     $('#sb').switchbutton({
    //         checked: true,
    //         onChange: function(checked){
    //             console.log(checked);
    //         }
    //     })
    // })
    </script>