

	jQuery(document).ready(function($) {
			$( "p" ).click(function( event ) {
			alert( event.currentTarget === this ); // true
			});
		$('#mm1,#mm2,#mm3,#mm4,submm2').on('click', function(event) {
			// event.preventDefault();
			// event.target.is('a')
			// console.log($('#menus,#mm1,#mm2,#mm3,#mm4').find('a'));

			// console.log(event.target);
				if ($(event.target).is('a') && $(event.target).attr('data-link')) {
					console.log('IS_A');
					openPage($(event.target).attr('data-link'))
				// alert($(event.target).attr('data-link'));
				// $.get($(event.target).attr('data-link'), function(data) {
				// 	var isi= $('#content-x').empty().html(data)
				// 	console.log(isi);
				// 	// isi.find('.easyui-layout').layout()
				// 	// isi.find('.easyui-tabs').tabs()
				// 	 // $('#target').empty().html(tpl).find('.easyui-layout').layout();

				// });
			};

			// alert('menus');
			/* Act on the event */
		});


	});
	function openPage(url) {
		// $(document).find('.panel.combo-p').remove();
		$('#content-x').panel('clear');
		// var tab=$('#tt').tabs('getSelected');  // get selected panel
		// tab.panel('clear');
		// return false 
			$('#windowX').empty();
			$('#content-x').empty()
		$.get(url, function(data) {
			var isi= $('#content-x').empty().html(data)
			// $('.easyui-combobox').combobox();
			// console.log(isi);
			// isi.find('.easyui-layout').layout()
			// isi.find('.easyui-tabs').tabs()
			 // $('#target').empty().html(tpl).find('.easyui-layout').layout();

		}).fail(function() {
		    alert( "Network Error atau Masalah Autentikasi, Silahkan periksa lagi koneksi Jaringan Anda dengan Server Kami, Next Halaman kami reload " );
		    location.reload();
		  })
		  .always(function() {
		    console.log( "finished" );
		  });
	}
	function openWindow(url) {
			// $('#windowX').window('clear');
			// $('#content-x').empty();
			$('#content-x').panel('clear');
			$('#windowX').empty()
		// $.get(url, function(data) {
			// KOSONGKAN content-x  untuk mencegah adanya id yang sama ya dsisipkan di windowX
			// var isi= $('#windowX').empty().html(data)
			// return false;
			$('#windowX').window({
				title:'Form Input Data Jenis SP2D',
				href: url ,
				height:600,
				width:500,
				modal:true,
				cache: false,
	            onLoad:function  (param) {
	                $('#windowX').window('center'); 
	            },
	            onLoadError:function  () {
				    location.reload();
	            	
	            }
				});
			

		// }).fail(function() {
		//     alert( "Network Error atau Masalah Autentikasi, Silahkan periksa lagi koneksi Jaringan Anda dengan Server Kami, Next Halaman kami reload " );
		//     location.reload();
		//   })
		//   .always(function() {
		//     console.log( "finished" );
		//   });
	}
	function logout(link) {
		$.messager.confirm('Logout Confirm ', 'Apakah Anda benar Ingin logout ? ', function(r){
						if (r)
						{
							 // $('body').fadeIn(5000);
						$.get(link, function(data) {
								// window.location();
								location.reload();
								// history.go(0)
								// location.href = location.href
								// location.href = location.pathname
								// location.replace(location.pathname)
								// location.reload(false) 
						}).fail(function() {
						    alert( "Network Error atau Masalah Autentikasi, Silahkan periksa lagi koneksi Jaringan Anda dengan Server Kami, Next Halaman kami reload " );
						    location.reload();
						  })
						  .always(function() {
						    console.log( "finished" );
						  });
						}
					});
	
	}

	$.download = function(url, data, method) {
	    //url and data options required
	    if(url && data) {
	    	var windowx= window.open('', '_blank', 'toolbar=0,location=0,menubar=0,width=600,height=600,scrollbars=yes');
	    	// var windowx= window.location;
	        var form = $('<form />', { action: url, method: (method || 'get') });
	        $.each(data, function(key, value) {
	            var input = $('<input />', {
	                type: 'hidden',
	                name: key,
	                value: value
	            }).appendTo(form);
	         
	        });
	    // return form.appendTo('body').submit().remove();
	    return form.appendTo(windowx.document.body).submit().remove();
	    }
	throw new Error('$.download(url, data) - url or data invalid');
	};
	function customTitleTab(IdParentTab, TitleFromRow) {
	var pp = $('#'+IdParentTab).tabs('getSelected'); 
	console.log(TitleFromRow);
 	// var tab = pp.panel('options').tab;
 	 $('#'+IdParentTab).tabs('update',{
	 	tab:pp,
	 	options : {
	 	title : '--: '+TitleFromRow+' :--'
	 	}
 	}); 

	}

	   function AddDate(oldDate, offset, offsetType, format) {
	         console.log(' offset : '+offset);
	         console.log('offsetType : '+offsetType);
	         // console.log(typeof oldDate);
	         // return false;
	       if ( typeof oldDate == 'string') {
	           //standart dd/mm/yyy
	           console.log('type string');
	           // parse date from string 
	         var date   = parseInt(oldDate.substring(0,2));
	         var month  = parseInt(oldDate.substring(3,5));
	         var year   = parseInt(oldDate.substring(6,10));
	           //buat ulang date 
	           var new_date= new Date(year, month, date);

	         var year = parseInt(new_date.getFullYear());
	         var month = parseInt(new_date.getMonth());
	         var date = parseInt(new_date.getDate());
	         var hour = parseInt(new_date.getHours());
	         // var date1 = new Date(yr1, mon1-1, dt1);
	       }
	       else{
	         console.log('type object');

	         var year = parseInt(oldDate.getFullYear());
	         var month = parseInt(oldDate.getMonth());
	         var date = parseInt(oldDate.getDate());
	         var hour = parseInt(oldDate.getHours());
	         
	       }
	       var newDate;
	       console.log(typeof offsetType);

	       if ( typeof offsetType == 'undefined') {
	           console.log('offsetType kosong');
	             newDate=oldDate;
	       };

	       switch (offsetType) {
	           case "Y":
	           case "y":
	                newDate = new Date(year + offset, month, date, hour);
	                break;
	     
	            case "M":
	            case "m":
	                newDate = new Date(year, month + offset, date, hour);
	                break;
	     
	            case "D":
	            case "d":
	                newDate = new Date(year, month, date + offset, hour);
	                break;
	     
	            case "H":
	            case "h":
	                newDate = new Date(year, month, date, hour + offset);
	                break;
	        }
	        // return newDate;            
	        return newDate.getDate()+'/'+newDate.getMonth()+'/'+newDate.getFullYear();            
	}

	function DateIdFormatter(date){
	    var y = date.getFullYear();
	    var m = date.getMonth()+1;
	    var d = date.getDate();
	    return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;// ini perlu disesuaikan yang sesuai format yang diingninkan
	}
	function DateIdParser(s){
	    if (!s) return new Date();
	    var ss = (s.split('/'));// ini perlu disesuaikan yang sesuai format yang diingninkan
	    var y = parseInt(ss[0],10);
	    var m = parseInt(ss[1],10);
	    var d = parseInt(ss[2],10);
	    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
	        return new Date(d,m-1,y);// ini perlu disesuaikan yang sesuai format yang diingninkan
	    } else {
	        // return new Date(d,m,y);
	        return new Date();
	    }
	}

