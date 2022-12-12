<?php require("../engine/functions.php");

if ( isset($_POST['uploads_images']) && ( $_POST['uploads_images']==GLOBAL_FORM ) ) {

	$target_dir = $_POST['path'];
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$filename = "";
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["file"]["tmp_name"]);
	if($check !== false) {
		$message = "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		$message = "File is not an image.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["file"]["size"] > 5000000) {
		$message = "Sorry, your file is too large.";
		$uploadOk = 0;
	} 
	// Allow certain file formats
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		$message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$success = false;
		$message = "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		$no_space = str_replace(' ', '', $_FILES["file"]["name"] );
		$temp = $explode = explode( ".", $no_space );
		array_pop($explode);
		$namathok = implode("",$explode);
		$newfilename = $namathok."_".strtotime("now") . '.' . end($temp);
		// switch ($imageFileType) {
		// 	case 'jpg':
		// 		$newfilename = imagecreatefromjpeg($newfilenamee);
		// 		break;
		// 	case 'png':
		// 		$newfilename = imagecreatefrompng($_FILES['file']['tmp_name']);
		// 		break;
		// 	case 'jpeg':
		// 		$newfilename = imagecreatefromjpeg($newfilenamee);
		// 		break;
		// 	case 'gif':
		// 		$newfilename = imagecreatefromgif($newfilenamee);
		// 		break;
		// 	default:
		// 		$newfilename = $newfilenamee;
		// 		break;
		// }
		$upload_file = move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$newfilename );
		if ($upload_file) {
			$success = true;
			$message = "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
			$filename = $newfilename;
		} else {
			$success = false;
			$message =  $tmpName = $_FILES['file']['tmp_name'];;
		}
	}
	
	$output = array("success" => $success, "message" => $message, "filename" => $filename );
	echo json_encode($output);
}