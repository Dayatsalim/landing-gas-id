<div class="maincontent">
  <h3>Buat USER Baru</h3>

  <div class="halfleft">
    <table class="blanktable">
      <tr>
        <td>Nama <span class="must">*</span></td>
        <td><input style="width: 300px;" type="text" name="nama" id="nama" /></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><input style="width: 300px;" type="text" name="alamat" id="alamat" /></td>
      </tr>
      <tr>
        <td>Email <span class="must">*</span></td>
        <td><input style="width: 300px;" type="email" name="email" id="email" /></td>
      </tr>
      <tr>
        <td>Telepon <span class="must">*</span></td>
        <td><input style="width: 200px;" type="text" name="telepon" id="telepon" placeholder="08123456789" /></td>
      </tr>
    </table>
  </div>

  <div class="halfright">
    <table class="blanktable">
      <tr>
        <td>Password <span class="must">*</span></td>
        <td><input type="password" name="pass_1" id="pass_1" style="width: 200px;" /></td>
      </tr>
      <tr>
        <td>Ulangi Password <span class="must">*</span></td>
        <td><input type="password" name="pass_2" id="pass_2" style="width: 200px;" /></td>
      </tr>
      <tr>
        <td>Jabatan<span class="must">*</span></td>
        <td>
          <select name="position" id="position">
            <option value="99">SuperAdmin</option>
            <option value="98">Admin Office</option>
          </select>
        </td>
      </tr>
    </table>
  </div>
  <div class="clear"></div>
  <div class="submitarea halfleft relative">
    <input type="hidden" name="id" id="id" value="0" />
    <input type="button" value="&laquo; Kembali" onClick="location.href='?page=user'" /> &nbsp;&nbsp;
    <input type="button" value="Simpan" onclick="save_user()" />
    <img class="absolute none" id="adminloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" />
    <div class="notif" id="mainlognotif"></div>
  </div>
  <div class="clear"></div>
</div>