function pesan_top_center(result) {
	// $.messager.progress(); 
		var obj = jQuery.parseJSON( result );
		if (obj.errors) {
				var pesan='';
				$.each(obj.errors, function(index, val) {
							 // console.log(index);
							 // console.log(typeof val);
							 pesan +='<li>'+ val[0] +'</li>';

				});
				pesan ='<ul>'+pesan+'<ul>';
				if (obj.succes) {
					pesan ='<ul>'+obj.succes+'<ul>';
				};
				// alert( obj.name === "John" );
				$.messager.show({  
					width:400,
					timeout:20000,
					height:150, 
					style:{
							// backgroundColor:red,
							// padding:0,
							right:'',
							top:document.body.scrollTop+document.documentElement.scrollTop,
							bottom:''
						},
					title: 'Status : '+obj.msg,  
					msg: pesan  
				});
		}
		else if(obj.succes){
			$.messager.show({  
			title: 'Status ' + obj.msg,  
			msg:'Status : '+obj.succes
			});
				// $.messager.show({  
				// 	width:400,
				// 	timeout:20000,
				// 	height:150, 
				// 	style:{
				// 			// backgroundColor:red,
				// 			// padding:0,
				// 			right:'',
				// 			top:document.body.scrollTop+document.documentElement.scrollTop,
				// 			bottom:''
				// 		},
				// 	title: 'Status : '+obj.msg,  
				// 	msg: pesan  
				// });
			
		}

	}

	function toRp(angka){

	    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
	    var rev2    = '';
	    for(var i = 0; i < rev.length; i++){
	        rev2  += rev[i];
	        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
	            rev2 += '.';
	        }
	    }
	
	    return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
	}
	function toAngka(angka){

	    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
	    var rev2    = '';
	    for(var i = 0; i < rev.length; i++){
	        rev2  += rev[i];
	        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
	            rev2 += '.';
	        }
	    }
	
	    return  rev2.split('').reverse().join('') ;
	}	
	

