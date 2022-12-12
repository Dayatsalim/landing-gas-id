<?php
include('./component/header.php');
include('./component/menu.php');
$home = mysqli_query($dbconnect, "SELECT label_post,post,image_post FROM page_home");
if ($home && !empty(mysqli_num_rows($home))) {
    $home_assoc = mysqli_fetch_assoc($home);
?>
    <section id="page_content" class="page_content">
        <div class="content page_bg fix_bgpage">
            <div class="header_content">
                <div class="main_content">
                    <div class="container">
                        <div class="row_item align_item">
                            <div class="con_lenght title_header_content" data-aos="fade-right" data-aos-duration="1800">
                                <h1 class="wrap_title title_header font-xxl"><?php echo $home_assoc['label_post']; ?></h1>
                                <p class="font-m"><?php echo $home_assoc['post']; ?></p>
                                <div class="button button_register txtleft" onclick="button_open()">
                                    <p>Unduh Sekarang</p>
                                </div>
                            </div>
                            <div class="con_lenght image_header_content" data-aos="fade-left" data-aos-duration="1800">
                                <img src="<?php echo PATH_IMAGE . $home_assoc['image_post']; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<main id="more_content" class="more_content">
    <?php
    $text_about = data_tabel("SELECT content,subcontent FROM desc_page WHERE label_page='aboutus'");
    $about = mysqli_query($dbconnect, "SELECT title,image,desclist FROM page_aboutus");
    if ($about && !empty(mysqli_num_rows($about))) {

    ?>
        <section id="page__content" class="page__content">
            <div class="content info_content">
                <div class="header_content">
                    <div class="container">
                        <div class="row_item align_item">
                            <div class="con_lenght info_title_content" data-aos="fade-right" data-aos-duration="1500">
                                <h4 class="font-l cl_white left_contenttext"><?php echo $text_about['content']; ?></h4>
                            </div><!-- end con_lenght -->
                            <div class="con_lenght info_imageslide_content">
                                <div class="slideImg carousel">
                                    <?php
                                    //foreach($about_assoc = mysqli_fetch_assoc($about))
                                    while ($about_assoc = mysqli_fetch_assoc($about)) {
                                    ?>
                                        <div class="imageslide carousel-item">
                                            <div class="inblk">
                                                <div class="titleslide_content">
                                                    <h5><?php echo $about_assoc['title']; ?></h5>
                                                </div>
                                                <div class="imgslide_content">
                                                    <img src="<?php echo PATH_IMAGE . $about_assoc['image']; ?>" />
                                                </div>
                                                <div class="descslide_content list_desc_job">
                                                    <ul class="dod_job">
                                                        <?php $exp_desclist = explode(',', $about_assoc['desclist']);
                                                        $count_about = count($exp_desclist) - 1;
                                                        $a = 0;
                                                        while ($a <= $count_about) {
                                                            echo '<li>' . $exp_desclist[$a] . '</li>';
                                                            $a++;
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- end carousel-item-->
                                    <?php } ?>
                                </div><!-- end carousel -->
                            </div><!-- end con_lenght -->
                        </div><!-- end row_item -->
                    </div><!-- end container -->
                </div><!-- end header container -->
            </div><!-- end content info_content-->
        </section>
    <?php } ?>
    <?php
    $text_feature = data_tabel("SELECT content,subcontent FROM desc_page WHERE label_page='feature'");
    $feature = mysqli_query($dbconnect, "SELECT title,image FROM page_feature");
    if ($feature && !empty(mysqli_num_rows($feature))) {
    ?>
        <section id="page___content" class="page___content">
            <div class="content feature_content page___bg">
                <div class="header_content">
                    <div class="container">
                        <div class="row_item align_item">
                            <div class="con_lenght left_feature_content" data-aos="fade-right" data-aos-duration="1500">
                                <h4 class="font-l cl_blue left_contenttext fweight6"><?php echo $text_feature['content']; ?></h4>
                                <div class="circleslide"></div>
                            </div><!-- left_feature_content -->
                            <div class="con_lenght right_lenghtfeature">
                                <div class="slide_feature">
                                    <div class="single-item carousel-slider">
                                        <?php
                                        while ($feature_assoc =  mysqli_fetch_assoc($feature)) {
                                        ?>
                                            <div class="slideimg_feature">
                                                <img src="<?php echo PATH_IMAGE . $feature_assoc['image']; ?>" />
                                            </div><!-- end slideimg_feature -->
                                        <?php } ?>
                                    </div><!-- end carousel-slider -->
                                </div><!-- end slide_feature -->
                            </div><!-- end right_lenghtfeature -->
                        </div><!-- end row_item align_item -->
                    </div><!-- end container -->
                </div><!-- end header_content -->
            </div><!-- end feature_content -->
        </section>
    <?php } ?>
    <?php
    $register = mysqli_query($dbconnect, "SELECT title,frameyoutube FROM page_register");
    if ($register && !empty(mysqli_num_rows($register))) {
        $register_assoc = mysqli_fetch_assoc($register);
    ?>
        <section id="page____content" class="page____content">
            <div class="content register_contente page___bg">
                <div class="header_content">
                    <div class="container">
                        <div class="row_item align_item">
                            <div class="content_text_register fweight6 font-l txtcenter" data-aos="fade-left" data-aos-duration="1500">
                                <p><?php echo $register_assoc['title']; ?></p>
                            </div>
                            <div class="middle_content_register">
                                <div class="video_register video-container" data-aos="fade-right" data-aos-duration="1500">
                                    <iframe width="560" height="315" src="<?php echo $register_assoc['frameyoutube']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <?php /* ,media,thumb
                                    <video controls class="video" id="video" preload="metadata" poster="<?php echo PATH_IMAGE . $register_assoc['thumb']; ?>">
                                        <source src="<?php echo PATH_VIDEO . $register_assoc['media']; ?>" type="video/mp4">
                                        </source>
                                    </video> */?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php
    $text_career = data_tabel("SELECT content,subcontent FROM desc_page WHERE label_page='career'");
    $career = mysqli_query($dbconnect, "SELECT title,descoftitle,media,ruledesc FROM page_career");
    if ($career && !empty(mysqli_num_rows($career))) {
    ?>
        <section id="page_____content" class="page_____content">
            <div class="content jobs_content page_____bg">
                <div class="header_content">
                    <div class="container">
                        <div class="row_item align_item">
                            <div class="content_jobs_container">
                                <div class="hastitle_jobs">
                                    <div class="title_jobs">
                                        <h4 class="font-l"><strong><?php echo $text_career['content']; ?></strong></h4>
                                    </div>
                                    <div class="short_title_jobs">
                                        <h5 class="font-abs"><?php echo $text_career['subcontent']; ?></h5>
                                    </div>
                                </div>
                                <div class="jobs_container_poster">
                                    <?php
                                    while ($career_assoc = mysqli_fetch_assoc($career)) {
                                        $descjob_replace = str_replace(' ', '_', $career_assoc['title']);
                                    ?>
                                        <div class="box_jobs">
                                            <div class="image_jobs">
                                                <img src="<?php echo PATH_IMAGE . $career_assoc['media']; ?>" />
                                            </div>
                                            <div class="box_desc_job">
                                                <div class="title_job">
                                                    <h4 class="font-m"><?php echo $career_assoc['title']; ?></h4>
                                                </div>
                                                <div class="desc_job">
                                                    <p><?php echo $career_assoc['descoftitle']; ?></p>
                                                </div>
                                                <div class="button_job font-lite" onclick="open_descjob('<?php echo $descjob_replace; ?>')">
                                                    <p>Baca Selengkapnya</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="onmodal modal_popup modal_cts" id="descmodal_<?php echo $descjob_replace; ?>">
                                            <div class="wrap_content_popup" id="jobrequired_<?php echo $descjob_replace; ?>">
                                                <div class="jobrequired headline_contentpopup">
                                                    <span class="close req" id="closejob" onClick="close_descjob('<?php echo $descjob_replace; ?>');">&times;</span>
                                                    <div class="clear"></div>
                                                    <h3>Kualifikasi</h3>
                                                    <div class="wrap_popupjob">
                                                        <div class="image_headlinepopup">
                                                            <img src="<?php echo PATH_IMAGE . $career_assoc['media']; ?>" />
                                                        </div>
                                                        <div class="title_headlinepopup">
                                                            <h4><?php echo $career_assoc['title']; ?></h4>
                                                        </div>
                                                    </div>

                                                    <div class="list_desc_job">
                                                        <ul class="dod_job">
                                                            <?php
                                                            $exp = explode('|#|', $career_assoc['ruledesc']);
                                                            $count = count($exp) - 1;
                                                            $a = 0;
                                                            ?>
                                                            <?php while ($a <= $count) {
                                                                echo '<li>' . $exp[$a] . '</li>';
                                                                $a++;
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>
<?php include('./component/footer.php'); ?>