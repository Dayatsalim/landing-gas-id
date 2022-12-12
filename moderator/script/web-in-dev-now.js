
// Save User
function save_user() {
	$('#mainlognotif').hide();
	var nama = $('#nama').val();
	var alamat = $('#alamat').val();
	var email = $('#email').val();
	var telepon = $('#telepon').val();
	var pass_1 = $('#pass_1').val();
	var pass_2 = $('#pass_2').val();
	var note = $('#note').val();
	var id = $('#id').val();
	var position =$('#position').val();
	var atpos = email.indexOf("@");
	var dotpos = email.lastIndexOf(".");
	var isnum = /^\d+$/.test(telepon);
	if ( nama == '' || telepon == '' ) {
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, kolom yang bertanda * harus diisi.</div>').slideDown().delay(3000).slideUp();
	} else if ( email != "" && ( atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length ) ) {
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, email tidak valid.</div>').slideDown().delay(3000).slideUp();
	} else if ( pass_1 != pass_2 ) {
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, isi antara Password dan Ulangi Password harus sama.</div>').slideDown().delay(3000).slideUp();
	} else if ( telepon.indexOf(' ') >= 0 ) {
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, Telepon tidak boleh mengandung spasi.</div>').slideDown().delay(3000).slideUp();
	} else if ( !isnum ) {
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, Telepon hanya boleh terdiri dari angka.</div>').slideDown().delay(3000).slideUp();
	// baru
	} else if ( id == "0" && ( pass_1 == '' || pass_2 == '' ) ) {
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, password harus diisi.</div>').slideDown().delay(3000).slideUp();
	} else if ( id == "0" && pass_1.length < 8 ) {
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, Password harus lebih dari 8 karakter.</div>').slideDown().delay(3000).slideUp();
	} else if ( id == "0" && pass_1.indexOf(' ') >= 0 ) {
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, Password tidak boleh mengandung spasi.</div>').slideDown().delay(3000).slideUp();
	} else {
		$('#adminloader').fadeIn();
		$.post(global_url+"/engine/ajax.php", {			
      		nama: nama,
			alamat: alamat,
			email: email,
			telepon: telepon,
			pass: pass_1,
			note: note,
			id: id,
			position:position,
			user_serial: global_var
    	}, function(data,status){
			$('#adminloader').fadeOut();
			if ( status == 'success' && data.indexOf('telepon')>= 0 ) {
				var notif = '<div class="notifno">Maaf, nomor telepon sudah dipakai orang lain.</div>';
				$('#mainlognotif').html(notif).slideDown().delay(3000).slideUp();
			} else if ( status == 'success' && data.indexOf('email')>= 0 )  {
				var notif = '<div class="notifno">Maaf, email sudah dipakai orang lain.</div>';
				$('#mainlognotif').html(notif).slideDown().delay(3000).slideUp();
			} else if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
				if ( "0" == id ) {
					var notif = '<div class="notifyes">Sukses! User berhasil ditambahkan.</div>';
					$('#mainlognotif').html(notif).slideDown().delay(1000).slideUp(300, function(){
						window.location.href = global_url+"/?page=user";
					});
				} else {
					var notif = '<div class="notifyes">Sukses! User berhasil diedit.</div>';
					$('#mainlognotif').html(notif).slideDown().delay(1000).slideUp();
				}
			} else {
				$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
					.slideDown().delay(3000).slideUp();
			}
    	});
	}
	return;
}
// tanya hapus user
function tanya_hapus_user() {
  	if ( confirm("Apakah Anda yakin ingin menghapus User ini?\nUser yang terhapus tidak dapat dikembalikan lagi") ) {
		$('#adminloader').fadeIn();
		var id = $('#id').val();
		$.post(global_url+"/engine/ajax.php", {			
			hapus_id: id,
			hapus_user_serial: global_var
    	}, function(data,status){
			$('#adminloader').fadeOut();
			if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
				var notif = '<div class="notifyes">Sukses! User berhasil dihapus.</div>';
				$('#mainlognotif').html(notif).slideDown(300).delay(1000).slideUp(300, function(){
					window.location.href = global_url+"/?page=user";
				});
			} else {
				$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
					.slideDown().delay(3000).slideUp();
			}
    	});
  	}
}

