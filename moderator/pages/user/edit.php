<?php
$id = secure_string($_GET["id"]);
$args = "SELECT * FROM worker WHERE id='$id' AND active=1";
$query = mysqli_query($dbconnect, $args);
if ($query && mysqli_num_rows($query)) {
  $hasil = mysqli_fetch_array($query);
} else {
  ob_start();
  $url = GLOBAL_URL . '/?page=user';
  while (ob_get_status()) {
    ob_end_clean();
  }
  header("Location: $url");
} ?>


<div class="maincontent">
  <h3>DATA USER <?php echo $hasil["name"]; ?></h3>

  <div class="halfleft">
    <table class="blanktable">
      <tr>
        <td>Nama <span class="must">*</span></td>
        <td><input style="width: 300px;" type="text" name="nama" id="nama" value="<?php echo $hasil["name"]; ?>" /></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><input style="width: 300px;" type="text" name="alamat" id="alamat" value="<?php echo $hasil["address"]; ?>" /></td>
      </tr>
      <tr>
        <td>Email <span class="must">*</span></td>
        <td><input style="width: 300px;" type="email" name="email" id="email" value="<?php echo $hasil["email"]; ?>" /></td>
      </tr>
      <tr>
        <td>Telepon <span class="must">*</span></td>
        <td><input style="width: 200px;" type="text" name="telepon" id="telepon" value="<?php echo $hasil["phone"]; ?>" placeholder="08123456789" /></td>
      </tr>
      <tr>
        <td>
          Password<br />
          <small>Biarkan kosong jika tidak ingin diganti</small>
        </td>
        <td><input type="password" name="pass_1" id="pass_1" style="width: 200px;" value="" /></td>
      </tr>
      <tr>
        <td>Jabatan<span class="must">*</span></td>
        <td>
          <select name="position" id="position">
            <option value="99" <?php auto_select($hasil["role"],"99"); ?>>SuperAdmin</option>
            <option value="98" <?php auto_select($hasil["role"],"98"); ?>>Admin Office</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          Ulangi Password<br />
          <small>Biarkan kosong jika tidak ingin diganti</small>
        </td>
        <td><input type="password" name="pass_2" id="pass_2" style="width: 200px;" value="" /></td>
      </tr>
    </table>
  </div>

  <div class="halfright">
    <table class="blanktable">
      <tr>
        <td>Tanggal Pembuatan Akun</td>
        <td><?php echo date("j F Y", $hasil["date"]); ?></td>
      </tr>
    </table>
  </div>
  <div class="clear"></div>
  <div class="submitarea relative">
    <input type="hidden" name="id" id="id" value="<?php echo $hasil["id"]; ?>" />
    <input type="button" value="&laquo; Kembali" onClick="window.history.back()" /> &nbsp;&nbsp;
    <input type="button" value="Simpan" onclick="save_user()" />
    <img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" />
    <img class="delicon absolute icon" src="themes/images/icon_delete.png" width="38" height="38" alt="hapus" title="Hapus" onclick="tanya_hapus_user()" />
    <div class="notif" id="mainlognotif"></div>
  </div>
  <div class="clear"></div>
</div>