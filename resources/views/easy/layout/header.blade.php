@section('header')
<meta charset="UTF-8">
<title>{{ config('database.connections.mysql.database')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="stylesheet" type="text/css" href="{{asset('asset/themes/default/easyui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/themes/icon.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('asset/demo.cs')}}"> -->
 <link rel="stylesheet" type="text/css" href="{{asset('asset/fontawesome/css/font-awesome.css')}}">
 <script type="text/javascript" src="{{asset('asset/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/jquery.easyui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/pdfobject.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/locale/easyui-lang-id.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/jquery.browser.min.js')}}"></script>
<script src="{{ asset('asset/jquery.blockUI.js') }}"></script> 
<script src="{{ asset('asset/moment.js') }}"></script> 
 <script type="text/javascript">
 // console.log($.browser.name);

// $.extend($.fn.panel.events, {
//     mymove: function(jq, newposition){
//         return jq.each(function(){
//             $(this).dialog('move', newposition);
//         });
//     }
// });
// $.fn.form.defaults = {
// 	novalidate: false,
// 	ajax: true,
// 	url: 'ddddddddd',
// 	queryParams: {},
// 	onSubmit: function(param){return $(this).form('validate');},
// 	success: function(data){},
// 	onBeforeLoad: function(param){},
// 	onLoadSuccess: function(data){},
// 	onLoadError: function(){}
// };
var token = $('meta[name="csrf-token"]').attr('content');
 	$.ajaxSetup({
		headers: {
			// 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			'X-CSRF-TOKEN': token
		},
		complete:function  (data) {
			$('.easyui-linkbutton').linkbutton('enable');
			 // $('meta[name="csrf-token"]').attr('content','xxxxxxxxxxxxxxx')
		},
		beforeSend:function  (data, setting) {
				
 					$('.easyui-linkbutton').linkbutton()
			if ($('div').find('.easyui-linkbutton').length) {
					// setup option for .easyui-linkbutton
					$('.easyui-linkbutton').linkbutton('disable')
					// $.each($('#tb').find('a'), function(index, val) {
					// 	$(val).linkbutton('disable')
					// });
				};
			// if ($('div').find('.datagrid-toolbar').length) {
			// 		// setup option for .easyui-linkbutton
			// 		// $('.easyui-linkbutton').linkbutton()
			// 		// $('.easyui-linkbutton').linkbutton('disable')
			// 		$.each($('.datagrid-toolbar').find('a'), function(index, val) {
			// 			$(val).linkbutton('disable')
			// 		});
			// 	};
				
		},
		error:function  (data) {
			if (data.hasOwnProperty('responseText')){
			$.messager.alert('Info', data.responseText+' <br> Status Code '+data.status, 'info');
			}
		}
 	});
		// setTimeout(getToken, 10)
		// setInterval(getToken, 100)
	function getToken () {
		$.get('{{route('token')}}', function(data) {
			alert(data)
			return data;
		});
	}
   	
</script>
<script type="text/javascript" src="{{asset('asset/app.js')}}"></script>
<style type="text/css">
	.fa{
		font-size: 17px;
	}
	.fa:hover, .menu-item:hover{
		font-size: 17px;
		 color: rgb(0,0,255);
	}
	.menu-item a{
		display: block;
		width: 200px;
		text-decoration: none;
	}
 	.isi {
	font-size: 15px;
	padding: 10px 10px 10px 10px;
	max-width: 100%;     
	max-height: 100%;     
	/*overflow: scroll;*/
	/*width: 50%;*/
	}
	.isi table td{
		padding: 10px 0px 10px 20px;
	}
	.isi table tr:nth-child(odd)  
	 {
	  /*background-color: #95b8e7;*/
	  padding: 10px 0px 10px 20px;
	}
	
	.isi table tr:nth-child(even) 
	{
	  background-color: rgba(0, 0, 0, 0) linear-gradient(to bottom, #f9f9f9 0px, #efefef 100%) repeat-x scroll 0 0;
	  background-color: #dddddd;
	  padding: 10px 0px 10px 20px;
	}
	.isi table tr:hover {
	background-color: #95b8e7;
	}
/*	.isi {
	font-size: 15px;
	padding: 10px 0 10px 20px;
	max-width: 100%;     
	max-height: 100%;     
	overflow: scroll;
	}
 */
	.isi div.strip .odd()  
	 {
	  /*background-color: #95b8e7;*/
	  padding: 10px 0px 10px 20px;
	}
	
	.isi div .even() 
	{
	  /*background-color: rgba(0, 0, 0, 0) linear-gradient(to bottom, #f9f9f9 0px, #efefef 100%) repeat-x scroll 0 0;*/
	  background-color: #dddddd;
	  padding: 10px 0px 10px 20px;
	}
 	.isi div.strip .even:hover,
	.isi div.strip .odd:hover {
	background-color: #95b8e7;
	}
  	.isi strong {
	    display: inline-block;
	    width: 40%;
	}
	.isi > .row{
	 /*   display: inline-block;
	    width: 40%;*/
	}
	label.labelq{
		width: 20%;
	    display: inline-block;
	}
    </style>
@endsection
