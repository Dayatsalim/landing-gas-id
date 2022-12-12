<?php

// PRE CONFIG
session_start();
date_default_timezone_set("Asia/Jakarta"); 
// setlocale(LC_MONETARY,"id_ID");
// Global config
require('config.php');
// check cookie
if ( isset($_COOKIE[USER_COOKIE]) && $_COOKIE[USER_COOKIE] != '' ) {
	$_SESSION[USER_SESSION] = $_COOKIE[USER_COOKIE];
	$user_id = $_SESSION[USER_SESSION] / USER_HASH;
	$time = time()+360; // 1 jam
	setcookie( USER_COOKIE, $user_id*USER_HASH, $time, "/");
} else { $user_id = ""; }
// connect database
$dbconnect = mysqli_connect('localhost',DB_USER,DB_PASS,DB_NAME);
// logout
if ( isset($_GET['logout']) && $_GET['logout']=='true' ) { user_logout(); }

// GLOBAL FUNCTION
// user IP
function getUserIP() {
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if ( filter_var($client, FILTER_VALIDATE_IP) ) { $ip = $client; }
    else if ( filter_var($forward, FILTER_VALIDATE_IP) ) { $ip = $forward; }
    else { $ip = $remote; }
    return $ip;
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

// login user
function user_login() {
	global $dbconnect;
	$phone = trim($_POST['login_phone']);
	$phone = secure_string($phone);
	$pass = md5( secure_string($_POST["login_pass"]).USER_PASS );
	$argsmain = "SELECT id FROM worker WHERE phone='$phone' AND password='$pass' AND active='1'";
	$resultmain = mysqli_query( $dbconnect, $argsmain );
	$time = time()+360; // 1 jam
	if ( mysqli_num_rows($resultmain) ) {
		$user = mysqli_fetch_array($resultmain);
		$_SESSION[USER_SESSION] = $user['id']*USER_HASH;
		$setcookie_user = setcookie( USER_COOKIE, $user['id']*USER_HASH, $time, "/");
		return 'berhasil';	
	} else { return 'gagal'; }
}
// logout user
function user_logout() {
	unset($_SESSION[USER_SESSION]);
	setcookie(USER_COOKIE, '', time()-3600, "/");
	header( "Location: ".GLOBAL_URL );
}
// check mengandung desimal
function containsDecimal( $value ) {
    if ( strpos( $value, "." ) !== false ) { return true; }
	else { return false; }
}
// autoselect
function auto_select($sumber,$value) {
	if ( $sumber == $value ) { echo 'selected="selected"'; }
}
// is logged in
function is_login() {
	if  ( isset($_SESSION[USER_SESSION]) ) {
		$user_id = $_SESSION[USER_SESSION] / USER_HASH;
		if ( containsDecimal($user_id) ) { return false; }
		else { return true; }
	} else if ( isset($_COOKIE[USER_COOKIE]) ) {
		$user_id = $_COOKIE[USER_COOKIE] / USER_HASH;
		if ( containsDecimal($user_id) ) { return false; }
		else { return true; }
	} else { return false; }
}
// current user id
function current_user_id() {
	if  ( is_login() && isset($_SESSION[USER_SESSION]) ) {
		$session = $_SESSION[USER_SESSION];
		return $session / USER_HASH;
	} else if ( is_login() && isset($_COOKIE[USER_COOKIE]) ) {
		$cookie = $_COOKIE[USER_COOKIE];
		return $cookie / USER_HASH;
	} else { return '0'; }
}

// data tabel
function data_tabel($tabel,$id,$data="name"){
	global $dbconnect;
	$args = "SELECT $data FROM ".$tabel." WHERE id='$id'";
	$query = mysqli_query( $dbconnect, $args );
	if ( $query && mysqli_num_rows( $query ) ) {
		$hasil = mysqli_fetch_array($query);
		return $hasil[$data];
	} else {
		return "";
	}
}

// current user role
function current_user_role() {
	global $dbconnect;
	$user_id = current_user_id();
	if ( $user_id > 0 ) { return data_tabel("admin",$user_id,"peran"); }
	else { return ""; }
}

// menu aktif
function menu_aktif($value,$default=null) {
	if ( (isset($_GET["page"]) && $value == $_GET["page"]) || ( !isset($_GET["page"]) && "default" == $default )  ) {
		echo "current";
	}
}
// menu aktif report
function menu_aktif_section($value,$default=null) {
	if ( (isset($_GET["section"]) && $value == $_GET["section"]) || ( !isset($_GET["section"]) && "default" == $default )  ) {
		echo "current";
	}
}

// set tanggal aktif user/group
function tanggal_aktif($user_tipe,$user_id) {
	global $dbconnect;
	$tanggal = strtotime("now");
	$args = "UPDATE ko_".$user_tipe." SET tgl_aktif='$tanggal' WHERE id='$user_id'";
	$simpan = mysqli_query( $dbconnect, $args );
}

// to indonesia: Wednesday, July 10, 2019 --> Rabu, 10 Juli 2019
function hari_tgl_ID($tanggal) {
	$pecah = explode(",",$tanggal);
	switch ($pecah[0]) {
		case "Monday": $hari = "Senin"; break;
		case "Tuesday": $hari = "Selasa"; break;
		case "Wednesday": $hari = "Rabu"; break;
		case "Thursday": $hari = "Kamis"; break;
		case "Friday": $hari = "Jumat"; break;
		case "Saturday": $hari = "Sabtu"; break;
		case "Sunday": $hari = "Minggu"; break;
		default: $hari = "Minggu";
	}
	$pecahbulan = explode(" ",$tanggal);
	switch ($pecahbulan[1]) {
		case "January": $bulan = "Januari"; break;
		case "February": $bulan = "Februari"; break;
		case "March": $bulan = "Maret"; break;
		case "May": $bulan = "Mei"; break;
		case "June": $bulan = "Juni"; break;
		case "July": $bulan = "Juli"; break;
		case "August": $bulan = "Agustus"; break;
		case "October": $bulan = "Oktober"; break;
		case "December": $bulan = "Desember"; break;
		default: $bulan = $pecahbulan[1];
	}
	$tanggal = str_replace(",","",$pecahbulan[2]);
	return $hari.", ".$tanggal." ".$bulan." ".$pecahbulan[3];
}

// to indonesia: July 10, 2019 --> 10 Juli 2019
function tgl_ID($tanggal) {
	$pecahbulan = explode(" ",$tanggal);
	switch ($pecahbulan[0]) {
		case "January": $bulan = "Januari"; break;
		case "February": $bulan = "Februari"; break;
		case "March": $bulan = "Maret"; break;
		case "May": $bulan = "Mei"; break;
		case "June": $bulan = "Juni"; break;
		case "July": $bulan = "Juli"; break;
		case "August": $bulan = "Agustus"; break;
		case "October": $bulan = "Oktober"; break;
		case "December": $bulan = "Desember"; break;
		default: $bulan = $pecahbulan[0];
	}
	$tanggal = str_replace(",","",$pecahbulan[1]);
	return $tanggal." ".$bulan." ".$pecahbulan[2];
}

// format angka Indonesia
function format_angka($angka,$desimal=0) {
	return number_format($angka, $desimal,",",".");
}

// cari tanggal from to
// waktu: today, yesterday, this_month, last_month
function tanggal_stat($waktu="today"){
	$tanggal = date("j");
	$bulan = date("n");
	$tahun = date("Y");
	if ( "yesterday" == $waktu ) {
		$tgl_from = $tanggal - 1;
		$from = mktime(0,0,0,$bulan,$tgl_from,$tahun);
		$to = mktime(0,0,0,$bulan,$tanggal,$tahun);
	} else if ( "this_month" == $waktu ) {
		$bulan_to = $bulan + 1;
		$from = mktime(0,0,0,$bulan,1,$tahun);
		$to = mktime(0,0,0,$bulan_to,1,$tahun);
	} else if ( "last_month" == $waktu ) {
		$bulan_from = $bulan - 1;
		$from = mktime(0,0,0,$bulan_from,1,$tahun);
		$to = mktime(0,0,0,$bulan,1,$tahun);
	} else { // today
		$tgl_to = $tanggal + 1;
		$from = mktime(0,0,0,$bulan,$tanggal,$tahun);
		$to = mktime(0,0,0,$bulan,$tgl_to,$tahun);
	}
	return array($from,$to);
}

// save option
function save_option($option,$value) {
	global $dbconnect;
	$args_cari = "SELECT * FROM options WHERE parameter='$option'";
	$result_cari = mysqli_query( $dbconnect, $args_cari );
	if ( $result_cari && mysqli_num_rows($result_cari) ) {
		$args = "UPDATE options SET the_value='$value' WHERE parameter='$option'";
	} else {
		$args = "INSERT INTO options ( parameter, the_value ) VALUES ( '$option', '$value' )";
	}
	$update = mysqli_query( $dbconnect, $args );
	return $update;
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
?>