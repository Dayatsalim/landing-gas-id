<h2>Laman Karir</h2>

<nav class="topnav">
	<a href="?page=career&section=content" class="<?php menu_aktif_section('content'); ?>">Konten Teks</a>
	<a href="?page=career&section=sliders" class="<?php menu_aktif_section('sliders'); ?>">Slider Konten</a>
</nav>

<?php if ( isset($_GET["section"]) ) {

	$section = secure_string($_GET["section"]);

	include($section.".php");

} else { include("content.php"); } ?>