// date to milisecond
// to_milisecond('6 January 2019','06','40')
function to_milisecond(tanggal,jam,menit) {
	var pecah_tgl = tanggal.split(" ");
	var hari = ("0" + pecah_tgl[0]).slice(-2);
	var bulan = "";
	switch (pecah_tgl[1]) {
		case "January": bulan = "01"; break;
		case "February": bulan = "02"; break;
		case "March": bulan = "03"; break;
		case "April": bulan = "04"; break;
		case "May": bulan = "05"; break;
		case "June": bulan = "06"; break;
		case "July": bulan = "07"; break;
		case "August": bulan = "08"; break;
		case "September": bulan = "09"; break;
		case "October": bulan = "10"; break;
		case "November": bulan = "11"; break;
		case "December": bulan = "12"; break;
	}
	var tahun = pecah_tgl[2];
	var milisecond = Date.parse(tahun+"-"+bulan+"-"+hari+"T"+jam+":"+menit+":00");
	return milisecond;
}

// save option
function save_option() {
	$('#mainlognotif').hide();

	var file_name = $('#file_name').val();
	var pusat_alamat = $('#pusat_alamat').val();
	var pusat_telepon = $('#pusat_telepon').val();
	var pusat_email = $('#pusat_email').val();
	var pusat_fb = $('#pusat_fb').val();
	var pusat_instagram = $('#pusat_instagram').val();
	var pusat_youtube = $('#pusat_youtube').val();
	var pusat_fbchat = $('#pusat_fbchat').val();
	var pusat_googleplay = $('#pusat_googleplay').val();
	var pusat_applestore = $('#pusat_applestore').val();
	
	$('#adminloader').fadeIn();
	$.post(global_url+"/engine/ajax.php", {			
		file_name: file_name,
		pusat_alamat: pusat_alamat,
		pusat_telepon: pusat_telepon,
		pusat_email: pusat_email,
		pusat_fb: pusat_fb,
		pusat_instagram: pusat_instagram,
		pusat_youtube: pusat_youtube,
		pusat_fbchat: pusat_fbchat,
		pusat_googleplay: pusat_googleplay,
		pusat_applestore: pusat_applestore,
		
		saveoption_serial: global_var
    }, function(data,status){
		$('#adminloader').fadeOut();
		if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
			var notif = '<div class="notifyes">Sukses! Options berhasil disimpan.</div>';
			$('#mainlognotif').html(notif).slideDown().delay(2000).slideUp();
		} else {
			$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
				.slideDown().delay(2000).slideUp();
		}
    });
}

// upload banner
function upload_file(path) {
	$('input#file_upload').simpleUpload(global_url+"/engine/upload.php", {
		data: { path:path, uploads_images: global_var },
		expect: "json",
		start: function(file){ console.log("upload started"); },
		progress: function(progress){
			$("#progressbox").show();
			$("#progressbar").css("width", Math.round(progress) + "%" );
		},
		success: function(data){
			if(data.success == true){
				$("#file_name").val( data.filename );
				var gambar = '<img class="bannerview" src="'+path.replace("../../","../")+''+data.filename+'" alt="banner" />';
				gambar += '<img class="icon" src="themes/images/delete.png" width="16" height="16" onclick="delfile()" />';
				$("#imgview").html(gambar);
				
				$("#progressbox").delay(500).fadeOut(400, function(){
					$("#progressbar").css("width", "0%" );
					$("#uploadbox").slideUp(400, function(){
						$("#imgview").slideDown();
					});
				});
			}else{
				var notif = '<div class="notifno">'+data.message+'</div>';
				$('#mainlognotif').html(notif).slideDown().delay(1000).slideUp();
			}
		},
		error: function(error){
			console.log(error);
			$("#progressbox").delay(1000).fadeOut(400, function(){
				$("#progressbar").css("width", "0%" );
			});
			var notif = '<div class="notifno">Maaf, Gambar gagal diupload.</div>';
			$('#mainlognotif').html(notif).slideDown().delay(1000).slideUp();
		}
	});
}

// del banner
function delfile(){
	if ( confirm("Yakin ingin menghapus file ini?") ) {
		$("#file_name").val("");
		$("#imgview").slideUp(400, function(){
			$("#uploadbox").slideDown(400, function(){
				$("#imgview").html("");
			});
		});
  	}
}

