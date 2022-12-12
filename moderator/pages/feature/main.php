<h2>Laman Fitur</h2>

<nav class="topnav">
	<a href="?page=feature&section=content" class="<?php menu_aktif_section('content'); ?>">Konten Teks</a>
	<a href="?page=feature&section=sliders" class="<?php menu_aktif_section('sliders'); ?>">Slider Konten</a>
</nav>

<?php if ( isset($_GET["section"]) ) {

	$section = secure_string($_GET["section"]);

	include($section.".php");

} else { include("content.php"); } ?>