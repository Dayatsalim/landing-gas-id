<div class="maincontent">
    <h3>Slider Konten Baru</h3>
    <?php 
        $id = secure_string($_GET['id']);
        $data = mysqli_fetch_assoc(mysqli_query($dbconnect,"SELECT * FROM page_feature WHERE id='$id'"));
    ?>
    <div class="halfleft">
        <table class="blanktable">
            <tr>
                <td>Judul <span class="must">*</span></td>
                <td><input style="width: 300px;" type="text" name="titleslider" id="titleslider" value="<?php echo $data['title'];?>" /></td>
            </tr>
        </table>
    </div>

    <div class="halfright">
        <?php
			if (!empty($data['image'])) {
				$class = "none";
				$htmldom =
					'
							<div class="imgview" id="imgview">
								<img class="bannerview" src="' . VIEW_IMAGE . $data['image'] . '" alt="Images" />
								<img class="icon" src="themes/images/delete.png" width="16" height="16" onclick="delfile()" />
							</div>
						';
			} else {
				$class = "";
				$htmldom =
					'
							<div class="imgview none" id="imgview"></div>
						';
			}
		?>
        <div class="uploadbox relative <?php echo $class; ?>" id="uploadbox">
			<label class="button">
				<input class="file_upload" id="file_upload" type="file" name="file" onchange="upload_file('<?php echo DEFAULT_IMAGE; ?>')" />Upload
			</label>
			<div class="progressbox" id="progressbox">
				<div class="progressbar" id="progressbar"></div>
			</div>
		</div>
        <?php echo $htmldom; ?>
        <div class="small must">* Max file 5MB, pixel 800 x 800</div>
        <input type="hidden" value="<?php echo $data['image'];?>" name="old_file" id="old_file" />
		<input type="hidden" value="<?php echo $data['image'];?>" name="file_name" id="file_name" />
    </div>

    <div class="clear"></div>
    <div class="submitarea halfleft relative">
        <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>" />
        <input type="button" value="&laquo; Batal" onClick="window.history.back()" /> &nbsp;&nbsp;
        <input type="button" value="Simpan" onclick="save_sliderfeature()" />
        <img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" style="left: 380px;" />
        <div class="notif" id="mainlognotif"></div>
    </div>
    <div class="clear"></div>
</div>
<script>
//$(document).ready(function(){
     

    // $('body').delegate('#removerow', 'click', function(){
    //     $(this).parent().parent().remove();
    // });
    function removerow(id){
        $('#listrowadd_'+id).remove();

        return;
    }
    var items = 0;
    var rev = 0;
    function addrow() {
        items++;
        rev+=1;
 
        var html = '<div class="listrowadd_'+rev+'" style="margin: 15px auto;"><input type="text" name="listdesc[]" id="listdesc"/><div id="removerow_'+rev+'" onclick="removerow('+rev+')" class="button" style="margin-left: 15px; background-color: red;">Hapus Baris</div></div>';
 
        // var row = document.getElementById("rowadd").insertRow();
        // row.innerHTML = html;
        $('#rowadd').append(html);
    }
///});
</script>