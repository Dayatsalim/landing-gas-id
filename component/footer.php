<footer id="footer" class="foooter">
    <div class="footer_container">
        <div class="container">
            <div class="row_item">
                <div class="wrap_footer">
                    <div class="boxbottom posleft">
                        <div class="content_first image_contentfooterleft">
                            <img src="<?php echo PATH_IMAGE . get_option('file_name'); ?>" />
                        </div>
                    </div>
                    <div class="boxbottom posleft">
                        <div class="content_first title_content_footer">
                            <h5 class="font-abs">Tentang GAS</h5>
                        </div>
                        <div class="bodycontent">
                            <div id="bottom_menu" class="bottom_menu">
                                <ul id="menu-menu-bottom" class="menu">
                                    <li id="menu-item-172" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-172"><a href="<?php echo GLOBAL_URL; ?>terms">Terms and Conditions</a></li>
                                    <li id="menu-item-168" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-168"><a href="<?php echo GLOBAL_URL; ?>privacy">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="boxbottom posleft">
                        <div class="content_first title_content_footer">
                            <h5 class="font-abs">Hubungi Kami</h5>
                        </div>
                        <div class="bodycontent">
                            <ul>
                                <li>
                                    <p class="font-lite pointer" id="feed" onClick="open_contactus();">Kritik dan Saran</p>
                                </li>
                            </ul>
                        </div>
                        <div class="onmodal modal_popupp modal_cts" id="contactus">
                            <div class="wrap_form_feedback" id="wrap_form_feedback">
                                <div class="open_pop">
                                    <span class="close req" id="close_pop" onclick="close_pop()">×</span>
                                    <div class="form_feedback">
                                        <h3>Beri Masukkan Untuk Kami</h3>
                                        <div class="list_form_group">
                                            <div class="form__group">
                                                <input type="input" class="form__field" placeholder="Nama Anda" name="namefeedback" id='namefeedback' required />
                                                <label for="name" class="form__label">Nama</label>
                                            </div>
                                            <div class="form__group">
                                                <input type="email" class="form__field" placeholder="Email Anda" name="emailfeedback" id='emailfeedback' required />
                                                <label for="name" class="form__label">Email</label>
                                            </div>
                                            <div class="form__group">
                                                <input type="email" class="form__field" placeholder="Subjek ku..." name="subjectfeedback" id='subjectfeedback' required />
                                                <label for="name" class="form__label">Subjek</label>
                                            </div>
                                            <div class="form__group">
                                                <textarea name="opinionfeedback" class="textarea" id="opinionfeedback" cols="52" rows="10"></textarea>
                                            </div>
                                            <div class="relative rangenof txtright">
                                                <input type="button" class="bag_submit buttonmsubmit" value="Simpan" onclick="save_feedback()" />
                                                <img class="absolute none" id="adminloader" src="assets/loader.gif" width="35" height="35" alt="loader" />
                                                <div class="notif rangenof txtcenter" id="mainlognotif"></div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="boxbottom posleft follow">
                        <div class="content_first title_content_footer">
                            <h5 class="font-abs">Ikuti Kami</h5>
                        </div>
                        <div class="bodycontent sosmedimg_footer">
                            <ul>
                                <li class="pointer"><a href="<?php echo get_option('pusat_fb'); ?>" target="_blank"><img src="<?php echo PATH_ASSETS; ?>icon_fcb.png" /></a></li>
                                <li class="pointer"><a href="<?php echo get_option('pusat_instagram'); ?>" target="_blank"><img src="<?php echo PATH_ASSETS; ?>icon_ing.png" /></a></li>
                                <li class="pointer"><a href="<?php echo get_option('pusat_youtube'); ?>" target="_blank"><img src="<?php echo PATH_ASSETS; ?>youtube-symbol.png" /></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="boxbottom posleft">
                        <div class="content_first title_content_footer">
                            <h5 class="font-abs">Unduh</h5>
                        </div>
                        <div class="bodycontent appsimg_footer">
                            <ul>
                                <li class="pointer"><a href="<?php echo get_option('pusat_googleplay'); ?>" target="_blank"><img src="<?php echo PATH_ASSETS; ?>play_store.png" /></a></li>
                                <li class="pointer"><img src="<?php echo PATH_ASSETS; ?>app_store.png" /></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v8.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/id_ID/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="110666407506823" theme_color="#7646ff" logged_in_greeting="Halo, Ada yang Bisa dibantu" logged_out_greeting="Halo, Ada yang Bisa dibantu">
    </div>
</footer>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo GLOBAL_URL; ?>js/slick/slick/slick.js"></script>
<script type="text/javascript" src="<?php echo GLOBAL_URL; ?>js/main-feature.js"></script>
<script type="text/javascript" src="<?php echo GLOBAL_URL; ?>js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo GLOBAL_URL; ?>js/classie.js"></script>
<script type="text/javascript" src="<?php echo GLOBAL_URL; ?>js/sidebarEffects.js"></script>
<script type="text/javascript" src="<?php echo GLOBAL_URL; ?>js/slick/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo GLOBAL_URL; ?>js/feedback.js"></script>
<script>
    function open_descjob(value) {
        $('#descmodal_' + value).fadeIn();
        $('#jobrequired_' + value).fadeIn();
    }

    function close_descjob(value) {
        $('#descmodal_' + value).fadeOut();
        $('#jobrequired_' + value).fadeOut();
    }

    function open_contactus() {
        $('#contactus, #wrap_form_feedback').fadeIn();
    }
    var span = document.getElementById("close_pop");
    span.onclick = function() {
        $('#contactus, #wrap_form_feedback').fadeOut();
    }
    // if ($('body').hasClass('page-template')) { $('#navbar_collapse,#navbar_burger').hide(); $('.titleback').show();}
</script>
<script>
    var OSName = '<?php echo get_option('pusat_googleplay'); ?>';
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;

    function button_open() {
        if (/android/i.test(userAgent)) {
            OSName = '<?php echo get_option('pusat_googleplay'); ?>';
        }

        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            OSName = '<?php echo get_option('pusat_applestore'); ?>';
        }
        window.open(OSName);
    }
</script>
<script>
    AOS.init();
</script>
</body>

</html>