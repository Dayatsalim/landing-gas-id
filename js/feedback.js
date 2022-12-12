function save_feedback(){
    $('#mainlognotif').hide();
    let namefeedback = $('#namefeedback').val(),
        emailfeedback = $('#emailfeedback').val()
        subjectfeedback = $('#subjectfeedback').val()
        opinionfeedback = $('#opinionfeedback').val();
        if ( namefeedback == '' || emailfeedback == '' || subjectfeedback == '' || opinionfeedback == '' ) {
            $('#mainlognotif').hide();
		    $('#mainlognotif').html('<div class="notifno">Maaf, semua kolom harus diisi.</div>').slideDown().delay(3000).slideUp();
        }else{
            $('#adminloader').fadeIn();
            $.post(global_url+"/settings/ajax.php", {			
                namefeedback: namefeedback,
                emailfeedback: emailfeedback,
                subjectfeedback: subjectfeedback,
                opinionfeedback: opinionfeedback,
            
                save_feed: global_var
            }, function(data,status){
                $('#adminloader').fadeOut();
                if ( status == 'success' && data.indexOf('berhasil')>= 0 ) {
                    var notif = '<div class="notifyes">Terimakasih atas masukkan Anda.</div>';
                    $('#mainlognotif').html(notif).slideDown().delay(1000).slideUp(function(){window.location.reload()});
                } else {
                    $('#mainlognotif').html('<div class="notifno">Maaf, telah terjadi error, coba refresh (F5) halaman ini lalu ulangi lagi.</div>')
                        .slideDown().delay(3000).slideUp();
                }
            });
        }
    return;
}