<?php /* Template Name: About */ ?>

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
            <!-- editorial-team -->
            <div class="editorial-team">
                <div class="editorial-team__wrap">
                    <h2><i class="fa fa-users"></i> EDITORIAL TEAM</h2>
                    <?php
                    $authors_query      = new WP_Query(array(
                        'post_type'  => 'post-author',
                        'meta_key'   => 'wpcf-post-author-active',
                        'meta_value' => 1,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'nopaging' => true
                    ));
                    if ($authors_query->have_posts()) {
                        while ($authors_query->have_posts()) {
                            $authors_query->the_post();
                            ?>
                            <!-- editorial-team__item -->
                            <div class="editorial-team__item">
                                <div class="editorial-team__pic">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'post-author-thumbnail')[0]; ?>" alt="<?php the_title(); ?>">
                                    </a>
                                </div>
                                <div class="editorial-team__title">
                                    <a href="<?php the_permalink(); ?>" class="editorial-team__name"><?php the_title(); ?></a>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <!-- /editorial-team__item -->
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- /editorial-team -->
        </div>
        <!-- /site__content -->
        <?php
    }
}
get_footer();