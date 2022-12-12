$(document).ready(function(){
    var ww = $(window).width();
       $('.carousel').carousel();
        autoplay();
        function autoplay() {$('.carousel').carousel('next');setTimeout(autoplay, 4500);}

        $('.single-item').slick({slidesToShow: 1,arrows: true,dots: true,slidesToShow: 1,slidesToScroll: 1,autoplay: true,autoplaySpeed: 2000,});
        
        $(function() {$('a[href*="#"]:not([href="#"])').on('click', function () {if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {var target = $(this.hash);target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');if (target.length) {$('html, body').animate({scrollTop: (target.offset().top -60)}, 800);return false;}}});});
          
        //Toggle
        $("#navbar_burger").click(function(){$("#navbar_collapse").toggle(300);});

         //Get the button
        var mybutton = document.getElementById("arrow");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {mybutton.style.display = "block";} else {mybutton.style.display = "none";}}

        document.getElementById('arrow').onclick= function scrolltop(){window.scrollTo({top: 0, behavior: "smooth"});}
});