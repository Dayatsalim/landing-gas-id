<?php
date_default_timezone_set("Asia/Jakarta"); 
// Global config
require('config.php');
$dbconnect = mysqli_connect('localhost',DB_USER,DB_PASS,DB_NAME);
function getVisIpAddr() {
      
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
// data tabel
function data_tabel($param){
	global $dbconnect;
	$query = mysqli_query( $dbconnect, $param );
	if ( $query && mysqli_num_rows( $query ) ) {
		$hasil = mysqli_fetch_array($query);
		return $hasil;
	} else {
		return "";
	}
}
// get option
function get_option($option) {
	global $dbconnect;
	$args_cari = "SELECT the_value FROM options WHERE parameter='$option'";
	$result_cari = mysqli_query( $dbconnect, $args_cari );
	if ( $result_cari && mysqli_num_rows($result_cari) ) {
		$value = mysqli_fetch_array($result_cari);
		return $value["the_value"];
	} else {
		return "";
	}
}

//secure input form
function secure_string($string) { 
	global $dbconnect;
	$string = strip_tags($string);
	$string = htmlspecialchars($string, ENT_QUOTES);
	$string = trim($string);
	if (get_magic_quotes_gpc()) { $string = stripslashes($string); }
	$string = mysqli_real_escape_string($dbconnect,$string);
	return $string;
}