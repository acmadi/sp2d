<div id="homex" class="easyui-layout" data-options="fit:true">
	<div data-options="region:'center'">
		<div id="tt" class="easyui-tabs" fit="true">
			<div title="Home " style="padding:10px;">
				Selamat Datang user : {{ Session::get('email') }},  Di Applikasi SPPD Kota Mojokerto

			</div>
		</div>
	</div>
	<div data-options="region:'south',split:true" style="height:50px;"> 
	</div>
</div>
</div>

<script type="text/javascript">
	

	$('#homex').layout()
	// $('.easyui-linkbutton').linkbutton()
	$('.easyui-tabs').tabs()
	
</script>