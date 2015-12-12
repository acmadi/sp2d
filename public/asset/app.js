
	$(document).ready(function($) {
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
		$('#content-x').panel('clear').block({ overlayCSS: { backgroundColor: '#95b8e7' }, message: 'Silahkan Tunggu!' }); 
		// $(document).find('.panel.combo-p').remove();
		// $('#content-x').panel('clear');
		// var tab=$('#tt').tabs('getSelected');  // get selected panel
		// tab.panel('clear');
		// return false ;
			$('#windowX').empty();
			// $('#content-x').empty()
		$.get(url, function(data) {
		$('#content-x').panel('clear');
			$("#content-x").empty().append(data).unblock();
			// var isi= $('#content-x').empty().html(data)
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
	

	function my_date (start,end,list_libur,daftar_libur_ori) {
		// initialize
		this.start=start;
		this.end=end;
		this.list_libur=list_libur;// Ambil dari obyek myLibur // class LiburNS
		this.list_libur_utc_format=[];
		this.daftar_libur_ori=daftar_libur_ori;// Ambil dari obyek myLibur// class LiburNS
		this.start_UTC;
		this.end_UTC;

		this.nilai_normal_selisih;
		// this.nilai_hitung_list_date ;
		this.nilai_date_sabtu_minggu ;
		this.list_libur_sabtu_minggu =[] ;
		this.nilai_list_libur =0 ;
		this.date_between =[] ;
		this.nilai_selisih_akhir;

		this.daftar_weekend_tidak_dihitung_libur_nas=[];
		this.daftar_libur_nasional_valid=[];

		this.list_libur_utc= function() { 

				for (var i = this.list_libur.length - 1; i >= 0; i--) {
						// console.log(list_libur[i])
						// console.log(this.id_to_utc(list_libur[i]));
						this.list_libur_utc_format.push(this.id_to_utc(list_libur[i]));
						// console.log('+++ '+list_libur[i]);
					// console.log(' --- '+date_between[i])
					// console.log(' --- '+list_libur)
					// if (include(list_libur, date_between[i])) {
					// 	periksa++;
					// };
				};
				// this.list_libur
				return this;
				
			};
			// id to UTC formaat 
		this.id_to_utc= function  (argument) {
			// console.trace();
			console.log(argument);
			console.log('this.id_to_utc');
			var x=[];
			x = argument.split('/');
			// console.log(x);

			console.log(new Date(x[2],x[1]-1,x[0]));
			// console.log(new Date(x[2],x[1]-1,x[0]));
			// return false;
			return new Date(x[2],x[1]-1,x[0]);
		}
		this.baca_list_libur=function  (argument) {
			
		}
		this.normal_selisih= function  () {
			var c,e,s;
			// console.log(this.id_to_utc(this.end));
			this.end_UTC=this.id_to_utc(this.end);
			this.start_UTC= this.id_to_utc(this.start);
			 // calculate difference between dayes
			 c = ( this.end_UTC -  this.start_UTC );
			 // convert from milliseconds to days
			 // multiply milliseconds * seconds * minutes * hours
			  this.nilai_normal_selisih = c / (1000 * 60 * 60 * 24);
			  return this;
		}
		// cocokan daate libur dengan dengan date range
		this.hitung_nilai_list_libur= function () {
			var me;
			me=this;
			var date_between=this.date_between;
						// date_range : hari diantara 2 hari 
						// list = daftar hari libur 
						function include(list, date_range,me) {
						    for(var i=0; i<list.length; i++) {
						        if (list[i].getTime() == date_range.getTime()   ) {
						        	if (me.cek_sabtu_minggu(list[i]) !== true ) { // jangan hitung sabtu minggu sebagai libur nas
							        	// console.log('lib_nas_valid '+list[i]);
							        	me.daftar_libur_nasional_valid.push(list[i])
							        	return true;
							        }
							        else if(me.cek_sabtu_minggu(list[i]) == true){
							        	me.daftar_weekend_tidak_dihitung_libur_nas.push(list[i]);
							        }
						        }
						    }
						}
				var periksa,list_libur;
				periksa=0;
				list_libur=this.list_libur_utc_format;

				// console.log(date_between);
			for (var i = date_between.length - 1; i >= 0; i--) {
				// date_between[i]
				// console.log(' --- '+list_libur)
				// console.log(' --- '+date_between[i])
				// console.log(include(list_libur, date_between[i]));
				if (include(list_libur, date_between[i],me) ) {
					// console.log(date_between[i]);
					periksa++;
				}
				
			};
			this.nilai_list_libur=periksa;
			return this;
		}

		this.get_nilai_selisih_akhir= function  () {
			 // return this.normal_selisih()-this.hitung_sabtu_minggu()-this.hitung_nilai_list_libur();
			 return this.nilai_normal_selisih-this.nilai_date_sabtu_minggu-this.nilai_list_libur;
		}
		this.cek_terlambat= function  () {
			if (this.get_nilai_selisih_akhir() > 2 ) { return 'Telat '}
				else if(this.get_nilai_selisih_akhir() <= 2 ){
					return 'Tepat Waktu';
				}
		}
		
		/**  tool,=== snippet ===============================================================================
		*/
		this.isDate=function (dateArg) {
		    var t = (dateArg instanceof Date) ? dateArg : (new Date(dateArg));
		    return !isNaN(t.valueOf());
		}

		this.isValidRange = function (minDate, maxDate) {
		    return (new Date(minDate) <= new Date(maxDate));
		}

		this.hitung_sabtu_minggu= function () {
			 var currentDate = this.start_UTC,
			     endDt = this.end_UTC,
			     between = []
			 ;
			 console.log('awal start ');
			 // console.log(currentDate);

			 console.log('akhir start ');
			 // console.log(endDt);
			var error = ((this.isDate(endDt)) && (this.isDate(currentDate)) && this.isValidRange(currentDate, endDt)) ? false : true;
			var between = [];
			this.nilai_date_sabtu_minggu=0;

			if (error) console.log('error occured!!!... Please Enter Valid Dates');
			else {
			    var currentDate = new Date(currentDate),
			        end = new Date(endDt);
			    while (currentDate <= end) {
			        // between.push(new Date(currentDate));
			        this.date_between.push(new Date(currentDate));
			        	     if (this.cek_sabtu_minggu(currentDate) ) {
			        		     	this.list_libur_sabtu_minggu.push(new Date(currentDate))
			        			     this.nilai_date_sabtu_minggu++;
			        		     };
			        currentDate.setDate(currentDate.getDate() + 1);
			    }
			}
			return this; 

		}
		this.cek_sabtu_minggu=function  (your_date) {
			// var d = new Date("01/11/2015");// mm/dd/yyyy
			var weekday = new Array(7);
			weekday[0]=  "Minggu";	//"Sunday";//minggu
			weekday[1] = "Senin";	//"Monday";
			weekday[2] = "Selasa";	//"Tuesday";
			weekday[3] = "Rabu";	//"Wednesday";
			weekday[4] = "Kamis";	//"Thursday";
			weekday[5] = "Jumat";	//"Friday";
			weekday[6] = "Sabtu";	//"Saturday";//sabtu// console.log(your_date);
			if (your_date.getDay() == 6 || your_date.getDay() == 0 ) {
				// console.log(weekday[your_date.getDay()])
				// console.log(your_date)
				return true

			}
			else{
				return false;
			}
			// var n = weekday[d.getDay()]; 
		}
		this.date_human_id=function  (your_date) {
			function hari (your_date) {
				var weekday = new Array(7);
			weekday[0]=  "Minggu";	//"Sunday";//minggu
			weekday[1] = "Senin";	//"Monday";
			weekday[2] = "Selasa";	//"Tuesday";
			weekday[3] = "Rabu";	//"Wednesday";
			weekday[4] = "Kamis";	//"Thursday";
			weekday[5] = "Jumat";	//"Friday";
			weekday[6] = "Sabtu";
				return weekday[your_date.getDay()];
			}
		
			return 'Hari '+hari(your_date)+', '+moment(your_date).locale('id').format('L');
		}
		this.get_list_libur_sabtu_minggu=function  () {
			var hari=this.list_libur_sabtu_minggu;
			var results=[];
			for (var i = 0; i < hari.length; i++) {
				results.push(this.date_human_id(hari[i]));
			}
			return results;
		}
		this.get_list_libur_utc_format=function  () {
			var hari=this.list_libur_utc_format;
			var results=[];
			for (var i = 0; i < hari.length; i++) {
				results.push(this.date_human_id(hari[i]));
			}
			return results;
		}
		this.get_daftar_libur_nasional_valid=function  () {
			var hari=this.daftar_libur_nasional_valid;
			var results=[];
			for (var i = 0; i < hari.length; i++) {
				results.push(this.date_human_id(hari[i]));
			}
			return results;
		}
		this.get_daftar_tgl_terlambat=function  (argument) {
			var date_between, date_telat=[];
			date_between=this.date_between;

			// console.log('date diantara');
			// console.log(this.date_between);

			this.get_nilai_selisih_akhir()-2;

			var results=[];
			// console.log(this);
			for (var i = 0; i < date_between.length; i++) {
				// 	var ket;
				// 	ket='';
				// 	// console.log(this.daftar_libur_ori); 	
				// 	for (var i = 0; i <  this.daftar_libur_ori.length; i++) {
				// 				// console.log( this.daftar_libur_ori[i].ket);
				// 				// return false;
				// 			if (this.daftar_libur_ori[i].tanggal_libur_nasional == moment(date_between[i]).locale('id').format('L') ) {
				// 				ket = this.daftar_libur_ori[i].ket;
				// 			};
				// 		}
				// results.push(this.date_human_id(date_between[i])+ ',Ket : '+ket);
				// console.log(this.daftar_libur_nasional_valid);
				// var res; 
				// 	for (var i = 0; i <  this.daftar_libur_nasional_valid.length; i++) {
				// 			console.log(this.daftar_libur_nasional_valid[i]);
				// 			// if (this.daftar_libur_nasional_valid[i] !== date_between[i] ) {
				// 			// 	// res=date_between[i];
				// 			// };
				// 		}
				// results.push(this.date_human_id(res));
				results.push(this.date_human_id(date_between[i]));
			}
			return results.join(', ');


		}



	}

var LiburNas = function () {
	this.daftar_libur_nasional;
	this.daftar_tanggal_libur_nasional;
	function set_data(daftar_libur_nasional) {
		this.daftar_libur_nasional=daftar_libur_nasional;
		return this.daftar_libur_nasional;
	}
	function libur_ori(argument) {
		return this.daftar_libur_nasional;
	}
	function get_tanggal_libur_nasional() {
		this.daftar_tanggal_libur_nasional=[];
		console.log(this.daftar_libur_nasional);
		console.log(this.daftar_libur_nasional.length);
		// return false;
		for (var i = 0; i <  this.daftar_libur_nasional.length; i++) {
				this.daftar_tanggal_libur_nasional.push( this.daftar_libur_nasional[i].tanggal_libur_nasional);
			}
			return this.daftar_tanggal_libur_nasional;
	}
	return {
		libur:function() {
			return get_tanggal_libur_nasional();

		},
		set_libur:function(daftar_libur_nasional) {
			set_data(daftar_libur_nasional)
		},
		get_libur_ori:function() {
		return 	libur_ori();
		}

	}

}
var myLibur=new LiburNas;

		var counter = 1;
       function AddFileUpload()
       {
            var div = document.createElement('DIV');
            div.className='div_file';
            var input_file= $('#daftar_input_file').find("input[type='file']");
            // if(input_file.length)
            if (input_file.length == 0) {
            	counter=1;
            };
            // div.innerHTML = '<input id="file'+counter+'" name="file'+counter+'" type="file" /><input id="Button' + counter + '" type="button" value="Remove" onclick = "RemoveFileUpload(this)" />';
            div.innerHTML = '<input class="easyui-filebox" style="width:300px" id="upload-images'+counter+'" name="upload-images['+counter+']" type="file" /><input id="Button' + counter + '" type="button" value="Batalkan File '+counter+'" onclick = "RemoveFileUpload(this)" />';
            // document.getElementById("FileUploadContainer").appendChild(div);
            document.getElementById("daftar_input_file").appendChild(div);
          
              // $(fileInput).show().focus().click().hide();
              // $('#Button'+counter).show().focus().click().hide();
              $('#upload-images'+counter).show().focus().click();
            counter++;}
       function RemoveFileUpload(div)
       {
       		var x=$(div).parent();
       		x.remove();
       }

       // var addfile = ( function( window, undefined ) {
         
       //   var instance = null;
          
         
       //   // revealing module pattern that handles initialization of our new module
       //   function initializeNewModule() {
       //     var idx=1;
       //     function run() {
       		 	
	      //       var div = document.createElement('DIV');
	      //       var id_file= idx;
	      //       // div.innerHTML = '<input id="file'+counter+'" name="file'+counter+'" type="file" /><input id="Button' + counter + '" type="button" value="Remove" onclick = "RemoveFileUpload(this)" />';
	      //       div.innerHTML = '<input class="easyui-filebox" style="width:300px" id="file'+id_file+'" name="upload-image['+id_file+']" type="file" /><input id="Button' + id_file + '" type="button" value="Remove" onclick = "RemoveFileUpload(this)" />';
	      //       // document.getElementById("FileUploadContainer").appendChild(div);
	      //       document.getElementById("daftar_input_file").appendChild(div);
	          
	      //         // $(fileInput).show().focus().click().hide();
	      //         // $('#Button'+this.idx).show().focus().click().hide();
	      //         $('#file'+idx).show().focus().click();
	      //       idx++;
       // 		 }
                      
	      //      return {
	      //        run : run
	      //      };
           
       //   }
         
       //   // handles the prevention of additional instantiations
       //   function getInstance() {
       //     if( ! instance ) {
       //     	console.log('new instance');
       //       instance = new initializeNewModule();
       //     }
       //     return instance;
       //   }
         
       //   return {
       //     getInstance : getInstance
       //   };
         
       // } )( window );

