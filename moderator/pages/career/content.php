
<div class="maincontent">
	<div class="some_input">
      <?php 
          $getDesc = mysqli_query($dbconnect,"SELECT id,label_page,content,subcontent FROM desc_page WHERE label_page='career'");
          if($getDesc && mysqli_num_rows($getDesc) > 0){
            $dataDesc = mysqli_fetch_assoc($getDesc);
            $v_idget = $dataDesc['id'];
            $v_getdesc = $dataDesc['content'];
            $v_subgetdesc = $dataDesc['subcontent'];
          }else{
            $v_idget = 0;
            $v_getdesc = "";
            $v_subgetdesc = "";
          }
      ?>
      <div class="halfleft">
        <div class="wrap_form">
          <p>Isi Konten</p>
          <div class="form__group">
            <input type="input" value="<?php echo $v_getdesc; ?>" class="form__field" placeholder="Judul" name="desccontent" id='desccontent' required />
            <label for="name" class="form__label">Judul</label>
          </div>
          <div class="form__group">
            <input type="input" value="<?php echo $v_subgetdesc; ?>" class="form__field" placeholder="Sub Judul" name="subdesccontent" id='subdesccontent' required />
            <label for="name" class="form__label">Sub Judul</label>
          </div>
          <div class="submitarea relative">
            <input type="hidden" name="iddesc" value="<?php echo $v_idget; ?>" id="iddesc">
            <div class="bag_submit"><input type="submit" value="Simpan" onclick="save_desccareer('career');"></div> 
            <img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" style="left: 380px;" />
            <div class="notif" id="mainlognotif"></div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
	</div>
</div>
