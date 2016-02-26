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
        </div>
        <!-- /site__content -->
        <?php
    }
}
get_footer();
