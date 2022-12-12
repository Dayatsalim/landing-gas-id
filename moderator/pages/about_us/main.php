<h2>Laman Tentang Kami</h2>

<nav class="topnav">
	<a href="?page=about_us&section=content" class="<?php menu_aktif_section('content'); ?>">Konten Teks</a>
	<a href="?page=about_us&section=sliders" class="<?php menu_aktif_section('sliders'); ?>">Slider Konten</a>
</nav>

<?php if (isset($_GET["section"])) {

	$section = secure_string($_GET["section"]);

	include($section . ".php");
} else {
	include("content.php");
} ?>