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
<script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/landing-page/vendor/jquery-1.8.3.min.js"><\/script>')</script>
<script src="<?php bloginfo('template_url'); ?>/js/landing-page/jquery.widowFix-1.3.2.min.js"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/landing-page/jquery.smooth-scroll.js"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/landing-page/mosaic.1.0.1.min.js"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/landing-page/jquery.fancybox.js"></script> 

<script src="<?php bloginfo('template_url'); ?>/js/landing-page/main.js"></script> 



<!-- Start Google Analytics -->
<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>