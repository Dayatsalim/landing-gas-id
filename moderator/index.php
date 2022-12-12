<?php require('engine/functions.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>GAS.ID admin system</title>
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,900" />
    <link rel="stylesheet" type="text/css" href="<?php echo GLOBAL_URL; ?>/themes/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo GLOBAL_URL; ?>/themes/jquery-ui.structure.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo GLOBAL_URL; ?>/themes/jquery-ui.theme.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo GLOBAL_URL; ?>/themes/style-20200320.css" />
    <link rel="stylesheet" type="text/css" src="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
    <script type="text/javascript" src="<?php echo GLOBAL_URL; ?>/script/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo GLOBAL_URL; ?>/script/jquery-ui.min.js"></script>
    <script type="text/javascript">var global_url = "<?php echo GLOBAL_URL; ?>";var global_var = "<?php echo GLOBAL_FORM; ?>";var current_date = "<?php echo date("j F Y"); ?>";var dateNow = "<?php echo date("j"); ?>";var monthNow = "<?php echo date("F"); ?>";var yearNow = "<?php echo date("Y"); ?>";</script>
    <?php if (is_login()) { ?>
        <script type="text/javascript" src="<?php echo GLOBAL_URL; ?>/script/simpleUpload.min.js"></script>
        <script type="text/javascript" src="<?php echo GLOBAL_URL; ?>/script/web-in-dev-now.js"></script>
    <?php } else { ?>
        <script type="text/javascript" src="<?php echo GLOBAL_URL; ?>/script/web.js"></script>
    <?php } ?>
</head>

<body>
    <?php
    if (is_login()) {
        $current_user_id = current_user_id();
        $current_user_role = current_user_role();
    ?>
        <header>
            <h1 class="logo">
                <a href="<?php echo GLOBAL_URL; ?>"><img src="<?php echo GLOBAL_URL; ?>/themes/images/ICON_GAS.png" width="150" alt="GAS" /></a>
            </h1>

            <div class="homeproperties">
                <div class="namauser">
                    <a href="?page=admin&section=edit&id=<?php echo $current_user_id; ?>"><?php echo data_tabel("worker", $current_user_id); ?></a>
                </div>
            </div>
            <div class="menubox">

                <div class="menutitle">POST</div>
                <a class="menulink transition <?php menu_aktif("home"); ?>" href="?page=home">Beranda</a>
                <a class="menulink transition <?php menu_aktif("about_us"); ?>" href="?page=about_us">Tentang Kami</a>
                <a class="menulink transition <?php menu_aktif("feature"); ?>" href="?page=feature">Fitur</a>
                <a class="menulink transition <?php menu_aktif("register"); ?>" href="?page=register">Daftar</a>
                <a class="menulink transition <?php menu_aktif("career"); ?>" href="?page=career">Karir</a>
                <a class="menulink transition <?php menu_aktif("terms"); ?>" href="?page=terms">Syarat Ketentuan</a>
                <a class="menulink transition <?php menu_aktif("privacy"); ?>" href="?page=privacy">Privasi</a>

                <div class="menutitle">Umpan Balik</div>
                <a class="menulink transition <?php menu_aktif("feedback"); ?>" href="?page=feedback">Umpan Balik Pengunjung</a>

                <div class="menutitle">PENGATURAN</div>
                <a class="menulink transition <?php menu_aktif("option"); ?>" href="?page=option">Pengaturan Umum</a>
                <a class="hidden menulink transition <?php menu_aktif("admin"); ?>" href="?page=admin">Administrator</a>

                <div class="menutitle">ACCOUNT USER</div>
                <a class="menulink transition <?php menu_aktif("user"); ?>" href="?page=user">USER</a>
                <div style="height: 16px;"></div>
                <a class="menulink transition" href="?logout=true">Sign Out</a>
            </div>

        </header>
    <?php } ?>
    <?php if (is_login()) { ?>
        <div class="bodywrap">
            <article>
                <div class="form-menus">
                    <?php
                    if (isset($_GET["page"])) {
                        $page = secure_string($_GET["page"]);
                        include("pages/" . $page . "/main.php");
                    } else {
                        include("pages/home/main.php");
                    } ?>
                </div>
            </article>
        </div>
    <?php } else { ?>
        <div class="loginbox aligncenter">
            <h2 class="logintitle">ADMIN LOGIN</h2>
            <div class="loginform">
                <form method="post" action="" onsubmit="return do_userlogin(event)" />
                <div class="formrow">
                    <span class="label">Username</span>
                    <input type="text" name="userphone" id="userphone" placeholder="08123456789" class="aligncenter" style="width: 200px" /><br />
                </div>
                <div class="formrow aligncenter">
                    <span class="label">Password</span>
                    <input type="password" name="userpass" id="userpass" placeholder="" class="aligncenter" style="width: 200px" />
                </div>
                <div class="formrow aligncenter relative">
                    <input type="submit" value="Submit" />
                    <img class="absolute none" id="loginloader" src="themes/images/loader.gif" width="35" height="35" alt="loader" />
                </div>
                </form>
                <div class="notif" id="mainlognotif"></div>
            </div>
        </div>
    <?php } ?>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</body>

</html>