// upload banner
function upload_file_videos(path) {
	$('input#video_upload').simpleUpload(global_url+"/engine/uploadv.php", {
		data: { path:path, uploads_video: global_var },
		expect: "json",
		start: function(file){ console.log("upload started"); },
		progress: function(progress){
			$("#progressboxvideo").show();
			$("#progressbarvideo").css("width", Math.round(progress) + "%" );
		},
		success: function(data){
			if(data.success == true){
				$("#file_video").val( data.filename );
				var gambar = '<video controls><source src="'+path.replace("../../","../")+''+data.filename+'" type="video/mp4"></video>';
				gambar += '<img class="icon" src="themes/images/delete.png" width="16" height="16" onclick="delfilevideo()" />';
				$("#videoview").html(gambar);
				
				$("#progressboxvideo").delay(500).fadeOut(400, function(){
					$("#progressbarvideo").css("width", "0%" );
					$("#uploadboxvideo").slideUp(400, function(){
						$("#videoview").slideDown();
					});
				});
			}else{
				$("#progressboxvideo").delay(1000).fadeOut(400, function(){
					$("#progressbarvideo").css("width", "0%" );
				});
				var notif = '<div class="notifno">'+data.message+'</div>';
				$('#mainlognotif').html(notif).slideDown().delay(1000).slideUp();
			}
			
		},
		error: function(error){
			$("#progressboxvideo").delay(1000).fadeOut(400, function(){
				$("#progressbarvideo").css("width", "0%" );
			});
			var notif = '<div class="notifno">Maaf, Video gagal diupload.</div>';
			$('#mainlognotif').html(notif).slideDown().delay(1000).slideUp();
		}
	});
}
// del banner
function delfilevideo(){
	if ( confirm("Yakin ingin menghapus file ini?") ) {
		$("#video_upload").val("");
		$("#videoview").slideUp(400, function(){
			$("#uploadboxvideo").slideDown(400, function(){
				$("#videoview").html("");
			});
		});
  	}
}
function save_privacy_terms(forpage)
{
	var id=$('#view_id').val(),
		contenttext=tinyMCE.get('TinyMCE').getContent();

	if ( contenttext == '' ) {
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, Konten ini harus diisi.</div>').slideDown().delay(3000).slideUp();
	}else{
		$('#adminloader').fadeIn();
		$.post(global_url+"/engine/ajax.php", {			
			id: id,
			contenttext: contenttext,
			forpage: forpage,
			save_privacy_terms: global_var
		}, function(data,status){
			$('#adminloader').fadeOut();
			if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
				var notif = '<div class="notifyes">Sukses! berhasil disimpan.</div>';
				$('#mainlognotif').html(notif).slideDown().delay(1000).slideUp(400, function(){
					window.history.reload();
				});
			} else {
				$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
					.slideDown().delay(3000).slideUp();
			}
		});
	}
}


// Document Ready
$(document).ready(function() {
    $( ".datepicker" ).datepicker({ dateFormat: "d MM yy", defaultDate: null });
});

// Save Sliders
function save_sliderabout(){
	$('#mainlognotif').hide();
	var slider = [];
	$('.listdesc').each(function(){ slider.push(this.value); });
	var list_slider = slider.join(',');

	var id = $('#id').val(),
		titleslider = $('#titleslider').val(),
		old_file = $('#old_file').val(),
		file_name = $('#file_name').val();
	if(titleslider == ""){
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, kolom yang bertanda * harus diisi.</div>').slideDown().delay(3000).slideUp();
	}else{
		$('#adminloader').fadeIn();
		$.post(global_url+"/engine/ajax.php", {
			id: id,
			list_slider: list_slider,
			titleslider: titleslider,
			old_file: old_file,
			file_name: file_name,

			save_slider: global_var
		}, function(data,status){
			$('#adminloader').fadeOut();
			if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
				var notif = '<div class="notifyes">Sukses! Slider Tentang Kami berhasil disimpan.</div>';
				$('#mainlognotif').html(notif).slideDown().delay(2000).slideUp(function(){window.location.reload();});
			} else {
				$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
					.slideDown().delay(2000).slideUp();	
			}
		})
	}
}

// Desc web home
function savedesc(forpage){
	$('#mainlognotif').hide();
	var iddesc = $('#iddesc').val(),
		listdesc = $('#desccontent').val();
	$('#adminloader').fadeIn();
	$.post(global_url+"/engine/ajax.php", {		
		iddesc: iddesc,
		listdesc: listdesc,
		forpage: forpage,

		save_descpage: global_var
	}, function(data,status){
		$('#adminloader').fadeOut();
		if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
			var notif = '<div class="notifyes">Sukses! Konten berhasil disimpan.</div>';
			$('#mainlognotif').html(notif).slideDown().delay(2000).slideUp(function(){window.location.reload();});
		} else {
			$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
				.slideDown().delay(2000).slideUp();
		}
	})
}

// Desc web home
function save_desccareer(forpage){
	$('#mainlognotif').hide();
	var iddesc = $('#iddesc').val(),
		listdesc = $('#desccontent').val();
		subdesc = $('#subdesccontent').val();
	$('#adminloader').fadeIn();
	$.post(global_url+"/engine/ajax.php", {		
		iddesc: iddesc,
		listdesc: listdesc,
		subdesc: subdesc,
		forpage: forpage,

		save_desccareer: global_var
	}, function(data,status){
		$('#adminloader').fadeOut();
		if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
			var notif = '<div class="notifyes">Sukses! Konten berhasil disimpan.</div>';
			$('#mainlognotif').html(notif).slideDown().delay(2000).slideUp(function(){window.location.reload();});
		} else {
			$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
				.slideDown().delay(2000).slideUp();
		}
	})
}

