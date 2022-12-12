<?php
$views = "SELECT * FROM page_home";
$qry_view = mysqli_query($dbconnect, $views);
$array = mysqli_fetch_array($qry_view);
if (mysqli_num_rows($qry_view) > 0) {
	$getID = $array['id'];
	$title = $array['label_post'];
	$post = $array['post'];
	$image_post = $array['image_post'];
} else {
	$getID = 0;
	$title = "";
	$post = "";
	$image_post = "";
}
?>

<div class="maincontent">
	<div class="some_input">
		<input type="hidden" name="view_id" id="view_id" value="<?php echo $getID; ?>">
		<div class="halfleft">
			<div class="wrap_form">
				<div class="form__group">
					<input value="<?php echo $title; ?>" type="input" class="form__field" placeholder="Judul" name="name" id='name' required />
					<label for="name" class="form__label">Judul</label>
				</div>
			</div>
			<div class="wrap_form">
				<p>Deskripsi</p>
				<div class="form__group">
					<textarea name="desc" id="desc" cols="50" rows="10"><?php echo $post; ?></textarea>
				</div>
			</div>
		</div>
		<div class="halfright">
			<div class="wrap_form">
				<p>Upload Gambar</p>
				<?php
				if (!empty($image_post)) {
					$class = "none";
					$htmldom =
							'
								<div class="imgview" id="imgview">
									<img class="bannerview" src="' . VIEW_IMAGE . $image_post . '" alt="Images" />
									<img class="icon" src="themes/images/delete.png" width="16" height="16" onclick="delfile()" />
								</div>
							';
				} else {
					$class = "";
					$htmldom =
							'
								<div class="imgview none" id="imgview"></div>
							';
				}
				?>
				<div class="form__group">
					<div class="uploadbox relative <?php echo $class; ?>" id="uploadbox">
						<label class="button">
							<input class="file_upload" id="file_upload" type="file" name="file" onchange="upload_file('<?php echo DEFAULT_IMAGE; ?>')" />Upload
						</label>
						<div class="progressbox" id="progressbox">
							<div class="progressbar" id="progressbar"></div>
						</div>
					</div>
					<?php echo $htmldom; ?>
					<div class="small must">* Max file 5MB, pixel 800 x 800</div>
					<input type="hidden" value="<?php echo $image_post; ?>" name="old_file" id="old_file" />
					<input type="hidden" value="<?php echo $image_post; ?>" name="file_name" id="file_name" />
					<br>
					<div class="empty-text"></div>
				</div>

			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="relative">
		<input type="button" class="bag_submit" value="Simpan" onclick="save_listhome()" />
		<img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" />
		<div class="notif" id="mainlognotif"></div>
	</div>
	<div class="clear"></div>
</div>
