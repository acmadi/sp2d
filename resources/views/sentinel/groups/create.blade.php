<div class="isi">
    <div class="easyui-panel" data-options="style:{borderWidth:0}" tyle="width:400px;padding:30px 70px 20px 70px">
        <form method="POST" id="F-INPUT" action="{{ route('sentinel.users.store') }}" accept-charset="UTF-8">

                <div style="margin-bottom:10px">
                    <label for="name" style="100%; font-size: 20px; width: 100%;" class="labelq">Nama Group:</label><br>
                    <input class="easyui-textbox"  placeholder="Nama Group" data-options="prompt:'Nama Group',iconCls:'icon-man',iconWidth:38"   name="name" type="text"  value="{{ Input::old('username') }}" style="width:100%;height:30px;padding:8px">
                    {{ ($errors->has('username') ? $errors->first('username') : '') }}
                </div>
                <div style="margin-bottom:10px">
                    <label for="Permissions" style="100%; font-size: 20px; width: 100%;" class="labelq">Permissions:</label>

                    <?php $defaultPermissions = config('sentinel.default_permissions', []); ?>
                    @foreach ($defaultPermissions as $permission)
                    <label class="labelq">
                        <input name="permissions[{{ $permission }}]" value="1" type="checkbox"
                        @if (Input::old('permissions[' . $permission .']'))
                        checked
                        @endif        
                        > {{ ucwords($permission) }}
                    </label>
                    @endforeach

            <div>
                <br>
                <a href="#" class="easyui-linkbutton" id="simpan" data-options="iconCls:'icon-ok'" style="padding:5px 0px;width:100%;height:30px;padding:8px">
                    <span style="font-size:14px;">Buat Group Baru</span>
                </a>
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                <!-- <input class="btn btn-primary" value="Create" id="simpan" type="button"> -->
            </div>
        </form>
    </div>

    <!-- <div class="easyui-panel" data-options="style:{borderWidth:0}" tyle="width:400px;padding:30px 70px 20px 70px">

        <form id="F-INPUTX" method="post"  action="{{ route('sentinel.groups.store') }}" accept-charset="UTF-8">
         {!! csrf_field() !!}


                 <div>
                    <label for="name">Name:</label>
                    <input class="easyui-validatebox"  placeholder="Name" name="name" type="text"  value="{{ Input::old('email') }}" data-options="required:true" />

                    {{ ($errors->has('name') ? $errors->first('name') : '') }}
                </div>
                <div>
                    <label for="email">Permissions:</label>

                    <?php $defaultPermissions = config('sentinel.default_permissions', []); ?>
                    @foreach ($defaultPermissions as $permission)
                    <label class="checkbox-inline">
                        <input name="permissions[{{ $permission }}]" value="1" type="checkbox"
                        @if (Input::old('permissions[' . $permission .']'))
                        checked
                        @endif        
                        > {{ ucwords($permission) }}
                    </label>
                    @endforeach
                </div>
            <div>
                <label for="name"></label>
                <input id="simpan" value="Create New Group" type="button">
            </div>
         </form>
     </div> -->
</div>

<script type="text/javascript">
    $(function(){
        $('#close').bind('click', function(){
        });
        $('#simpan').bind('click', function(){

            $('#F-INPUT').form('submit',{  url:'{{ route('sentinel.groups.store') }}',
                success: function(result){
                    $('#contentCenter').datagrid('reload');
                    var data = eval('(' + result + ')');
                    console.log(data);
                    if (data.success) {
                      $.messager.show({  
                          title: 'Status',  
                          msg: data.success 
                      });

                  }
                  else{
                      var err_f='';
                      $.each(data.errors, function(err, val) {
                          err_f += '<li> '+val+' </li>';
                      });
                      $.messager.show({  
                          title: 'Status { ssError }',  
                          msg: '<ul>'+err_f+'</ul>'
                      });

                  }

              } 
          });
        });
        // $('#update').bind('click', function(){
        //             var row = $('#contentCenter').datagrid('getSelected');
        //         // console.log($('#id').val());return false;
        //             $('#F-INPUT').form('submit',{ url:'{{url('unit-kerja')}}/'+$('#id').val(), 
        //                                     success: function(result){

        //                                         if (result.code ==  200 ){
        //                                             $.messager.show({  
        //                                                 title: 'Status',  
        //                                                 msg: 'Data SKPD Berhasil Dimasukkan !'  
        //                                             });
        //                                             // $('#this').dialog('close')
        //                                             $('#contentCenter').datagrid('reload');
        //                                         }
        //                                         else {
        //                                             $('#contentCenter').datagrid('reload');
        //                                             $.messager.show({  
        //                                                 title: 'Status',  
        //                                                 msg: result  
        //                                             });
        //                                         } 
        //                                     } 
        //                                 });
        //     });

});
</script>

