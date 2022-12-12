<div class="maincontent">
    <h3>List Karir Baru</h3>

    <div class="halfleft">
        <table class="blanktable">
            <tr>
                
                <td>Divisi Pekerjaan <span class="must">*</span></td>
                <td><input style="width: 300px;" type="text" name="titlejob" id="titlejob" /></td>
            </tr>
            <tr>
                <td>Diskripsi Singkat</td>
                <td>
                <textarea name="descjob" id="descjob" cols="40" rows="10"></textarea>
                </td>
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
        <input type="button" value="Simpan" onclick="save_career()" />
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
</script>