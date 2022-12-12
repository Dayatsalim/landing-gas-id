<div class="maincontent">
    <h3>Slider Konten Baru</h3>

    <div class="halfleft">
        <table class="blanktable">
            <tr>
                <td>Judul <span class="must">*</span></td>
                <td><input style="width: 300px;" type="text" name="titleslider" id="titleslider" /></td>
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
        <input type="hidden" value="" name="old_file" id="old_file" />
    </div>

    <div class="clear"></div>
    <div class="submitarea halfleft relative">
        <input type="hidden" name="id" id="id" value="0" />
        <input type="button" value="&laquo; Batal" onClick="window.history.back()" /> &nbsp;&nbsp;
        <input type="button" value="Simpan" onclick="save_sliderfeature()" />
        <img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" style="left: 380px;" />
        <div class="notif" id="mainlognotif"></div>
    </div>
    <div class="clear"></div>
</div>