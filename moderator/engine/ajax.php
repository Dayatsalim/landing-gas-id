<?php require("../engine/functions.php");

// User Login
if (isset($_POST['login_serial']) && ($_POST['login_serial'] == GLOBAL_FORM)) {
	echo user_login();
}

// Save User
if (isset($_POST['user_serial']) && ($_POST['user_serial'] == GLOBAL_FORM)) {
	$nama = ucwords(secure_string($_POST["nama"]));
	$alamat = secure_string($_POST["alamat"]);
	$telepon = secure_string($_POST["telepon"]);
	$email = secure_string($_POST["email"]);
	$password = secure_string($_POST["pass"]);
	$kunci = md5($password . USER_PASS);
	$id = secure_string($_POST["id"]);
	$position = secure_string($_POST["position"]);

	//Check if email or phone is register
	// check email
	if ("" != $email) {
		$args = "SELECT id FROM worker WHERE email='$email' AND active='1'";
		$query = mysqli_query($dbconnect, $args);
		if ($query && mysqli_num_rows($query)) {
			$e_fetch = mysqli_fetch_array($query);
			($e_fetch['id'] == $id) ? $error = "" : $error = "email";
		}
	}

	// check phone
	if (empty($error)) {
		$args = "SELECT id FROM worker WHERE phone='$telepon'";
		$query = mysqli_query($dbconnect, $args);
		if ($query && mysqli_num_rows($query)) {
			$p_fetch = mysqli_fetch_array($query);
			($p_fetch['id'] == $id) ? $error = "" : $error = "telepon";
		}
	}

	if (empty($error)) {
		if ("0" == $id) {
			$tgl_daftar = $tgl_aktif = strtotime("now");
			$args = "INSERT INTO worker (  name, address, email, phone , password, role, date )
			VALUES ( '$nama', '$alamat', '$email', '$telepon', '$kunci', '$position','$tgl_daftar' )";
			$simpan = mysqli_query($dbconnect, $args);
			if ($simpan) {
				echo 'berhasil';
			} else {
				echo 'gagal';
			}
		} else {
			if ("" == $password) {
				$argss = "UPDATE worker SET name='$nama', address='$alamat', phone='$telepon', email='$email', role='$position' WHERE id='$id' ";
			} else {
				$argss = "UPDATE worker SET name='$nama', address='$alamat', phone='$telepon', email='$email', password='$kunci', role='$position' WHERE id='$id' ";
			}
			$simpan = mysqli_query($dbconnect, $argss);
			if ($simpan) {
				echo 'berhasil';
			} else {
				echo 'gagal';
			}
		}
	} else {
		echo 'error|||' . $error;
	}
}
// hapus user
if (isset($_POST['hapus_user_serial']) && ($_POST['hapus_user_serial'] == GLOBAL_FORM)) {
	$hapus_id = secure_string($_POST["hapus_id"]);
	$args = "UPDATE worker SET active='0' WHERE id='$hapus_id'";
	$hapus = mysqli_query($dbconnect, $args);
	if ($hapus) {
		echo 'berhasil';
	} else {
		echo 'gagal';
	}
}


// save option
if (isset($_POST['saveoption_serial']) && ($_POST['saveoption_serial'] == GLOBAL_FORM)) {

	$file_name    = secure_string($_POST["file_name"]);
	$save = save_option("file_name", $file_name);
	$pusat_alamat    = secure_string($_POST["pusat_alamat"]);
	$save = save_option("pusat_alamat", $pusat_alamat);
	$pusat_telepon   = secure_string($_POST["pusat_telepon"]);
	$save = save_option("pusat_telepon", $pusat_telepon);
	$pusat_email     = secure_string($_POST["pusat_email"]);
	$save = save_option("pusat_email", $pusat_email);
	$pusat_fb        = secure_string($_POST["pusat_fb"]);
	$save = save_option("pusat_fb", $pusat_fb);
	$pusat_instagram = secure_string($_POST["pusat_instagram"]);
	$save = save_option("pusat_instagram", $pusat_instagram);
	$pusat_youtube   = secure_string($_POST["pusat_youtube"]);
	$save = save_option("pusat_youtube", $pusat_youtube);
	$pusat_fbchat  = secure_string($_POST["pusat_fbchat"]);
	$save = save_option("pusat_fbchat", $pusat_fbchat);
	$pusat_googleplay  = secure_string($_POST["pusat_googleplay"]);
	$save = save_option("pusat_googleplay", $pusat_googleplay);
	$pusat_applestore  = secure_string($_POST["pusat_applestore"]);
	$save = save_option("pusat_applestore", $pusat_applestore);

	if ($save) {
		echo 'berhasil';
	} else {
		echo 'gagal';
	}
}

