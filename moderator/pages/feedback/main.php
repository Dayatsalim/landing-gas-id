<h2>FeedBack</h2>

<?php if ( isset($_GET["section"]) ) {

	$section = secure_string($_GET["section"]);

	include($section.".php");

} else { include("list.php"); } ?>