// Save Career
function save_career(){
	$('#mainlognotif').hide();
	var shortdesc = [];
	$('.listdesc').each(function(){ shortdesc.push(this.value); });
	var list_desc = shortdesc.join('|#|');

	var id = $('#id').val(),
		titlejob = $('#titlejob').val(),
		descjob = $('#descjob').val(),
		old_file = $('#old_file').val(),
		file_name = $('#file_name').val();
	if(titlejob == ""){
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, kolom yang bertanda * harus diisi.</div>').slideDown().delay(3000).slideUp();
	}else{
		$('#adminloader').fadeIn();
		$.post(global_url+"/engine/ajax.php", {
			id: id,
			titlejob: titlejob,
			descjob: descjob,
			list_desc: list_desc,
			old_file: old_file,
			file_name: file_name,

			save_career: global_var
		}, function(data,status){
			$('#adminloader').fadeOut();
			if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
				var notif = '<div class="notifyes">Sukses! List karir berhasil disimpan.</div>';
				$('#mainlognotif').html(notif).slideDown().delay(2000).slideUp(function(){window.location.reload();});
			} else {
				$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
					.slideDown().delay(2000).slideUp();
			}
		})
	}
}



// Save Sliders
function save_sliderfeature(){
	$('#mainlognotif').hide();

	var id = $('#id').val(),
		titleslider = $('#titleslider').val(),
		old_file = $('#old_file').val(),
		file_name = $('#file_name').val();
	if(titleslider == ""){
		$('#mainlognotif').hide();
		$('#mainlognotif').html('<div class="notifno">Maaf, kolom yang bertanda * harus diisi.</div>').slideDown().delay(3000).slideUp();
	}else{
		$('#adminloader').fadeIn();
		$.post(global_url+"/engine/ajax.php", {
			id: id,
			titleslider: titleslider,
			old_file: old_file,
			file_name: file_name,

			save_sliderfeature: global_var
		}, function(data,status){
			$('#adminloader').fadeOut();
			if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
				var notif = '<div class="notifyes">Sukses! Slider Fitur berhasil disimpan.</div>';
				$('#mainlognotif').html(notif).slideDown().delay(2000).slideUp(function(){window.location.reload();});
			} else {
				$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
					.slideDown().delay(2000).slideUp();
			}
		})
	}
	
}

// save list home
function save_listhome(){
	$('#mainlognotif').hide();
	var id = $('#view_id').val(),
		judul = $('#name').val(),
		desc  = $('#desc').val(),
		image = $('#file_name').val(),
		old_file = $('#old_file').val();
	$('#adminloader').fadeIn();

	$.post(global_url+"/engine/ajax.php", {		
		id: id,
		judul: judul,
		desc: desc,
		image: image,
		old_file: old_file,

		save_listhome: global_var

	}, function(data,status){
		$('#adminloader').fadeOut();
		if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
			var notif = '<div class="notifyes">Sukses! Options berhasil disimpan.</div>';
			$('#mainlognotif').html(notif).slideDown().delay(2000).slideUp(function(){window.location.reload();});
		} else {
			$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
				.slideDown().delay(2000).slideUp();
		}
	})

}

//Save Register
function save_register(){
	$('#mainlognotif').hide();
	var id = $('#view_id').val(),
		judul = $('#name').val(),
		image = $('#file_name').val(),
		old_file = $('#old_file').val(),
		file_video = $('#file_video').val(),
		old_video = $('#old_video').val(),
		yt_frame = $('#yt_frame').val();

	$('#adminloader').fadeIn();

	$.post(global_url+"/engine/ajax.php", {		
		id: id,
		judul: judul,
		image: image,
		old_file: old_file,
		file_video: file_video,
		old_video: old_video,
		yt_frame: yt_frame,

		save_register: global_var

	}, function(data,status){
		$('#adminloader').fadeOut();
		if ( status == 'success' && data.indexOf('berhasil')>= 0 )  {
			var notif = '<div class="notifyes">Sukses! Karir berhasil disimpan.</div>';
			$('#mainlognotif').html(notif).slideDown().delay(2000).slideUp();//function(){window.location.reload();});
		} else {
			$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
				.slideDown().delay(2000).slideUp();
		}
	})
}