
@extends('easy.layout.master')

@include('easy.layout.header')
@include('easy.layout.footer')


@section('title', 'Page Title')

@section('sidebar')
  <div data-options="region:'north',border:true" style="height:140px; ">
        <div style="min-height:100%;  background: none repeat scroll 0 0 #e0ecff; padding:3px 0px 3px 10px; ">
            <div id="logo" style="display:inline-block; min-width:20%; height:60px; padding:5px; "><img src="{{asset('asset/images/logo.png')}}" alt=""> </div>
            <div id="logo" style="display:inline-block; min-width:20%; height:60px; padding:5px; ">Applikasi SP2D V.01 database {{ config('database.connections.mysql.database')}}</div>
            <div id="logo" style="float:right; display:inline-block; min-width:20%; height:60px; padding:5px; "></div>
        </div>
        <div class="easyui-tabs"  data-options="" style="position:absolute; bottom:0px; height:65px; width:auto">
            <div title="..: Applikasi SP2D -- Surat Perjalanan Perintah Dinas :.." style="padding:0px"  data-options="fit:true">

                <div id="menus" style="position:absolute; bottom:0px; padding:3px 3px 3px 10px ;">
                    <a href="#" class="easyui-linkbutton" data-options="plain:true" onclick="javascript:openPage('{{route('ajaxgrid', ['page' => 'home'])}}');"> <i class="fa fa-home fa-2x">Home</i></a>
                    <a href="#" class="easyui-menubutton" data-options="menu:'#mm1',iconCls:''"><i class="fa fa-database fa-2x">Data Master</i></a>
                    <a href="#" class="easyui-menubutton" data-options="menu:'#mm2',iconCls:''"><i class="fa fa-file-image-o e fa-2x">Dokumen SP2D</i></a>
                    @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
                    <a href="#" class="easyui-menubutton" data-options="menu:'#mm3'"><i class="fa fa-file-text fa-2x">Hak Akses</i></a>
                    @endif
                    <?php $v_status=(Sentry::check() && Sentry::getUser()->hasAccess('admin'))?'Admin' : 'User'?>
                    <a href="#" class="easyui-menubutton" data-options="menu:'#mm4'"><i class="fa fa-user-plus fa-2x">Akses {{ $v_status }}</i></a>
                    <a href="#" class="easyui-linkbutton" data-options="plain:true" onclick="javascript:logout('{{route('sentinel.logout')}}');"> <i class="fa fa-user-times fa-2x">Keluar</i></a>
                </div>
            </div>

        </div>
        
    </div>

    <!-- content ============================================================= -->
    <div data-options="region:'center',border:false">
        <div id="content-x" style="width:100%;height:100%">
        {!! $xcontent or 'kosong' !!}
        </div>
    </div>
  </div>
  <!-- widget:  window, dialog, panel ============================================================= -->
  <div id="windowA"  title="Window A" style="width:90%;height:100%"></div>
  <div id="windowB" ></div>
  <div id="windowC" ></div>

  <div id="mm1" style="width:200px;">
    <div data-options="iconCls:'fa fa-folder-open'" ><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'ds'])}}">Data SKPD</a></div>
    <div data-options="iconCls:'fa fa-folder-open'"><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'duk'])}}">Data Unit Kerja</a></div>
    <div data-options="iconCls:'fa fa-folder-open'"><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'penerima'])}}">Penerima</a></div>
    <div data-options="iconCls:'fa fa-folder-open'"><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'tahun'])}}">Tahun</a></div>
    <div data-options="iconCls:'fa fa-folder-open'"><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'libur'])}}">Libur Nasional</a></div>
    <div class="menu-sep"></div>
    <div data-options="iconCls:'fa fa-folder-open'"><a href="#" onclick="javascript:openWindow('{{route('ajaxgrid', ['page' => 'djs'])}}');"    >Daftar Jenis SP2D</a></div>

    </div>
            <div id="mm2" style="width:200px;">
                <div data-options="iconCls:'fa fa-list'"><a href="#" data-link="xxx"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'lds'])}}">List Dokumen SP2D</a></div>
              <!--   <div data-options="iconCls:'icon-undo'"><a href="#" data-link="xxx"><a href="#" onclick="javascript:openWindow('{{route('ajaxgrid', ['page' => 'eds'])}}');" >Entry Data</a></div>
                <div class="menu-sep"></div> -->
                <div>
                    <span>Pelaporan SP2D</span>
                    <div id="submm2" >
                        <div data-options="iconCls:'fa fa-list-ol'"><a href="#" onclick="javascript:openPage('{{route('lap.prev.grid', ['grid' => 'tahun'])}}');"  data-link="jst.HTML"  >Jumlah SP2D Berdasarkan Tahun</a></div>
                        <div data-options="iconCls:'fa fa-list-ol'"><a href="#" onclick="javascript:openPage('{{route('lap.prev.grid', ['grid' => 'jenis_sppd'])}}');" data-link="jsj.HTML" >Jumlah SP2D Berdasarkan Jenis SP2D</a></div>
                        <div class="menu-sep"></div>
                        <div data-options="iconCls:'fa fa-list-ol'"><a href="#"  onclick="javascript:openPage('{{route('lap.prev.grid', ['grid' => 'jenis_skpd'])}}');"  data-link="jss.HTML" >Jumlah SP2D menurut SKPD</a></div>
                        <div data-options="iconCls:'fa fa-list-ol'"><a href="#"  onclick="javascript:openPage('{{route('lap.prev.grid', ['grid' => 'per_skpd_tahun'])}}');"  data-link="">Jumlah SP2D Berdasarkan Jenis Per SKPD</a></div>
                    </div>
                </div>

            </div>
            <div id="mm3" style="width:200px;">
                <!-- <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">Setting Applikasi</a></div>
                <div class="menu-sep"></div> -->
                 <div data-options="iconCls:'fa fa-users'"><a href="#" data-link="{{route('sentinel.users.index')}}">Pengaturan Pengguna</a> </div>
                <div class="menu-sep"></div>
                    <div data-options="iconCls:'fa fa-users'"><a href="#" data-link="{{route('sentinel.groups.index')}}">Hak Akses Groups</a> </div>
                <div class="menu-sep"></div>
                
            </div>
            <div id="mm4" style="width:200px;">
                <div data-options="iconCls:'fa fa-book'"><a href="#" data-link="{{route('sentinel.profile.show')}}">User Profile</a> </div>
            

                <div class="menu-sep"></div>
                <div data-options="iconCls:'fa fa-wrench'"><a href="#" data-link="{{route('ExtendProfile.editPass.edit')}}">Password</a> </div>
                <div class="menu-sep"></div>
              <!--   <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">Help</a></div>
                <div class="menu-sep"></div>
                <div data-options="iconCls:'icon-undo'"><a href="#" data-link="{{route('ajaxgrid', ['page' => 'jss'])}}">Logout</a></div>
                <div class="menu-sep"></div>
                 -->
            </div>

            <div id="windowX" ></div>
            <div id="windowY" ></div>
            <div id="windowZ" ></div>
    
@endsection
@section('footer')
    @parent
  
@endsection