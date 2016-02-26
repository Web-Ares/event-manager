<?php get_header(); ?>

<!-- site__content -->
<div class="site__content">
    <!-- resources-detail -->
    <div class="resources-detail">
        <header>
            <i class="fa fa-wrench"></i>
            FREE RESOURCES
        </header>
        <!-- resources-detail__wrapper -->
        <div class="resources-detail__wrapper">
            <?php
            $featured_resource_query = new WP_Query(array(
                'numberposts' => 1,
                'post_type'   => 'resource',
                'meta_key'    => 'wpcf-resource-featured',
                'meta_value'  => 1
            ));
            while ($featured_resource_query->have_posts()) {
                $featured_resource_query->the_post();
                $link         = types_render_field('resource-link', array('post_id' => get_the_ID()));
                global $default_post_image;
                $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                ?>
                <!-- resources-detail__pic -->
                <a href="<?php echo $link; ?>" class="resources-detail__pic">
                    <img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" width="642" height="350" alt="<?php the_title(); ?>">
                </a>
                <!-- /resources-detail__pic -->
                <!-- resources-detail__txt -->
                <div class="resources-detail__txt">
                    <!-- resources-detail__txt-inner -->
                    <div class="resources-detail__txt-inner">
                        <?php the_content(); ?>
                    </div>
                    <!-- /resources-detail__txt-inner -->
                    <footer>
                        <a href="<?php echo $link; ?>" class="resources-detail__more">More Info</a>
                        <a href="<?php echo $link; ?>" class="resources-detail__load"><i class="fa fa-download"></i></a>
                    </footer>
                </div>
                <!-- /resources-detail__txt -->
                <?php
            }
            wp_reset_query();
            wp_reset_postdata();
            ?>
            <!-- /resources-detail__txt -->
        </div>
        <!-- /resources-detail__wrapper -->
    </div>
    <!-- /resources-detail -->
    <!-- connect-with -->
    <div class="connect-with connect-with_resources">
        <!-- connect-with__wrap -->
        <div class="connect-with__wrap">
            <header>
                <i class="fa fa-hand-o-down"></i>
                GET NOTIFIED ABOUT NEW RESOURCES
            </header>
            <form action="//eventmanagerblog.us11.list-manage.com/subscribe/post?u=c480f324793364ec1d982cad3&amp;id=e5189d2e3b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate connect-with__subscribe" target="_blank" novalidate>
                <fieldset class="connect-with__email">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="EMAIL" placeholder="Enter Email" class="required email" required/>
                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c480f324793364ec1d982cad3_e5189d2e3b" tabindex="-1" value=""></div>
                </fieldset>
                <button type="submit" name="subscribe" class="connect-with__submit btn">Subscribe</button>
            </form>
        </div>
        <!-- /connect-with__wrap -->
    </div>
    <!-- /connect-with -->
    <!-- bookshelf -->
    <div class="bookshelf">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                global $default_post_image;
                $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                global $wp_query;
                if ($wp_query->current_post == 0) {
                    continue;
                }
                ?>
                <!-- bookshelf__item -->
                <a href="<?php echo types_render_field('resource-link', array('post_id' => get_the_ID())); ?>" class="bookshelf__item">
                    <!-- bookshelf__pic -->
                    <div class="bookshelf__pic">
                        <img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" width="194" height="272" alt="<?php the_title(); ?>">
                    </div>
                    <!-- /bookshelf__pic -->
                    <!-- bookshelf__title -->
                    <span class="bookshelf__title">
                        <?php the_title(); ?>
                    </span>
                    <!-- /bookshelf__title -->
                </a>
                <!-- /bookshelf__item -->
                <?php
            }
        }
        ?>
    </div>
    <!-- /bookshelf -->
    <!-- info-graphics -->
    <div class="info-graphics">
        <!-- info-graphics__wrap -->
        <div class="info-graphics__wrap">
            <header>
                <i class="fa fa-thumb-tack"></i>
                LATEST
                <span>PRESENTATIONS &</span>
                INFOGRAPHICS
                <a href="http://www.slideshare.net/tojulius/" target="_blank" class="btn btn_black">View All</a>
            </header>
            <!-- info-graphics__inner -->
            <div class="info-graphics__inner">
                <!-- info-graphics__item -->
                <div class="info-graphics__item">
                    <a href="http://www.slideshare.net/tojulius/10-event-trends-for-2015" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/10-Event-Trends-for-2015.jpg" width="306" height="273" /></a>                    
                </div>
                <!-- /info-graphics__item -->
                <!-- info-graphics__item -->
                <div class="info-graphics__item">
                    <a href="http://www.slideshare.net/tojulius/social-media-changed-events-forever-here-is-proof" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/Social-Media-Changed-Events-Forever.jpg" width="306" height="273" /></a>
                </div>
                <!-- /info-graphics__item -->
                <!-- info-graphics__item -->
                <div class="info-graphics__item">
                    <a href="http://www.slideshare.net/tojulius/20-event-planning-fails-our-guests-hate" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/Event-Planning-Fails-Our-Guests-Hate.jpg" width="306" height="273" /></a>
                </div>
                <!-- /info-graphics__item -->
            </div>
            <!-- /info-graphics__inner -->
        </div>
        <!-- /info-graphics__wrap -->
    </div>
    <!-- /info-graphics -->
</div>
<!-- /site__content -->

<?php
get_footer();
