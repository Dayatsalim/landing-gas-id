<h2>Syarat Ketentuan</h2>

<?php if ( isset($_GET["section"]) ) {

	$section = secure_string($_GET["section"]);

	include($section.".php");

} else { include("list.php"); } ?>