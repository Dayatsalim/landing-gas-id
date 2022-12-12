// JavaScript Document

// User login

function do_userlogin(event) {

	event.preventDefault();

	$('#mainlognotif').hide();

	var login_phone = $('#userphone').val();

	var login_pass = $('#userpass').val();

	if ( login_phone == '' || login_pass == '' ) {

		$('#mainlognotif').hide();

		$('#mainlognotif').html('<div class="notifno">Maaf, telepon dan password harus diisi.</div>').slideDown().delay(3000).slideUp();

	} else {

		$('#loginloader').fadeIn();

		$.post(global_url+"/engine/ajax.php", {			

			login_phone: login_phone,

			login_pass: login_pass,

			login_serial: global_var

    	}, function(data,status){

			$('#loginloader').fadeOut();

			if ( status == 'success' && data.indexOf('berhasil')>= 0 ) {

				window.location.href = global_url;

			} else if ( status == 'success' && data.indexOf('gagal')>= 0 )  {

				var salahpass = '<div class="notifno">Maaf, telepon atau passsword salah.</div>';

				$('#mainlognotif').html(salahpass).slideDown().delay(3000).slideUp();;	

			} else {

				$('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')

					.slideDown().delay(3000).slideUp();

			}

    	});

	}

	return;

}