if (isset($_POST['save_listhome']) && ($_POST['save_listhome'] == GLOBAL_FORM)) {
	$id = secure_string($_POST['id']);
	$judul = secure_string($_POST['judul']);
	$desc  = secure_string($_POST['desc']);
	$image = secure_string($_POST['image']);
	$old_file = secure_string($_POST['old_file']);
	$date = strtotime('now');

	(!empty($id) && $image !== $old_file && !empty($old_file)) ? unlink(DEFAULT_IMAGE . $old_file) : "";

	(empty($id)) ? $args = "INSERT INTO page_home (date, label_post, post, image_post) VALUES('$date','$judul','$desc','$image')" : $args = "UPDATE page_home SET label_post='$judul', post='$desc', image_post='$image' WHERE id='$id'";
	$qry = mysqli_query($dbconnect, $args);

	if ($qry) {
		echo 'berhasil';
	} else {
		echo 'gagal';
	}
}

if (isset($_POST['save_register']) && ($_POST['save_register'] == GLOBAL_FORM)) {
	$id = secure_string($_POST['id']);
	$judul = secure_string($_POST['judul']);
	$image = secure_string($_POST['image']);
	$old_file = secure_string($_POST['old_file']);
	$file_video = secure_string($_POST['file_video']);
	$old_video = secure_string($_POST['old_video']);
	$yt_frame = $_POST['yt_frame'];
	
	$date = strtotime('now');

	(!empty($id) && $image !== $old_file && !empty($old_file)) ? unlink(DEFAULT_VIDEO . $old_file) : "";
	(!empty($id) && $file_video !== $old_video && !empty($old_video)) ? unlink(DEFAULT_VIDEO . $old_video) : "";

	(empty($id)) ? $args = "INSERT INTO page_register (date, title, media,thumb,frameyoutube) VALUES('$date','$judul','$file_video','$image','$yt_frame')" : $args = "UPDATE page_register SET title='$judul', media='$file_video', thumb='$image', frameyoutube='$yt_frame' WHERE id='$id'";
	$qry = mysqli_query($dbconnect, $args);

	if ($qry) {
		echo 'berhasil';
	} else {
		echo $args;
	}
}

if(isset($_POST['save_descpage']) && ($_POST['save_descpage'])==GLOBAL_FORM){
	$id = secure_string($_POST['iddesc']);
	$desc  = secure_string($_POST['listdesc']);
	$forpage = secure_string($_POST['forpage']);
	$date = strtotime('now');

	(empty($id)) ? $args = "INSERT INTO desc_page (label_page,content,date) VALUES ('$forpage','$desc','$date')" : $args="UPDATE desc_page SET content='$desc' WHERE label_page='$forpage' AND id='$id'";
	$qry=mysqli_query($dbconnect,$args);

	if($qry){ echo 'berhasil'; }else{ echo 'gagal'; }
}

if(isset($_POST['save_desccareer']) && ($_POST['save_desccareer'])==GLOBAL_FORM){
	$id = secure_string($_POST['iddesc']);
	$desc  = secure_string($_POST['listdesc']);
	$subdesc = secure_string($_POST['subdesc']);
	$forpage = secure_string($_POST['forpage']);
	$date = strtotime('now');

	(empty($id)) ? $args = "INSERT INTO desc_page (label_page,content,subcontent,date) VALUES ('$forpage','$desc','$subdesc','$date')" : $args="UPDATE desc_page SET content='$desc', subcontent='$subdesc' WHERE label_page='$forpage' AND id='$id'";
	$qry=mysqli_query($dbconnect,$args);

	if($qry){ echo 'berhasil'; }else{ echo 'gagal'; }
}

