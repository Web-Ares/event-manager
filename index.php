<?php get_header(); ?>

<!-- site__content -->
<div class="site__content">
    <!-- show-website -->
    <div class="show-website">
        <!-- show-website__wrap -->
        <div class="desktop-header-ad">
            <?php emb_print_ad('header_desktop'); ?>
        </div>
        <div class="tablet-header-ad">
            <a href="http://try.etouches.com/overview/?utm_source=Advertisement&utm_medium=emb_2015&utm_campaign=70114000000ucOT" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/978x160---global--blue.gif" style="max-width:100%;display:block;margin:0 auto;" />
            </a>
        </div>
        <div class="mobile-header-ad">
            <?php /* <a href="http://try.etouches.com/overview/?utm_source=Advertisement&utm_medium=emb_2015&utm_campaign=70114000000ucOT" target="_blank">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/347x188---global-blue.gif" style="max-width:100%;display:block;margin:0 auto;"/>
              </a> */ ?>
            <?php emb_print_ad('header_mobile'); ?>
        </div>
        <footer>Advertisement</footer>
        <!-- /show-website__wrap -->
    </div>
    <!-- /show-website -->
    <!-- latest-articles -->
    <div class="latest-articles">
        <header>
            <i class="fa fa-bookmark"></i>
            LATEST ARTICLES
            <a href="<?php echo home_url('latest-articles'); ?>" class="btn btn_black">View All</a>
        </header>
        <!-- latest-articles__wrap -->
        <div class="latest-articles__wrap">
            <!-- latest-articles__wrap-main -->
            <div class="latest-articles__wrap-main">
                <?php
                $latest_index_query = new WP_Query(array(
                    'posts_per_page' => 3
                ));
                while ($latest_index_query->have_posts()) {
                    $latest_index_query->the_post();
                    $sponsored       = types_render_field('post-sponsored', array('output' => 'raw'));
                    $author_id       = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
                    $top_category_id = emb_get_post_top_parent_category_id(get_the_ID());
                    $author_url      = '';
                    if (types_render_field('post-author-active', array("post_id" => $author_id, "output" => "raw")) == "1") {
                        $author_url = get_permalink($author_id);
                    }
                    global $default_post_image;
                    $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                    ?>
                    <!-- card-review -->
                    <div class="card-review">
                        <!-- card-review__pic -->
                        <span class="card-review__pic">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" alt="<?php get_the_title(get_the_ID()); ?>" width="390" height="259" /></a>
                        </span>
                        <!-- /card-review__pic -->                            
                        <!-- card-review__person -->
                        <?php if (!empty($author_url)) { ?>
                            <div class="card-review__person">
                            <?php } else { ?>
                                <div class="card-review__person">    
                                <?php } ?>
                                <a a href="<?php echo $author_url; ?>" class="card-review__person-name">
                                    <?php if ($sponsored == 1) { ?>
                                        <span>Sponsored</span>
                                    <?php } else { ?>
                                        By <span><?php echo get_the_title($author_id); ?></span>
                                    <?php } ?>
                                    <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($author_id), 'post-author-mini')[0]; ?>" alt="<?php get_the_title($author_id); ?>" width="30" height="30" />
                                </a>
                                <a href="<?php echo get_category_link($top_category_id); ?>" class="card-review__person-topic">
                                    <i class="fa fa-<?php echo $category_icons[$top_category_id]; ?>"></i>
                                    <span><?php echo get_cat_name($top_category_id); ?></span>
                                </a>
                                <?php if (!empty($author_url)) { ?>
                                </div>
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
            <!-- /latest-articles__wrap-main -->
            <!-- latest-articles__wrap-middle -->
            <div class="latest-articles__wrap-middle">
                <?php
                $popular_index_query = new WP_Query(array(
                    'posts_per_page' => 4,
                    'meta_key'       => 'wpcf-post-popular',
                    'meta_value'     => 1,
                ));
                while ($popular_index_query->have_posts()) {
                    $popular_index_query->the_post();
                    $sponsored           = types_render_field('post-sponsored', array('output' => 'raw'));
                    $sponsor_description = types_render_field('post-sponsor-description', array());
                    $author_id           = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
                    $top_category_id     = emb_get_post_top_parent_category_id(get_the_ID());
                    $author_url          = '';
                    if (types_render_field('post-author-active', array("post_id" => $author_id, "output" => "raw")) == "1") {
                        $author_url = get_permalink($author_id);
                    }
                    global $default_post_image;
                    $thumbnail_id = get_post_thumbnail_id(get_the_ID());
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
                            <div class="card-review__person card-review__person_ginger">
                            <?php } else { ?>
                                <div  class="card-review__person card-review__person_ginger">    
                                <?php } ?>
                                <a href="<?php echo $author_url; ?>" class="card-review__person-name">
                                    <?php if ($sponsored == 1) { ?>
                                        <span data-tooltip="Sponsored by <?php echo $sponsor_description; ?>">Sponsored</span>
                                    <?php } else { ?>
                                        By <span><?php echo get_the_title($author_id); ?></span>
                                    <?php } ?>
                                    <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($author_id), 'post-author-mini')[0]; ?>" alt="<?php get_the_title($author_id); ?>" width="30" height="30" />
                                </a>
                                <a href="<?php echo get_category_link($top_category_id); ?>" class="card-review__person-topic">
                                    <i class="fa fa-<?php echo $category_icons[$top_category_id]; ?>"></i>
                                </a>
                                <?php if (!empty($author_url)) { ?>
                                </div>
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
            <!-- /latest-articles__wrap-middle -->
            <!-- latest-articles__wrap-last -->
            <div class="latest-articles__wrap-last">
                <!-- latest-articles__advert -->
                <a href="#" class="latest-articles__advert">
                    <div class="latest-articles__advert-pic">
                        <?php emb_print_ad('sidebar_1'); ?>
                    </div>
                    <footer>Advertisement</footer>
                </a>
                <!-- /latest-articles__advert -->
                <!-- latest-articles__advert -->
                <a href="#" class="latest-articles__advert">
                    <div class="latest-articles__advert-pic">
                        <?php emb_print_ad('sidebar_2'); ?>
                    </div>
                    <footer>Advertisement</footer>
                </a>
                <!-- /latest-articles__advert -->
                <!-- latest-articles__advert -->
                <a href="#" class="latest-articles__advert">
                    <div class="latest-articles__advert-pic">
                        <?php emb_print_ad('sidebar_3'); ?>
                    </div>
                    <footer>Advertisement</footer>
                </a>
                <!-- /latest-articles__advert -->
                <!-- latest-articles__advert -->
                <a href="#" class="latest-articles__advert">
                    <div class="latest-articles__advert-pic">
                        <?php emb_print_ad('sidebar_4'); ?>
                    </div>
                    <footer>Advertisement</footer>
                </a>
                <!-- /latest-articles__advert -->
            </div>
            <!-- /latest-articles__wrap-last -->
            <!-- btn -->
            <a href="<?php echo home_url('latest-articles'); ?>" class="btn btn_black">View All</a>
            <!-- /btn -->
        </div>
        <!-- /latest-articles__wrap -->
    </div>
    <!-- /latest-articles -->
    <!-- resources -->
    <div class="resources">
        <!-- resources__wrap -->
        <div class="resources__wrap">
            <header>
                <i class="fa fa-wrench"></i>
                FREE RESOURCES
                <a href="<?php echo get_post_type_archive_link('resource'); ?>" class="btn btn_black">View All</a>
            </header>
            <!-- resources__wrapper -->
            <div class="resources__wrapper">
                <!-- resources__trends -->
                <div class="resources__trends">
                    <?php
                    $featured_resources = get_posts(array(
                        'post_type'      => 'resource',
                        'posts_per_page' => 1,
                        'meta_key'       => 'wpcf-resource-featured',
                        'meta_value'     => 1
                    ));
                    if (count($featured_resources) > 0) {
                        ?>
                        <!-- resources__trends-main -->
                        <a href="<?php echo types_render_field('resource-link', array('post_id' => $featured_resources[0]->ID)); ?>" class="resources__trends-main">
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($featured_resources[0]->ID)); ?>" alt="<?php get_the_title($featured_resources[0]->ID); ?>" width="642" height="350" />
                        </a>
                        <!-- /resources__trends-main -->
                    <?php } ?>
                    <!-- resources__trends-wrap -->
                    <div class="resources__trends-wrap">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                $resources = get_posts(array(
                                    'post_type'      => 'resource',
                                    'posts_per_page' => 3,
                                    'meta_key'       => 'wpcf-resource-featured',
                                    'meta_value'     => 0
                                ));
                                if (count($resources) > 0) {
                                    foreach ($resources as $resource) {
                                        ?>
                                        <div class="swiper-slide">
                                            <a href="<?php echo types_render_field('resource-link', array('post_id' => $resource->ID)); ?>" class="resources__trends-item" target="_blank">
                                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($resource->ID)); ?>" alt="<?php get_the_title($resource->ID); ?>" width="194" height="272" />
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <!-- /resources__trends-wrap -->
                    <!-- btn -->
                    <a href="<?php echo get_post_type_archive_link('resource'); ?>" class="btn btn_black">View All</a>
                    <!-- /btn -->
                </div>
                <!-- /resources__trends -->
                <!-- resources__present -->
                <div class="resources__present">
                    <header>
                        <i class="fa fa-thumb-tack"></i>
                        LATEST PRESENTATION
                    </header>
                    <!-- resources__present-wrap -->
                    <div class="resources__present-wrap">
                        <!-- resources__present-item -->
                        <div class="resources__present-item resources__present-item_advert">
                            <div class="resources__present-pic">
                                <a href="http://www.eventappbible.com/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/event-app-bible.jpeg" width="300" height="250" alt="picture" /></a>
                                <footer style="background-color: initial;height:32px;"></footer>
                            </div>
                        </div>
                        <!-- /resources__present-item -->
                        <!-- resources__present-item -->
                        <a href="http://www.slideshare.net/tojulius/20-signs-your-event-is-from-1999-57777618" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/20-signs-your-event-is-from-1999.jpg" width="306" height="273" alt="Latest Presentation" /></a>
                        <!-- /resources__present-item -->
                    </div>
                    <!-- /resources__present-wrap -->
                </div>
                <!-- /resources__present -->
            </div>
            <!-- /resources__wrapper -->
        </div>
        <!-- /resources__wrap -->
    </div>
    <!-- /resources -->
    <!-- connect-with -->
    <div class="connect-with">
        <!-- connect-with__wrap -->
        <div class="connect-with__wrap">
            <header>
                <i class="fa fa-hand-o-down"></i>
                SUBSCRIBE <span class="connect-with__none">TO EVENT MB</span>
                <div class="connect-with__social">
                    <a href="https://twitter.com/EventMB" class="twitter-follow-button connect-with__social-twitter" data-show-count="false">Follow @EventMB</a>
                    <script>!function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = p + '://platform.twitter.com/widgets.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, 'script', 'twitter-wjs');</script>
                    <div class="fb-like" data-href="https://www.facebook.com/EventManagerBlog" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
                </div>
            </header>
            <form action="//eventmanagerblog.us11.list-manage.com/subscribe/post?u=c480f324793364ec1d982cad3&amp;id=c297bc4951" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate connect-with__subscribe" target="_blank" novalidate>
                <fieldset class="connect-with__email">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="EMAIL" placeholder="Enter Email" class="required email" required/>
                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c480f324793364ec1d982cad3_c297bc4951" tabindex="-1" value=""></div>
                </fieldset>
                <button type="submit" name="subscribe" class="connect-with__submit btn">Subscribe</button>
            </form>
        </div>
        <!-- /connect-with__wrap -->
    </div>
    <!-- /connect-with -->
    <!-- latest-reviews -->
    <div class="latest-reviews">
        <header>
            <i class="fa fa-comment"></i>
            LATEST REVIEWS
            <a href="<?php echo home_url('reviews'); ?>" class="btn btn_black">View All</a>
        </header>
        <!-- latest-reviews__wrap -->
        <div class="latest-reviews__wrap">
            <?php
            $latest_reviews_query = new WP_Query(array(
                'posts_per_page' => 4,
                'category__in'   => array(1565)
            ));
            while ($latest_reviews_query->have_posts()) {
                $latest_reviews_query->the_post();
                $sponsored       = types_render_field('post-sponsored', array('output' => 'raw'));
                $author_id       = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
                $top_category_id = emb_get_post_top_parent_category_id(get_the_ID());
                global $default_post_image;
                $thumbnail_id    = get_post_thumbnail_id(get_the_ID());
                ?>
                <!-- card-review -->
                <a href="<?php the_permalink(); ?>" class="card-review">
                    <!-- card-review__pic -->
                    <span class="card-review__pic">
                        <img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" width="222" height="147" alt="<?php the_title(); ?>"/>
                    </span>
                    <!-- /card-review__pic -->
                    <!-- card-review__person -->
                    <div class="card-review__person">
                        <span class="card-review__person-name">
                            <?php if ($sponsored == 1) { ?>
                                <span>Sponsored</span>
                            <?php } else { ?>
                                By <span><?php echo get_the_title($author_id); ?></span>
                            <?php } ?>
                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($author_id), 'post-author-mini')[0]; ?>" width="30" height="30" alt="<?php echo get_the_title($author_id); ?>">
                        </span>
                    </div>
                    <!-- /card-review__person -->
                    <p><?php the_title(); ?></p>
                </a>
                <!-- /card-review -->
                <?php
            }
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </div>
        <!-- /latest-reviews__wrap -->
    </div>
    <!-- /latest-reviews -->
    <!-- sponsored -->
    <div class="sponsored">
        <div class="sponsored__wrap">
            <!-- sponsored__post -->
            <div class="sponsored__post">
                <h2 class="sponsored__title"><a href="<?php echo home_url('sponsored-posts'); ?>"><i class="fa fa-star"></i> <span>LATEST</span> SPONSORED POSTS</a></h2>
                <?php
                $sponsored_index_query = new WP_Query(array(
                    'posts_per_page' => 4,
                    'meta_key'       => 'wpcf-post-sponsored',
                    'meta_value'     => 1,
                ));
                while ($sponsored_index_query->have_posts()) {
                    $sponsored_index_query->the_post();
                    $sponsored       = types_render_field('post-sponsored', array('output' => 'raw'));
                    $author_id       = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
                    $top_category_id = emb_get_post_top_parent_category_id(get_the_ID());
                    global $default_post_image;
                    $thumbnail_id    = get_post_thumbnail_id(get_the_ID());
                    if ($sponsored_index_query->current_post == 0) {
                        ?>
                        <!-- sponsored__post-item -->
                        <div class="sponsored__post-item sponsored__post-item_main">
                            <div class="sponsored__post-pic">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" alt="<?php get_the_title(get_the_ID()); ?>" /></a>
                            </div>
                            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                            <a class="sponsored__post-name" title="Sponsored by <?php echo strip_tags(types_render_field('post-sponsor-description', array())); ?>"><i class="fa fa-star"></i> Sponsored</a>
                        </div>
                        <!-- /sponsored__post-item -->
                        <?php
                    } else {
                        if ($sponsored_index_query->current_post == 1) {
                            ?>
                            <div class="sponsored__post__wrap">
                                <?php
                            }
                            ?>
                            <!-- sponsored__post-item -->
                            <div class="sponsored__post-item">
                                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                <a class="sponsored__post-name" title="Sponsored by <?php echo strip_tags(types_render_field('post-sponsor-description', array())); ?>"><i class="fa fa-star"></i> Sponsored</a>
                            </div>
                            <!-- /sponsored__post-item -->
                            <?php
                            if ($sponsored_index_query->current_post == $sponsored_index_query->post_count - 1) {
                                ?>
                            </div>
                            <?php
                        }
                    }
                }
                wp_reset_query();
                wp_reset_postdata();
                ?>
            </div>
            <!-- /sponsored__post -->
            <!-- sponsored__author -->
            <div class="sponsored__author">
                <h2 class="sponsored__title"><i class="fa fa-pencil"></i> FEATURED AUTHOR</h2>
                <?php
                $featured_author_query = new WP_Query(array(
                    'post_type'   => 'post-author',
                    'numberposts' => 1,
                    'meta_key'    => 'wpcf-author-featured',
                    'meta_value'  => 1,
                ));
                while ($featured_author_query->have_posts()) {
                    $featured_author_query->the_post();
                    ?>
                    <!-- sponsored__author-item -->
                    <div class="sponsored__author-item">
                        <div class="sponsored__author-pic">
                            <div>
                                <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'post-author-featured')[0]; ?>" alt="<?php the_title(); ?>" width="150" height="150" />
                            </div>
                        </div>
                        <div class="sponsored__author-title">
                            <span class="sponsored__author-name"><?php the_title(); ?></span>
                            <?php the_content(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="sponsored__author-view"><i class="fa fa-user"></i> View Author</a>
                    </div>
                    <!-- /sponsored__author-item -->
                    <?php
                }
                ?>
            </div>
            <!-- /sponsored__author -->
        </div>
    </div>
    <!-- /sponsored -->
    <!-- videos -->
    <div class="videos">
        <h2>
            <i class="fa fa-film"></i>
            WEBINARS
        </h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php /*
                  $logos = array(
                  'a2z'          => 'http://eventtechoftheyear.com/view-entry/?entry=1173',
                  'bizzabo'      => 'http://eventtechoftheyear.com/view-entry/?entry=1205',
                  'brojure'      => 'http://eventtechoftheyear.com/view-entry/?entry=1257',
                  'catchbox'     => 'http://eventtechoftheyear.com/view-entry/?entry=1242',
                  'coreapps'     => 'http://eventtechoftheyear.com/view-entry/?entry=1263',
                  'crowdcompass' => 'http://eventtechoftheyear.com/view-entry/?entry=1261',
                  'crowdmics'    => 'http://eventtechoftheyear.com/view-entry/?entry=1238',
                  'cvent'        => 'http://eventtechoftheyear.com/view-entry/?entry=1267',
                  'doubledutch'  => 'http://eventtechoftheyear.com/view-entry/?entry=1232',
                  'evenium'      => 'http://eventtechoftheyear.com/view-entry/?entry=1234',
                  'eventbase'    => 'http://eventtechoftheyear.com/view-entry/?entry=1200',
                  'eventmob'     => 'http://eventtechoftheyear.com/view-entry/?entry=1180',
                  'eventsair'    => 'http://eventtechoftheyear.com/view-entry/?entry=1149',
                  'feathr'       => 'http://eventtechoftheyear.com/view-entry/?entry=1278',
                  'glisser'      => 'http://eventtechoftheyear.com/view-entry/?entry=1248',
                  'goomeo'       => 'http://eventtechoftheyear.com/view-entry/?entry=1196',
                  'groupmeet'    => 'http://eventtechoftheyear.com/view-entry/?entry=1143',
                  'guidebook'    => 'http://eventtechoftheyear.com/view-entry/?entry=1229',
                  'hellowcrowd'  => 'http://eventtechoftheyear.com/view-entry/?entry=1208',
                  'jolly'        => 'http://eventtechoftheyear.com/view-entry/?entry=1223',
                  'lanyon'       => 'http://eventtechoftheyear.com/view-entry/?entry=1284',
                  'lintelus'     => 'http://eventtechoftheyear.com/view-entry/?entry=1276',
                  'lmg'          => 'http://eventtechoftheyear.com/view-entry/?entry=1182',
                  'play2lead'    => 'http://eventtechoftheyear.com/view-entry/?entry=1203',
                  'poken'        => 'http://eventtechoftheyear.com/view-entry/?entry=1187',
                  'qjanhai'      => 'http://eventtechoftheyear.com/view-entry/?entry=1209',
                  'socialtables' => 'http://eventtechoftheyear.com/view-entry/?entry=1192',
                  'visualq'      => 'http://eventtechoftheyear.com/view-entry/?entry=1271',
                  'tapcrowd'     => 'http://eventtechoftheyear.com/view-entry/?entry=1176',
                  'twoppy'       => 'http://eventtechoftheyear.com/view-entry/?entry=1227'
                  );
                  foreach ($logos as $logo => $url) {
                  ?>
                  <div class="videos__item swiper-slide">
                  <a href="<?php echo $url; ?>" target="_blank">
                  <div class="videos__pic"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/ety-logos/550x422_<?php echo $logo; ?>.jpg" alt="<?php echo $logo; ?>"></div>
                  </a>
                  </div>
                  <?php
                  }
                 */ ?>
                <?php
                $webinars_query = new WP_Query(array(
                    'posts_per_page' => -1,
                    'meta_key'       => 'wpcf-post-show-webinar',
                    'meta_value'     => 1,
                ));
                while ($webinars_query->have_posts()) {
                    $webinars_query->the_post();
                    ?>
                    <div class="videos__item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="videos__pic">
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" alt="<?php the_title(); ?>">
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="videos__next" style="top: 192px;">
            <i class="fa fa-arrow-right"></i>
        </div>
        <div class="videos__prev" style="top: 192px;">
            <i class="fa fa-arrow-left"></i>
        </div>
        <div class="videos__btn">
            <a href="<?php echo home_url('view-all-webinars'); ?>" class="btn" target="_blank">View All</a>
        </div>
    </div>
    <!-- /videos -->
    <!-- show-website -->
    <div class="show-website show-website_big">
        <footer>Advertisement</footer>
        <!-- show-website__wrap -->
        <a href="http://www.showthemes.com/?utm_source=Footer-Ad-EMB&utm_medium=Footer-Ad-EMB&utm_campaign=Footer-Ad-EMB" target="_blank" class="show-website__wrap">
            <h2 class="show-website__title">
                need an event website?
                <span>LOOK NO FURTHER</span>
            </h2>
            <span class="show-website__logo">logo</span>
            <img class="show-website__pic" src="<?php echo get_stylesheet_directory_uri(); ?>/pic/show-website__pic.png" width="642" height="238" alt="showthemes">
        </a>
        <!-- /show-website__wrap -->
    </div>
    <!-- /show-website -->
</div>
<!-- /site__content -->

<?php
get_footer();
