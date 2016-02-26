<?php
global $category_icons, $category_colors, $category_channels;

$ads_option       = get_option('emb_ads_tags', array());
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <title>
            <?php
            global $page, $paged;
            wp_title('-', true, 'after');
            echo ' - ' . get_bloginfo('name');
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() )) {
                echo " | $site_description";
            }
            if ($paged >= 2 || $page >= 2) {
                echo ' | ' . sprintf(__('Page %s', 'twentyten'), max($paged, $page));
            }
            ?>
        </title>
        <script type="text/javascript">
            var ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
            var pwidget_config = {
                defaults: {
                    services: {
                        twitter: {
                            via: 'EventMB'
                        }
                    }
                }
            };
        </script>
        <?php wp_head(); ?>
        <script type='text/javascript'>
            var googletag = googletag || {};
            googletag.cmd = googletag.cmd || [];
            (function () {
                var gads = document.createElement('script');
                gads.async = true;
                gads.type = 'text/javascript';
                var useSSL = 'https:' == document.location.protocol;
                gads.src = (useSSL ? 'https:' : 'http:') +
                        '//www.googletagservices.com/tag/js/gpt.js';
                var node = document.getElementsByTagName('script')[0];
                node.parentNode.insertBefore(gads, node);
            })();
        </script>
        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window,
                    document, 'script', '//connect.facebook.net/en_US/fbevents.js');

            fbq('init', '1071467419564548');
            fbq('track', "PageView");</script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1071467419564548&ev=PageView&noscript=1"
                   /></noscript>
    <!-- End Facebook Pixel Code -->
    <?php echo $ads_option['tags'] ? $ads_option['tags'] : ''; ?>
    <script type="text/javascript">
        (function () {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = ('https:' == document.location.protocol ? 'https://s' : 'http://i')
                    + '.po.st/static/v4/post-widget.js#publisherKey=dkfihiupauaapvqv00ek';
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
    </script>
</head>
<body <?php body_class(); ?>>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=159167924142715";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <?php if (is_single()) { ?>
        <!-- popup -->
        <div class="popup popup_login-FB">
            <!-- popup__wrap -->
            <div class="popup__wrap">
                <div>
                    <!-- popup__content -->
                    <div class="popup__content">
                        <header>LOGIN TO REACT</header> 
                        <!-- popup__inner -->
                        <div class="popup__inner">
                            <a rel="nofollow" href="javascript:void(0);" class="popup__btn">
                                <span>
                                    <i class="fa fa-facebook"></i>
                                    Login with Facebook
                                </span>
                            </a>
                        </div>
                        <!-- /popup__inner -->
                        <a href="#" class="popup__close"><i class="fa fa-times"></i></a>
                    </div>
                    <!-- /popup__content -->
                </div>
            </div>
            <!-- /popup__wrap -->
        </div>
        <!-- /popup -->
        <!-- popup -->
        <div class="popup popup_login-FB-like">
            <!-- popup__wrap -->
            <div class="popup__wrap">
                <div>
                    <!-- popup__content -->
                    <div class="popup__content">
                        <header>LIKE EVENTMB</header> 
                        <!-- popup__inner -->
                        <div class="popup__inner">
                            <div class="fb-like" data-href="https://www.facebook.com/EventManagerBlog" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
                        </div>
                        <!-- /popup__inner -->
                        <a href="#" class="popup__close"><i class="fa fa-times"></i></a>
                    </div>
                    <!-- /popup__content -->
                </div>
            </div>
            <!-- /popup__wrap -->
        </div>
        <!-- /popup -->
    <?php } ?>
    <!-- site -->
    <div class="site">
        <!-- site__header -->
        <header class="site__header static">
            <!-- site__header-layout -->
            <div class="site__header-layout">
                <div>
                    <!-- logo -->
                    <h1 class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>"></a></h1>
                    <!-- /logo -->
                    <span class="search-btn"><i class="fa fa-search"></i><i class="fa fa-times"></i></span>
                    <span class="menu-btn"><i class="fa fa-bars"></i><i class="fa fa-times"></i></span>
                    <!-- menu -->
                    <nav class="menu">
                        <a class="menu__item" href="<?php echo get_category_link(1545); ?>"><i class="fa fa-<?php echo $category_icons[1545]; ?>"></i><?php echo get_cat_name(1545); ?></a>
                        <a class="menu__item" href="<?php echo get_category_link(1552); ?>"><i class="fa fa-<?php echo $category_icons[1552]; ?>"></i><?php echo get_cat_name(1552); ?></a>
                        <a class="menu__item" href="<?php echo get_category_link(1558); ?>"><i class="fa fa-<?php echo $category_icons[1558]; ?>"></i><?php echo get_cat_name(1558); ?></a>
                        <a class="menu__item" href="<?php echo get_category_link(1564); ?>"><i class="fa fa-<?php echo $category_icons[1564]; ?>"></i><?php echo get_cat_name(1564); ?></a>
                        <a class="menu__item latest" href="#">Latest</a>
                        <a class="menu__item popular" href="#">Most Popular</a>
                        <div class="menu__item">
                            <dl>
                                <dt>Subscribe</dt>
                                <dd>
                                    <a href="http://feeds.feedburner.com/EventManagementBlog"><i class="fa fa-envelope"></i>All Posts</a>
                                    <a href="#"><i class="fa fa-envelope-o"></i>Weekly Newsletter</a>
                                    <a href="http://feeds.feedburner.com/EventManagementBlog" target="_blank"><i class="fa fa-rss"></i>RSS</a>
                                    <a href="#"><i class="fa fa-heart"></i>WedTech</a>
                                </dd>
                            </dl>
                        </div>

                        <div class="menu__item">
                            <!-- social -->
                            <div class="social">
                                <a href="https://www.facebook.com/EventManagerBlog"><i class="fa fa-facebook"></i></a>
                                <a href="http://twitter.com/eventmb"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/company/event-manager-blog"><i class="fa fa-linkedin"></i></a>
                                <a href="https://plus.google.com/108362505341608029663/?prsrc=3"><i class="fa fa-google-plus"></i></a>
                                <a href="https://www.pinterest.com/emblog"><i class="fa fa-pinterest"></i></a>
                            </div>
                            <!-- /social -->
                        </div>

                        <div class="menu__item">
                            <dl>
                                <dt>BROWSE</dt>
                                <dd>
                                    <a href="<?php echo home_url('about-me'); ?>">About</a>
                                    <a href="<?php echo home_url('advertise-event-blog'); ?>">Advertise</a>
                                    <a href="<?php echo home_url('faq'); ?>">FAQ</a>
                                    <a href="<?php echo home_url('copyright'); ?>">Copyright</a>
                                    <a href="<?php echo home_url('submit-guest-post'); ?>">Guest Post Submission</a>
                                    <a href="<?php echo home_url('event-startup-submission'); ?>">Event Startup Submission</a>
                                    <a href="<?php echo home_url('privacy-policy'); ?>">Privacy</a>
                                    <a href="<?php echo home_url('contact'); ?>">Contact</a>
                                </dd>
                            </dl>
                        </div>

                        <!-- copyright -->
                        <div class="copyright">
                            <span>2007-<?php echo date('Y'); ?> Social Coup Ltd |</span>
                            <span>EventManagerBlog.com is a trading name of</span>
                            <span>Social Coup Ltd</span>
                        </div>
                        <!-- /copyright -->

                    </nav>
                    <!-- /menu -->

                    <!-- menu-desctop -->
                    <nav class="menu-desctop">

                        <!-- menu-desctop__item -->
                        <div class="menu-desctop__item">
                            <!-- dropdown -->
                            <dl class="dropdown dropdown_border">
                                <dt><span>Follow</span></dt>
                                <dd>
                                    <a href="https://www.facebook.com/EventManagerBlog" target="_blank"><i class="fa fa-facebook"></i>Follow on Facebook</a>
                                    <a href="http://twitter.com/eventmb" target="_blank"><i class="fa fa-twitter"></i>Follow on Twitter</a>
                                    <a href="https://www.linkedin.com/company/event-manager-blog" target="_blank"><i class="fa fa-linkedin"></i>Follow on LinkedIn</a>
                                    <a href="https://plus.google.com/108362505341608029663/?prsrc=3" target="_blank"><i class="fa fa-google-plus"></i>Follow on Google+</a>
                                    <a href="https://www.pinterest.com/emblog" target="_blank"><i class="fa fa-pinterest"></i>Follow on Pinterest</a>
                                    <a href="https://www.periscope.tv/Eventmb" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/periscope_icon.png" alt="Periscope" class="periscope" />Follow on Periscope</a>
                                </dd>
                            </dl>
                            <!-- /dropdown -->
                        </div>
                        <!-- /menu-desctop__item -->

                        <div class="menu-desctop__hidden">
                            <?php
                            /* wp_nav_menu(
                              array(
                              'theme_location' => 'header-menu',
                              'container'      => false,
                              'items_wrap'     => '%3$s',
                              'walker'         => new EMB_Walker_Nav_Menu
                              )
                              ); */
                            ?>
                            <!-- menu-desctop__item -->
                            <div class="menu-desctop__item">
                                <!-- dropdown -->
                                <dl class="dropdown dropdown_about">
                                    <dt><span>About</span></dt>
                                    <dd>
                                        <a href="<?php echo home_url('about-me'); ?>">About</a>
                                        <a href="<?php echo home_url('faq'); ?>">FAQ</a>
                                        <a href="<?php echo home_url('copyright'); ?>">Copyright</a>
                                        <a href="<?php echo home_url('submit-guest-post'); ?>">Guest Post Submission</a>
                                        <a href="<?php echo home_url('event-startup-submission'); ?>">Event Startup Submission</a>
                                        <a href="<?php echo home_url('privacy-policy'); ?>">Privacy</a>
                                        <a href="<?php echo home_url('contact'); ?>">Contact</a>
                                    </dd>
                                </dl>
                                <!-- /dropdown -->
                            </div>
                            <!-- /menu-desctop__item -->
                            <!-- menu-desctop__item -->
                            <a class="menu-desctop__item" href="<?php echo home_url('advertise-event-blog'); ?>">Advertise</a>
                            <!-- /menu-desctop__item -->
                            <!-- menu-desctop__item -->
                            <a class="menu-desctop__item" href="<?php echo home_url('resources'); ?>">Resources</a>
                            <!-- /menu-desctop__item -->
                            <!-- menu-desctop__item -->
                            <a class="menu-desctop__item" href="<?php echo home_url('reviews'); ?>">Reviews</a>
                            <!-- /menu-desctop__item -->
                            <!-- menu-desctop__item -->
                            <a class="menu-desctop__item" href="<?php echo home_url('view-all-webinars'); ?>">Webinars</a>
                            <!-- /menu-desctop__item -->
                        </div>
                        <!-- menu-desctop__item -->
                        <div class="menu-desctop__item menu-desctop_fix">
                            <!-- dropdown -->
                            <dl class="dropdown">
                                <dt><span>Sections</span></dt>
                                <dd>
                                    <a href="<?php echo get_category_link(1545); ?>"><i class="fa fa-<?php echo $category_icons[1545]; ?>"></i><?php echo get_cat_name(1545); ?></a>
                                    <a href="<?php echo get_category_link(1552); ?>"><i class="fa fa-<?php echo $category_icons[1552]; ?>"></i><?php echo get_cat_name(1552); ?></a>
                                    <a href="<?php echo get_category_link(1558); ?>"><i class="fa fa-<?php echo $category_icons[1558]; ?>"></i><?php echo get_cat_name(1558); ?></a>
                                </dd>
                            </dl>
                            <!-- /dropdown -->
                        </div>
                        <!-- /menu-desctop__item -->
                        <!-- menu-desctop__item -->
                        <div class="menu-desctop__item menu-desctop_fix">
                            <!-- dropdown -->
                            <dl class="dropdown dropdown_latest">
                                <dt><span>Latest</span></dt>
                                <dd>
                                    <div>
                                        <?php
                                        $latest_top_query = new WP_Query(array(
                                            'posts_per_page' => 4
                                        ));
                                        while ($latest_top_query->have_posts()) {
                                            $latest_top_query->the_post();
                                            $sponsored  = types_render_field('post-sponsored', array('output' => 'raw'));
                                            $author_id  = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
                                            $author_url = '';
                                            if (types_render_field('post-author-active', array("post_id" => $author_id, "output" => "raw")) == "1") {
                                                $author_url = get_permalink($author_id);
                                            }
                                            $top_category_id = emb_get_post_top_parent_category_id(get_the_ID());
                                            global $default_post_image;
                                            $thumbnail_id    = get_post_thumbnail_id(get_the_ID());
                                            ?>
                                            <!-- card-review -->
                                            <div class="card-review">
                                                <!-- card-review__pic -->
                                                <span class="card-review__pic">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" alt="<?php get_the_title(get_the_ID()); ?>" width="222" height="147" /></a>
                                                </span>
                                                <!-- /card-review__pic -->
                                                <!-- card-review__person -->
                                                <?php if (!empty($author_url)) { ?>
                                                    <a href="<?php echo $author_url; ?>" class="card-review__person card-review__person_ginger">
                                                    <?php } else { ?>
                                                        <div class="card-review__person card-review__person_ginger">
                                                        <?php } ?>
                                                        <span class="card-review__person-name">
                                                            <?php if ($sponsored == 1) { ?>
                                                                <span>Sponsored</span>
                                                            <?php } else { ?>
                                                                By <span><?php echo get_the_title($author_id); ?></span>
                                                            <?php } ?>
                                                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($author_id), 'post-author-thumbnail')[0]; ?>" alt="<?php get_the_title($author_id); ?>" width="30" height="30" />
                                                        </span>
                                                        <span class="card-review__person-topic">
                                                            <i class="fa fa-<?php echo $category_icons[$top_category_id]; ?>"></i>
                                                        </span>
                                                        <?php if (!empty($author_url)) { ?>
                                                    </a>
                                                <?php } else { ?>
                                                </div>
                                            <?php } ?>
                                            <!-- /card-review__person -->
                                            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                        </div>
                                        <!-- /card-review -->
                                        <?php
                                    }
                                    wp_reset_query();
                                    wp_reset_postdata();
                                    ?>
                                    </div>
                                </dd>
                            </dl>
                            <!-- /dropdown -->
                        </div>
                        <!-- /menu-desctop__item -->
                        <!-- menu-desctop__item -->
                        <div class="menu-desctop__item menu-desctop_fix">
                            <!-- dropdown -->
                            <dl class="dropdown dropdown_latest">
                                <dt><span>Most Popular</span></dt>
                                <dd>
                                    <div>
                                        <?php
                                        $popular_top_query = new WP_Query(array(
                                            'posts_per_page' => 4,
                                            'meta_key'       => 'wpcf-post-popular',
                                            'meta_value'     => 1,
                                        ));
                                        while ($popular_top_query->have_posts()) {
                                            $popular_top_query->the_post();
                                            $sponsored  = types_render_field('post-sponsored', array('output' => 'raw'));
                                            $author_id  = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
                                            $author_url = '';
                                            if (types_render_field('post-author-active', array("post_id" => $author_id, "output" => "raw")) == "1") {
                                                $author_url = get_permalink($author_id);
                                            }
                                            $top_category_id = emb_get_post_top_parent_category_id(get_the_ID());
                                            global $default_post_image;
                                            $thumbnail_id    = get_post_thumbnail_id(get_the_ID());
                                            ?>
                                            <!-- card-review -->
                                            <div class="card-review">
                                                <!-- card-review__pic -->
                                                <span class="card-review__pic">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" alt="<?php get_the_title(get_the_ID()); ?>" width="222" height="147" /></a>
                                                </span>
                                                <!-- /card-review__pic -->
                                                <!-- card-review__person -->
                                                <?php if (!empty($author_url)) { ?>
                                                    <a href="<?php echo $author_url; ?>" class="card-review__person card-review__person_ginger">
                                                    <?php } else { ?>
                                                        <div class="card-review__person card-review__person_ginger">
                                                        <?php } ?>
                                                        <span class="card-review__person-name">
                                                            <?php if ($sponsored == 1) { ?>
                                                                <span>Sponsored</span>
                                                            <?php } else { ?>
                                                                By <span><?php echo get_the_title($author_id); ?></span>
                                                            <?php } ?>
                                                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($author_id)); ?>" alt="<?php get_the_title($author_id); ?>" width="30" height="30" />
                                                        </span>
                                                        <span class="card-review__person-topic">
                                                            <i class="fa fa-<?php echo $category_icons[$top_category_id]; ?>"></i>
                                                        </span>
                                                        <?php if (!empty($author_url)) { ?>
                                                    </a>
                                                <?php } else { ?>
                                                </div>
                                            <?php } ?>
                                            <!-- /card-review__person -->
                                            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                        </div>
                                        <!-- /card-review -->
                                        <?php
                                    }
                                    wp_reset_query();
                                    wp_reset_postdata();
                                    ?>
                                    </div>
                                </dd>
                            </dl>
                            <!-- /dropdown -->
                        </div>
                        <!-- /menu-desctop__item -->
                        <!-- menu-desctop__item -->
                        <div class="menu-desctop__item">
                            <!-- dropdown -->
                            <dl class="dropdown dropdown_right subscribe">
                                <dt><span>Subscribe</span></dt>
                                <dd>
                                    <a href="#"><i class="fa fa-envelope"></i>All Posts</a>
                                    <a class="form">
                                        <!-- Begin MailChimp Signup Form -->
                                        <div id="mc_embed_signup">
                                            <form action="//eventmanagerblog.us11.list-manage.com/subscribe/post?u=c480f324793364ec1d982cad3&amp;id=c297bc4951" method="post" name="mc-embedded-subscribe-form" class="validate mc-embedded-subscribe-form" target="_blank" novalidate>
                                                <div id="mc_embed_signup_scroll">
                                                    <div class="mc-field-group">
                                                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" />
                                                        <input type="submit" value="Subscribe" name="subscribe" class="button" />
                                                    </div>
                                                    <div id="mce-responses" class="clear">
                                                        <div class="response" style="display:none"></div>
                                                        <div class="response" style="display:none"></div>
                                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c480f324793364ec1d982cad3_c297bc4951" tabindex="-1" value=""></div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--End mc_embed_signup-->
                                    </a>
                                    <a href="#"><i class="fa fa-envelope-o"></i>Weekly Newsletter</a>
                                    <a class="form">
                                        <!-- Begin MailChimp Signup Form -->
                                        <div id="mc_embed_signup">
                                            <form action="//eventmanagerblog.us11.list-manage.com/subscribe/post?u=c480f324793364ec1d982cad3&amp;id=381fc70ff8" method="post" name="mc-embedded-subscribe-form" class="validate mc-embedded-subscribe-form" target="_blank" novalidate>
                                                <div id="mc_embed_signup_scroll">
                                                    <div class="mc-field-group">
                                                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                                        <input type="submit" value="Subscribe" name="subscribe" class="button">
                                                    </div>
                                                    <div id="mce-responses" class="clear">
                                                        <div class="response" style="display:none"></div>
                                                        <div class="response" style="display:none"></div>
                                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c480f324793364ec1d982cad3_381fc70ff8" tabindex="-1" value=""></div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--End mc_embed_signup-->
                                    </a>
                                    <a href="http://feeds.feedburner.com/EventManagementBlog" target="_blank"><i class="fa fa-rss"></i>RSS</a>
                                    <a href="#"><i class="fa fa-heart"></i>Webinars</a>
                                    <a class="form">
                                        <!-- Begin MailChimp Signup Form -->
                                        <div id="mc_embed_signup">
                                            <form action="//eventmanagerblog.us11.list-manage.com/subscribe/post?u=c480f324793364ec1d982cad3&amp;id=879c173779" method="post"name="mc-embedded-subscribe-form" class="validate mc-embedded-subscribe-form" target="_blank" novalidate>
                                                <div id="mc_embed_signup_scroll">
                                                    <div class="mc-field-group">
                                                        <input type="email" value="" name="EMAIL" class="required email">
                                                        <input type="submit" value="Subscribe" name="subscribe" class="button">
                                                    </div>
                                                    <div id="mce-responses" class="clear">
                                                        <div class="response" style="display:none"></div>
                                                        <div class="response" style="display:none"></div>
                                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c480f324793364ec1d982cad3_879c173779" tabindex="-1" value=""></div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--End mc_embed_signup-->
                                    </a>
                                </dd>
                            </dl>
                            <!-- /dropdown -->
                        </div>
                        <!-- /menu-desctop__item -->
                    </nav>
                    <!-- /menu-desctop -->
                </div>
            </div>
            <!-- /site__header-layout -->
            <!-- search -->
            <div class="search">
                <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                    <div>
                        <i class="fa fa-search"></i>
                        <input type="search" name="s" placeholder="Search..." />
                        <dl class="dropdown dropdown_border">
                            <dt><span><a href="#">All</a></span></dt>
                            <dd>
                                <a href="#" data-search=''>All</a>
                                <a href="#" data-search='webinars'>Webinars</a>
                                <a href="#" data-search='resources'>Resources</a>
                                <a href="#" data-search='reviews'>Reviews</a>
                            </dd>
                        </dl>
                    </div>
                    <input type="hidden" name="cat" value="" />
                    <input type="hidden" name="post_type" value="post,pages" />
                    <input type="hidden" name="webinar" value="0" />
                    <button type="submit" id="searchsubmit">Go</button>
                </form>
            </div>
            <!-- /search -->
            <!-- streams -->
            <div class="streams">
                <dl>
                    <?php foreach ($category_channels as $category_channel) { ?>
                        <dt style="border-bottom-color: <?php echo $category_colors[$category_channel]; ?>">
                        <a href="<?php echo get_category_link($category_channel); ?>" title="Go to channel">
                            <i class="fa fa-<?php echo $category_icons[$category_channel]; ?>"></i> <?php echo get_cat_name($category_channel); ?>
                        </a>
                        </dt>
                        <dd>
                            <div>
                                <!-- streams__menu -->
                                <div class="streams__menu">
                                    <?php
                                    $sub_categories = get_categories(array('parent' => $category_channel));
                                    foreach ($sub_categories as $sub_category) {
                                        ?>
                                        <a href="<?php echo get_category_link($sub_category->term_id); ?>"><?php echo $sub_category->name; ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <!-- /streams__menu -->
                                <!-- streams__container -->
                                <ul class="streams__container">
                                    <?php foreach ($sub_categories as $sub_category) { ?>
                                        <li>
                                            <?php
                                            $sub_category_posts = get_posts(array('posts_per_page' => 3, 'category' => $sub_category->term_id));
                                            foreach ($sub_category_posts as $sub_category_post) {
                                                global $default_post_image;
                                                $thumbnail_id = get_post_thumbnail_id($sub_category_post->ID);
                                                ?>
                                                <a href="<?php echo get_permalink($sub_category_post->ID); ?>">
                                                    <img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" alt="<?php get_the_title($sub_category_post->ID); ?>" width="222" height="147" />
                                                    <span><?php echo get_the_title($sub_category_post->ID); ?></span>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <!-- /streams__container -->
                            </div>
                        </dd>
                    <?php } ?>
                </dl>
            </div>
            <!-- /streams -->

        </header>
        <!-- /site__header -->