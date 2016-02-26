<header id="header-main">
    <section class="center">
        <div class="topbar"></div>
        <div class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Event Manager Blog" /></a></div>
        <div class="searchbx">
            <?php get_search_form(); ?> 
        </div>
    </section>
</header>
<div class="footer-container">2007-<?php echo date('Y'); ?> Social Coup Ltd | EventManagerBlog.com is a trading name of Social Coup Ltd</div>



<!-- Start Scripts -->	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/landing-page-new/vendor/jquery-1.8.3.min.js"><\/script>')</script>
<script src="<?php bloginfo('template_url'); ?>/js/landing-page-new/jquery.widowFix-1.3.2.min.js"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/landing-page-new/jquery.smooth-scroll.js"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/landing-page-new/mosaic.1.0.1.min.js"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/landing-page-new/jquery.fancybox.js"></script> 

<script src="<?php bloginfo('template_url'); ?>/js/landing-page-new/main.js"></script> 



<!-- Start Google Analytics -->
<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/js/ouibounce.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_url'); ?>/css/modal.css" />

<div id="ouibounce-modal" style="display:none;">
    <div class="underlay"></div>
    <div class="modal">
        <div class="modal-close">x</div>
        <div class="modal-body">
            <a href="http://eventappbible.com/?utm_source=popupEventmb&utm_medium=popupEventmb&utm_campaign=popupEventmb" title="Event App Bible">
                <img src="http://www.eventmanagerblog.com/uploads/2015/03/event-app-bible.jpg" alt="Event App Bible" />
            </a>
        </div>
    </div>
</div>

<script type="text/javascript">
var _ouibounce = ouibounce(jQuery('#ouibounce-modal')[0]);

jQuery(function(){
    if(parseCookies()['viewedOuibounceModal'] !== 'true'){
            _ouibounce.fire();
            _ouibounce.disable({ cookieExpire: 1, sitewide: true })
        }
    
    jQuery('body, #ouibounce-modal .modal .modal-close').on('click', function() {
        jQuery('#ouibounce-modal').hide();
    });

    jQuery('#ouibounce-modal .modal').on('click', function(e) {
        e.stopPropagation();
    });
    
    function parseCookies() {
        var cookies = document.cookie.split('; ');
        var ret = {};
        for (var i = cookies.length - 1; i >= 0; i--) {
          var el = cookies[i].split('=');
          ret[el[0]] = el[1];
        }
        return ret;
    }
});
</script>

</body>
</html>