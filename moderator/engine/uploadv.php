<?php require("../engine/functions.php");

if ( isset($_POST['uploads_video']) && ( $_POST['uploads_video']==GLOBAL_FORM ) ) {

	$target_dir = $_POST['path'];
	$target_file = $target_dir . basename($_FILES["videofile"]["name"]);
	$uploadOk = 1;
	$filename = "";
	// Check if image file is a actual image or fake image
	$check = $_FILES["videofile"]["size"];
	if($check !== false) {
		$message = "File is an video.";
		$uploadOk = 1;
	} else {
		$message = "File is not an video.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["videofile"]["size"] > 5000000) {
		$message = "Sorry, your file video is too large.";
		$uploadOk = 0;
	} 
	// Allow certain file formats
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if($imageFileType !== "mp4" ) {
		$message = "Sorry, only MP4 files are allowed.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$success = false;
		$message = "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		$no_space = str_replace(' ', '', $_FILES["videofile"]["name"] );
		$temp = $explode = explode( ".", $no_space );
		array_pop($explode);
		$namathok = implode("",$explode);
		$newfilename = $namathok."_".strtotime("now") . '.' . end($temp);
		$upload_file = move_uploaded_file($_FILES["videofile"]["tmp_name"], $target_dir.$newfilename );
		if ($upload_file) {
			$success = true;
			$message = "The file ". basename( $_FILES["videofile"]["name"]). " has been uploaded.";
			$filename = $newfilename;
		} else {
			$success = false;
			$message =  "Sorry, there was an error uploading your file.";
		}
	}
	
	$output = array("success" => $success, "message" => $message, "filename" => $filename );
	echo json_encode($output);
}