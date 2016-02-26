<?php /* Template Name: Advertise */ ?>

<?php get_header(); ?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $featured_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
        ?>
        <!-- site__content -->
        <div class="site__content">
            <!-- intro -->
            <div class="intro">
                <!-- intro__ban -->
                <div class="intro__ban" <?php echo!empty($featured_image_url) ? "style=\"background-image: url($featured_image_url);\"" : ''; ?>>
                    <h1><?php the_title(); ?></h1>
                </div>
                <!-- /intro__ban -->
                <!-- intro__text -->
                <div class="intro__text">
                    <?php the_content(); ?>
                </div>
                <!-- /intro__text -->
            </div>
            <!-- /intro -->
            <!-- brands -->
            <div class="brands">
                <div class="brands__wrap">
                    <h2><i class="fa fa-shield"></i> BRANDS WE WORK WITH</h2>
                    <div>
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/etouches.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/lanyon.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/a2z.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/brands3.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/brands4.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/brands5.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/brands6.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/brands8.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/brands9.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/brands10.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/brands11.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                        <!-- brands__item -->
                        <div class="brands__item">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/brands12.jpg" alt=""></a>
                        </div>
                        <!-- /brands__item -->
                    </div>

                </div>

            </div>
            <!-- /brands -->
            <!-- media-kit -->
            <div class="media-kit">
                <h2><i class="fa fa-pencil-square-o"></i> MEDIA KIT</h2>
                <ul>
                    <li>
                        <p>Our Media Kit will give you more details on traffic, rankings and social network reach. We
                            carefully crafted it for you to understand what to expect when you advertise on this blog and
                            the experience of other brands we worked with.</p>
                    </li>
                    <li>
                        <p>In order to obtain a copy of our latest Media Kit and find out more about our advertising options and rates, please get in touch with Carmen Boscolo <a href="mailto:carmen@eventmanagerblog.com">carmen@eventmanagerblog.com</a></p>
                    </li>
                </ul>
                <?php //echo do_shortcode('[contact-form-7 id="18155" title="Media Kit"]'); ?>
            </div>
            <!-- /media-kit -->
        </div>
        <!-- /site__content -->
        <?php
    }
}
get_footer();
