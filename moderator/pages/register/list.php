<?php
$views = "SELECT * FROM page_register";
$qry_view = mysqli_query($dbconnect, $views);
$array = mysqli_fetch_array($qry_view);
if (mysqli_num_rows($qry_view) > 0) {
	$getID = $array['id'];
	$title = $array['title'];
	$media = $array['media'];
	$thumb = $array['thumb'];
	$frame = $array['frameyoutube'];
} else {
	$getID = 0;
	$title = "";
	$media = "";
	$thumb = "";
	$frame = "";
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

			<div class="wrap_form none">
				<p>Upload Video</p>
				<?php
				if (!empty($media)) {
					$class = "none";
					$htmldom =
						'
								<div class="imgview" id="videoview">
									<video controls><source src="' . VIEW_VIDEO . $media . '" type="video/mp4" /></video>
									<img class="icon" src="themes/images/delete.png" width="16" height="16" onclick="delfilevideo()" />
								</div>
							';
				} else {
					$class = "";
					$htmldom =
						'
								<div class="imgview none" id="videoview"></div>
							';
				}
				?>
				<div class="form__group">
					<div class="uploadbox relative <?php echo $class; ?>" id="uploadboxvideo">
						<label class="button">
							<input class="file_upload" id="video_upload" type="file" name="videofile" onchange="upload_file_videos('<?php echo DEFAULT_VIDEO; ?>')" />Upload Video
						</label>
						<div class="progressbox" id="progressboxvideo">
							<div class="progressbar" id="progressbarvideo"></div>
						</div>
					</div>
					<?php echo $htmldom; ?>
					<div class="small must">* Max file 5MB & mp4 format</div>
					<input type="hidden" value="<?php echo $media; ?>" name="old_video" id="old_video" />
					<input type="hidden" value="<?php echo $media; ?>" name="file_video" id="file_video" />
				</div>

			</div>
		</div>
		<div class="halfright">
			<div class="wrap_form">
				<div class="form__group">
					<input value="<?php echo $frame; ?>" type="input" class="form__field" placeholder="Link Youtube" name="yt_frame" id='yt_frame' />
					<label for="name" class="form__label">Link Youtube</label>
					<?php /*<textarea name="yt_frame" id="yt_frame" cols="50" rows="10"><?php echo $frame; ?></textarea>*/ ?>
				</div>
			</div>
			<div class="wrap_form none">
				<p>Upload Gambar Thumbnail</p>
				<?php
				if (!empty($thumb)) {
					$class = "none";
					$htmldom =
						'
								<div class="imgview" id="imgview">
									<img class="bannerview" src="' . VIEW_IMAGE . $thumb . '" alt="Images" />
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
					<input type="hidden" value="<?php echo $thumb; ?>" name="old_file" id="old_file" />
					<input type="hidden" value="<?php echo $thumb; ?>" name="file_name" id="file_name" />
					<br>
					<div class="empty-text"></div>
				</div>

			</div>

		</div>
		<div class="clear"></div>
	</div>
	<div class="relative">
		<input type="button" class="bag_submit" value="Simpan" onclick="save_register()" />
		<img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" />
		<div class="notif" id="mainlognotif"></div>
	</div>
	<div class="clear"></div>
</div>