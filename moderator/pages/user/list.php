<?php
if (isset($_GET["search"])) {
	$search = secure_string($_GET["search"]);
	$args = "SELECT * FROM worker
		WHERE ( nama LIKE '%$search%' OR alamat LIKE '%$search%' OR telepon LIKE '%$search%' OR email LIKE '%$search%' OR note LIKE '%$search%'
		OR kode LIKE '%$search%' OR id LIKE '%$search%' )
		AND status=1 ORDER BY nama ASC";
} else {
	if (isset($_GET['pagenum'])) {
		$pagelink = '&pagenum=' . $_GET['pagenum'];
		$page = $_GET['pagenum'];
	} else {
		$pagenum = '';
		$page = "1";
	}
	$value = "100"; //Berapa item yang ditampilkan per halaman?
	$hitung = $page - 1;
	$hal = $hitung * $value;
	$limit = " LIMIT " . $hal . "," . $value;
	$args = "SELECT * FROM worker WHERE active=1 ORDER BY date DESC $limit";
}
$result = mysqli_query($dbconnect, $args); ?>

<div class="toolbox">
	<input type="button" value="+ User Baru" onClick="location.href='?page=user&section=new';" />
	<div class="floatright alignright" style="width:40%">
		<form method="get" name="pencarian" action="">
			<?php if (isset($_GET["search"])) { ?>
				<a href="?page=user">[Reset]</a> &nbsp;&nbsp;&nbsp;&nbsp;
			<?php } ?>
			<input type="hidden" name="page" value="user" />
			<input type="search" name="search" value="<?php if (isset($_GET["search"])) {
															echo $_GET["search"];
														} ?>" placeholder="Pencarian" />
		</form>
	</div>
	<div class="clear"></div>
</div>
<div class="maincontent">
	<table class="stdtable" width="100%">
		<tr>
			<th scope="col">Tgl Daftar</th>
			<th scope="col">Nama</th>
			<th scope="col">Kontak</th>
			<th scope="col">ID</th>
			<th scope="col">&nbsp;</th>
		</tr>
		<?php if ($result && mysqli_num_rows($result)) {
			while ($hasil = mysqli_fetch_array($result)) { ?>
				<tr>
					<td class="aligncenter"><?php echo date("j F Y", $hasil["date"]); ?></td>
					<td><?php echo $hasil["name"]; ?></td>
					<td class="aligncenter">
						<?php echo $hasil["phone"]; ?><br />
						<?php echo $hasil["email"]; ?>
					</td>
					<td class="aligncenter"><?php echo $hasil["id"]; ?></td>
					<td class="aligncenter">
						<a href="?page=user&section=edit&id=<?php echo $hasil["id"]; ?>" title="Edit">
							<img class="icon" src="themes/images/edit.png" width="16" height="16" alt="edit" />
						</a>
					</td>
				</tr>
			<?php }
		} else { ?>
			<tr>
				<td colspan="7" class="aligncenter">Tidak Ditemukan</td>
			</tr>
		<?php } ?>
	</table>
</div>


<!-- START PAGINATION -->
<?php if (!isset($_GET["search"])) {

	$arg = "SELECT id FROM worker WHERE active=1";
	$cari = mysqli_query($dbconnect, $arg);
	if (mysqli_num_rows($cari)) {
		$jumlah = mysqli_num_rows($cari);
		$hitung_jml_hal = $jumlah / $value;
		if ($jumlah <= $value) {
			$jml_hal = $hitung_jml_hal;
		} else {
			$jml_hal = $hitung_jml_hal + 1;
		}
		if ($jml_hal > 1) { ?>
			<div class="pagination">
				<div class="number">
					<?php // awal
					echo '<a class="pagenum" title="Halaman pertama" href="?page=user&pagenum=1">Awal</a>';
					//Previous Page
					$prev_page = $page - 1;
					if ($prev_page >= 1) {
						echo '<a class="pagenum" title="Halaman sebelumnya" ';
						echo 'href="?page=user&pagenum=' . $prev_page . '">&laquo;</a>';
					}
					//Nomor Halaman
					for ($a = 1; $a <= $jml_hal; $a++) {
						if ($a == $page) {
							echo '<span class="pagenum currentpage">' . $a . '</span>';
						} else {
							echo '<a class="pagenum" href="?page=user&pagenum=' . $a . '">' . $a . '</a>';
						}
					}
					//Next Page
					$next_page = $page + 1;
					if ($next_page <= $jml_hal) {
						echo '<a class="pagenum" title="Halaman selanjutnya" ';
						echo 'href="?page=user&pagenum=' . $next_page . '">&raquo;</a>';
					}
					// akhir
					$terakhir = $a - 1;
					echo '<a class="pagenum" title="Halaman terakhir" ';
					echo 'href="?page=user&pagenum=' . $terakhir . '">Akhir</a>'; ?>
				</div>
				<div class="showing">
					<?php //START CALCULATION
					//Calculation $start
					if ($page == 1) {
						$start = "1";
					} else {
						$itungpres = $page - 1;
						$itungs = $itungpres * $value;
						$start = $itungs + 1;
					}
					//Calculation $end
					if ($jumlah <= $value || $next_page >= $jml_hal) {
						$end = $jumlah;
					} else $end = $page * $value;
					//Calculation $jmltampil
					$jmltampil = $end - $start + 1; ?>
					Menampilkan Halaman <?php echo $page; ?> yang berisi <?php echo $jmltampil; ?> item (<?php echo $start; ?>-<?php echo $end; ?>)
					dari total <?php echo $jumlah; ?> item
				</div>
			</div>
<?php } // end if ( $jml_hal > 1 )
	} // end if ( mysqli_num_rows($cariuser) )

} // end if not search 
?>
<!-- END PAGINATION -->