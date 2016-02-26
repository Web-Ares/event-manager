<!-- site__footer -->
<footer class="site__footer">
    <!-- site__footer-layout -->
    <div class="site__footer-layout">
        <!-- site__footer-menu -->
        <nav class="site__footer-menu">
            <a href="<?php echo home_url('about-me'); ?>">About</a>
            <a href="<?php echo home_url('advertise-event-blog'); ?>">Advertise</a>
            <a href="<?php echo home_url('faq'); ?>">FAQ</a>
            <a href="<?php echo home_url('copyright'); ?>">Copyright</a>
            <a href="<?php echo home_url('submit-guest-post'); ?>">Guest Post Submission</a>
            <a href="<?php echo home_url('event-startup-submission'); ?>">Event Startup Submission</a>
            <a href="<?php echo home_url('privacy-policy'); ?>">Privacy</a>
            <a href="<?php echo home_url('contact'); ?>">Contact</a>
        </nav>
        <!-- /site__footer-menu -->
        <!-- social -->
        <div class="social">
            <a href="https://www.facebook.com/EventManagerBlog" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="http://twitter.com/eventmb" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.linkedin.com/company/event-manager-blog" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="https://plus.google.com/108362505341608029663/?prsrc=3" target="_blank"><i class="fa fa-google-plus"></i></a>
            <a href="https://www.pinterest.com/emblog" target="_blank"><i class="fa fa-pinterest"></i></a>
            <a href="https://www.periscope.tv/Eventmb" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/periscope_icon.png" alt="Periscope" height="18" /></a>
        </div>
        <!-- /social -->
        <!-- copyright -->
        <div class="copyright">
            <span>2007-<?php echo date('Y'); ?> Social Coup Ltd |</span>
            <span>EventManagerBlog.com is a trading name of</span>
            <span>Social Coup Ltd</span>
        </div>
        <!-- /copyright -->
    </div>
    <!-- /site__footer-layout -->
</footer>
<!-- /site__footer -->
</div>
<!-- /site -->

<?php wp_footer(); ?>
<?php
if (is_single()) {
    do_action('wordpress_social_login');
}
?>

<script type="text/javascript">
    window.onload = function () {
        // Delay to allow the async Google Ads to load
        setTimeout(function () {
            // Get the first AdSense ad unit on the page
            var ad = document.querySelector("[id*=google_ads_iframe]");
            // If the ads are not loaded, track the event
            if (!ad || ad.innerHTML.replace(/\s/g, "").length === 0) {
                if (typeof ga !== 'undefined') {
                    // Log an event in Universal Analytics
                    // but without affecting overall bounce rate
                    ga('send', 'event', 'Adblock', 'Yes', {'nonInteraction': 1});
                } else if (typeof _gaq !== 'undefined') {
                    // Log a non-interactive event in old Google Analytics
                    _gaq.push(['_trackEvent', 'Adblock', 'Yes', undefined, undefined, true]);
                }
            }
        }, 2000); // Run ad block detection 2 seconds after page load
    };
</script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/ouibounce.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/modal.css" />

<div id="ouibounce-modal" style="display:none;">
    <div class="underlay"></div>
    <div class="modal">
        <div class="modal-close">x</div>
        <div class="modal-body">
            <a href="http://eventmb.com/TheVenueoftheFuture" title="The Venue of the Future">
                <img src="http://www.eventmanagerblog.com/wp-content/uploads/2016/02/1-PopUp-Banner_VENUE-REPORT.png" alt="The Venue of the Future" />
            </a>
        </div>
    </div>
</div>

<script type="text/javascript">
    var _ouibounce = ouibounce(jQuery('#ouibounce-modal')[0]);

    jQuery(function () {
        fireItem = jQuery('.resources__wrapper');

        if (fireItem.length && fireItem.size() > 0 && fireItem.offset()) {
            fireItemTop = fireItem.offset().top;
            jQuery(document).scroll(function () {
                if (fireItemTop <= jQuery(document).scrollTop()) {
                    if (parseCookies()['viewedOuibounceModal'] !== 'true') {
                        //if(pageViewed === false){
                        _ouibounce.fire();
                        _ouibounce.disable({cookieExpire: 2, sitewide: true})
                        //pageViewed = true;
                        //}
                    }
                }
            });
        }

        jQuery('body, #ouibounce-modal .modal .modal-close').on('click', function () {
            jQuery('#ouibounce-modal').hide();
        });

        jQuery('#ouibounce-modal .modal').on('click', function (e) {
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