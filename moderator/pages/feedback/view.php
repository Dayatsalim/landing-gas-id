<?php
$id = secure_string($_GET["id"]);
$args = "SELECT * FROM feedback WHERE id='$id'";
$query = mysqli_query($dbconnect, $args);
if ($query && mysqli_num_rows($query)) {
    $hasil = mysqli_fetch_array($query);
} else {
    ob_start();
    $url = GLOBAL_URL . '/?page=feedback';
    while (ob_get_status()) {
        ob_end_clean();
    }
    header("Location: $url");
} ?>


<div class="maincontent">
    <h3>FeedBack Pengunjung <?php echo $hasil["name"]; ?></h3>

    <div class="halfleft">
        <table class="blanktable">
            <tr>
                <td>Tanggal</td>
                <td><input style="width: 200px;" type="text" name="date" id="date" value="<?php echo date('d F Y', $hasil["date"]); ?>" /></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input style="width: 300px;" type="text" name="nama" id="nama" value="<?php echo $hasil["name"]; ?>" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input style="width: 300px;" type="email" name="email" id="email" value="<?php echo $hasil["email"]; ?>" /></td>
            </tr>
        </table>
    </div>

    <div class="halfright">
        <table class="blanktable">
            <tr>
                <td>Subjek</td>
                <td><input style="width: 200px;" type="text" name="subject" id="subject" value="<?php echo $hasil["label"]; ?>" /></td>
            </tr>
            <tr>
                <td>Diskripsi</td>
                <td><textarea name="descriptions" id="descriptions" cols="50" rows="10"><?php echo $hasil["desc_feedback"]; ?></textarea></td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>
    <div class="submitarea relative">
        <input type="button" value="&laquo; Kembali" onClick="window.history.back()" /> &nbsp;&nbsp;
    </div>
    <div class="clear"></div>
</div>