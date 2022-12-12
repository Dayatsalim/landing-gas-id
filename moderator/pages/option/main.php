<h2>PENGATURAN UMUM</h2>
<div class="maincontent">
	<div class="halfleft">
		<table class="blanktable">
			<tr>
				<td colspan="2">
					<div class="form__group">
						<input value="<?php echo get_option("pusat_telepon"); ?>" type="input" class="form__field" placeholder="Telepon" name="pusat_telepon" id='pusat_telepon' required />
						<label for="name" class="form__label">Telepon</label>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="form__group">
						<textarea name="pusat_alamat" id="pusat_alamat" cols="50" rows="10"><?php echo get_option("pusat_alamat"); ?></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="form__group">
						<input value="<?php echo get_option("pusat_email"); ?>" type="input" class="form__field" placeholder="name@example.net" name="pusat_email" id='pusat_email' required />
						<label for="name" class="form__label">Email</label>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="form__group">
						<input value="<?php echo get_option("pusat_fb"); ?>" type="input" class="form__field" placeholder="link facebook" name="pusat_fb" id='pusat_fb' required />
						<label for="name" class="form__label">Link facebook</label>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="form__group">
						<input value="<?php echo get_option("pusat_instagram"); ?>" type="input" class="form__field" placeholder="link instagram" name="pusat_instagram" id='pusat_instagram' required />
						<label for="name" class="form__label">Link instagram</label>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="form__group">
						<input value="<?php echo get_option("pusat_youtube"); ?>" type="input" class="form__field" placeholder="link youtube" name="pusat_youtube" id='pusat_youtube' required />
						<label for="name" class="form__label">Link youtube</label>
					</div>
				</td>
			</tr>

		</table>
	</div>

	<div class="halfright">
		<table class="blanktable">
			<tr>
				<td colspan="2">
					<?php
					$image_post = get_option("file_name");
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
					} ?>
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
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="form__group">
						<input value="<?php echo get_option("pusat_fbchat"); ?>" type="input" class="form__field" placeholder="Link facebook chat" name="pusat_fbchat" id='pusat_fbchat' required />
						<label for="name" class="form__label">Link facebook chat</label>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="form__group">
						<input value="<?php echo get_option("pusat_googleplay"); ?>" type="input" class="form__field" placeholder="Link Play Store" name="pusat_googleplay" id='pusat_googleplay' required />
						<label for="name" class="form__label">Link Play Store</label>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="form__group">
						<input value="<?php echo get_option("pusat_applestore"); ?>" type="input" class="form__field" placeholder="Link Apple Store" name="pusat_applestore" id='pusat_applestore' required />
						<label for="name" class="form__label">Link Apple Store</label>
					</div>
				</td>
			</tr>
		</table>
	</div>

	<div class="clear"></div>
	<div class="submitarea halfleft relative">
		<input type="button" value="Simpan" onclick="save_option()" />
		<img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" />
		<div class="notif" id="mainlognotif"></div>
	</div>
	<div class="clear"></div>
</div>