if(isset($_POST['save_slider']) && ($_POST['save_slider'])==GLOBAL_FORM){
	$id = secure_string($_POST['id']);
	$list_slider = secure_string($_POST['list_slider']);
	$titleslider = secure_string($_POST['titleslider']);
	$old_file = secure_string($_POST['old_file']);
	$file_name = secure_string($_POST['file_name']);
	$date = strtotime('now');

	(!empty($id) && $file_name !== $old_file && !empty($old_file)) ? unlink(DEFAULT_IMAGE . $old_file) : "";

	if(empty($id)){
		$args = "INSERT INTO page_aboutus (date,title,image,desclist) VALUES ('$date','$titleslider','$file_name','$list_slider')";
	}else{
		$args = "UPDATE page_aboutus SET title='$titleslider',image='$file_name',desclist='$list_slider' WHERE id='$id'";
	}

	$qry=mysqli_query($dbconnect,$args);

	if($qry){ echo 'berhasil'; }else{ echo 'gagal'; }
}

if(isset($_POST['save_sliderfeature']) && ($_POST['save_sliderfeature'])==GLOBAL_FORM){
	$id = secure_string($_POST['id']);
	$titleslider = secure_string($_POST['titleslider']);
	$old_file = secure_string($_POST['old_file']);
	$file_name = secure_string($_POST['file_name']);
	$date = strtotime('now');

	(!empty($id) && $file_name !== $old_file && !empty($old_file)) ? unlink(DEFAULT_IMAGE . $old_file) : "";

	if(empty($id)){
		$args = "INSERT INTO page_feature (date,title,image) VALUES ('$date','$titleslider','$file_name')";
	}else{
		$args = "UPDATE page_feature SET title='$titleslider',image='$file_name' WHERE id='$id'";
	}

	$qry=mysqli_query($dbconnect,$args);

	if($qry){ echo 'berhasil'; }else{ echo 'gagal'; }
}

if(isset($_POST['save_career']) && ($_POST['save_career'])==GLOBAL_FORM){
	$id = secure_string($_POST['id']);
	$titlejob = secure_string($_POST['titlejob']);
	$descjob = secure_string($_POST['descjob']);
	$list_desc = $_POST['list_desc'];
	$old_file = secure_string($_POST['old_file']);
	$file_name = secure_string($_POST['file_name']);
	$date = strtotime('now');

	(!empty($id) && $file_name !== $old_file && !empty($old_file)) ? unlink(DEFAULT_IMAGE . $old_file) : "";

	if(empty($id)){
		$args = "INSERT INTO page_career (date,title,descoftitle,media,ruledesc) VALUES ('$date','$titlejob','$descjob','$file_name','$list_desc')";
	}else{
		$args = "UPDATE page_career SET title='$titlejob',descoftitle='$descjob',media='$file_name',ruledesc='$list_desc' WHERE id='$id'";
	}

	$qry=mysqli_query($dbconnect,$args);

	if($qry){ echo 'berhasil'; }else{ echo 'gagal'; }
}

if(isset($_POST['save_privacy_terms']) && ($_POST['save_privacy_terms'])==GLOBAL_FORM){
	$id = secure_string($_POST['id']);
	$contenttext = $_POST['contenttext'];
	$forpage = secure_string($_POST['forpage']);
	$date = strtotime('now');

	if($forpage == 'terms'){
		if(empty($id)){
			$args = "INSERT INTO page_terms (content,date) VALUES ('$contenttext','$date')";
		}else{
			$args = "UPDATE page_terms SET content='$contenttext',date='$date' WHERE id='$id'";
		}
		$qry=mysqli_query($dbconnect,$args);
	}else{
		if(empty($id)){
			$args = "INSERT INTO page_privacy (content,date) VALUES ('$contenttext','$date')";
		}else{
			$args = "UPDATE page_privacy SET content='$contenttext',date='$date' WHERE id='$id'";
		}
		$qry=mysqli_query($dbconnect,$args);
	}

	if($qry){ echo 'berhasil'; }else{ echo 'gagal'; }
}