<?php
$views = "SELECT * FROM page_terms";
$qry_view = mysqli_query($dbconnect, $views);
$array = mysqli_fetch_array($qry_view);
if (mysqli_num_rows($qry_view) > 0) {
	$getID = $array['id'];
	$title = $array['content'];
} else {
	$getID = 0;
	$title = "";
}
?>

<div class="maincontent">
	<div class="some_input">
		<input type="hidden" name="view_id" id="view_id" value="<?php echo $getID; ?>">
		<div class="wrap_form">
			<textarea id="TinyMCE" name="TinyMCE"><?php echo $title; ?></textarea>
		</div>
	</div>
	<div class="relative">
		<input type="button" class="bag_submit" value="Simpan" onclick="save_privacy_terms('terms')" />
		<img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" />
		<div class="notif" id="mainlognotif"></div>
	</div>
	<div class="clear"></div>
</div>
<script src="https://cdn.tiny.cloud/1/7rcj9g2ls699yn05c9h3tgjadsrm7364pyevw7c0jdmebojn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({
		selector: '#TinyMCE',
		plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
		toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
		toolbar_mode: 'floating',
		tinycomments_mode: 'embedded',
		tinycomments_author: 'Gas.ID Teams',
	});
</script>