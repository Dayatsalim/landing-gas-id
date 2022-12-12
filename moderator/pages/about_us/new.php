<div class="maincontent">
    <h3>Slider Konten Baru</h3>

    <div class="halfleft">
        <table class="blanktable">
            <tr>
                <td>Judul <span class="must">*</span></td>
                <td><input style="width: 300px;" type="text" name="titleslider" id="titleslider" /></td>
            </tr>
            <tr>
                <td>List</td>
                <td>
                <div id="form-size" class="form-size">
                    <div class="button row_input" id="addrow">Tambah</div>
                    <div class="form-group row_input">
                        <input type="text" name="listdesc[]" id="listdesc" class="listdesc" />
                    </div>
                </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="halfright">
        <div class="uploadbox relative " id="uploadbox">
			<label class="button">
				<input class="file_upload" id="file_upload" type="file" name="file" onchange="upload_file('<?php echo DEFAULT_IMAGE; ?>')" />Upload
			</label>
			<div class="progressbox" id="progressbox">
				<div class="progressbar" id="progressbar"></div>
			</div>
		</div>
        <div class="imgview none" id="imgview"></div>
        <div class="small must">* Max file 5MB, pixel 800 x 800</div>
		<input type="hidden" value="" name="file_name" id="file_name" />
    </div>

    <div class="clear"></div>
    <div class="submitarea halfleft relative">
        <input type="hidden" name="id" id="id" value="0" />
        <input type="button" value="&laquo; Batal" onClick="window.history.back()" /> &nbsp;&nbsp;
        <input type="button" value="Simpan" onclick="save_sliderabout()" />
        <img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" style="left: 380px;" />
        <div class="notif" id="mainlognotif"></div>
    </div>
    <div class="clear"></div>
</div>
<script>
$(document).ready(function(){
    $('.form-size .form-group .removerow').first().remove();
	$('#addrow').click(function(e){
        e.preventDefault();
        $('.form-size').append('<div class="form-group row_input"><input type="text" name="listdesc[]" id="listdesc" class="listdesc" /><div class="removerow button" id="removerow">Hapus</div></div>');
    });
    $('.form-size').on("click",".removerow", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent().remove();
    });
});
     

    // $('body').delegate('#removerow', 'click', function(){
    //     $(this).parent().parent().remove();
    // });
    // function removerow(id){
    //     $('#listrowadd_'+id).remove();

    //     return;
    // }
    // var items = 0;
    // var rev = 0;
    // function addrow() {
    //     items++;
    //     rev+=1;
 
    //     var html = '<div class="listrowadd_'+rev+'" style="margin: 15px auto;"><input type="text" name="listdesc[]" id="listdesc"/><div id="removerow_'+rev+'" onclick="removerow('+rev+')" class="button" style="margin-left: 15px; background-color: red;">Hapus Baris</div></div>';
 
    //     // var row = document.getElementById("rowadd").insertRow();
    //     // row.innerHTML = html;
    //     $('#rowadd').append(html);
    // }
///});
</script>