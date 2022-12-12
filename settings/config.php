<?php 

// Local
define('DB_NAME', 'gas_front');
define('DB_USER', 'root'); 
define('DB_PASS', '');
define('GLOBAL_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http").'://localhost/gas_id/');
define('GLOBAL_FORM', md5('Z]t336hR|urp'.date('yj').'Wswew4l[6h'.date('zn').'KC@r+w&+xF').md5('Tp%*{bm4]6w3fr3lw*'.date('zj').'zR4why2^~'));
define('PATH_IMAGE',GLOBAL_URL."files/images/");
define('PATH_VIDEO',GLOBAL_URL."files/videos/");
define('PATH_ASSETS',GLOBAL_URL."assets/");
/** <?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?> */