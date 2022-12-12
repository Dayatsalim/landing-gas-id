<div class="maincontent">
    <div class="some_input">
        <?php
        $getDesc = mysqli_query($dbconnect, "SELECT id,label_page,content FROM desc_page WHERE label_page='aboutus'");
        if ($getDesc && mysqli_num_rows($getDesc) > 0) {
            $dataDesc = mysqli_fetch_assoc($getDesc);
            $v_idget = $dataDesc['id'];
            $v_getdesc = $dataDesc['content'];
        } else {
            $v_idget = 0;
            $v_getdesc = "";
        }
        ?>
        <div class="wrap_form">
            <p>Isi Konten</p>
            <div class="form__group">
                <textarea name="desccontent" id="desccontent" cols="50" rows="10"><?php echo $v_getdesc; ?></textarea>
            </div>
            <div class="submitarea relative">
                <input type="hidden" name="iddesc" value="<?php echo $v_idget; ?>" id="iddesc">
                <div class="bag_submit"><input type="submit" value="Simpan" onclick="savedesc('aboutus');"></div>
                <img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" style="left: 380px;" />
                <div class="notif" id="mainlognotif"></div>
            </div>
        </div>
    </div>
</div>