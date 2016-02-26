<?php get_header(); ?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <!-- site__content -->
        <div class="site__content">
            <!-- single-author -->
            <div class="single-author">
                <!-- single-author__wrapper -->
                <div class="single-author__wrapper">
                    <!-- single-author__head -->
                    <header class="single-author__head">
                        <!-- single-author__head-wrap -->
                        <div class="single-author__head-wrap">
                            <h1 class="single-author__name">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'post-author-thumbnail')[0]; ?>" width="138" height="138" alt="<?php the_title(); ?>"/>
                                    <span><?php the_title(); ?></span>
                                </a>
                            </h1>
                            <p><?php echo get_post_meta(get_the_ID(), 'wpcf-post-author-long-bio', true); ?></p>
                        </div>
                        <!-- /single-author__head-wrap -->
                    </header>
                    <!-- /single-author__head -->
                </div>
                <!-- /single-author__wrapper -->
            </div>
            <!-- /single-author -->
            <!-- author-articles -->
            <div class="author-articles">
                <header>
                    <i class="fa fa-pencil"></i>
                    ARTICLES BY <?php the_title(); ?>
                </header>
                <?php
                $author_id    = get_the_ID();
                $paged        = (get_query_var('page')) ? get_query_var('page') : 1;
                //echo '<!-- paged: ' . get_query_var('paged') . ' -->';
                $author_query = new WP_Query(array(
                    'meta_key'   => '_wpcf_belongs_post-author_id',
                    'meta_value' => get_the_ID(),
                    'paged'      => $paged
                ));
                $author_url   = '';
                if (types_render_field('post-author-active', array("post_id" => $author_id, "output" => "raw")) == "1") {
                    $author_url = get_permalink($author_id);
                }
                global $default_post_image;
                if ($author_query->have_posts()) {
                    while ($author_query->have_posts()) {
                        $author_query->the_post();
                        $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                        ?>
                        <!-- card-review -->
                        <div class="card-review">
                            <!-- card-review__pic -->
                            <span class="card-review__pic featured-image">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" width="390" height="259" alt="<?php the_title(); ?>"></a>
                            </span>
                            <!-- /card-review__pic -->
                            <!-- card-review__person -->
                            <?php if (!empty($author_url)) { ?>
                                <a href="<?php echo $author_url; ?>" class="card-review__person">
                                <?php } else { ?>
                                    <div class="card-review__person">    
                                    <?php } ?>
                                    <span class="card-review__person-name">
                                        By <span><?php echo get_the_title($author_id); ?></span>
                                        <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($author_id), 'post-author-thumbnail')[0]; ?>" alt="<?php get_the_title($author_id); ?>" width="30" height="30" />
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
                    if ($wp_query->current_post == 0) {
                        break;
                    }
                }
            }
            ?>
        </div>
        <!-- /author-articles -->
        <!-- become-author -->
        <div class="become-author">
            <!-- become-author__wrap -->
            <div class="become-author__wrap">
                <header>WANT TO BECOME AN AUTHOR?</header>
                <a href="<?php echo home_url('submit-guest-post'); ?>" class="btn">Submit A Guest Post</a>
            </div>
            <!-- /become-author__wrap -->
        </div>
        <!-- /become-author -->
        <!-- wedtech-list -->
        <div class="wedtech-list">

            <?php
            if ($author_query->have_posts()) {
                while ($author_query->have_posts()) {
                    $author_query->the_post();
                    $author_url = '';
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
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image; ?>" width="642" height="426" alt="<?php the_title(); ?>"></a>
                        </span>
                        <!-- /card-review__pic -->
                        <!-- card-review__person -->
                        <?php if (!empty($author_url)) { ?>
                            <a href="<?php echo $author_url; ?>" class="card-review__person">
                            <?php } else { ?>
                                <div class="card-review__person">    
                                <?php } ?>
                                <span class="card-review__person-name">
                                    By <span><?php echo get_the_title($author_id); ?></span>
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($author_id)); ?>" alt="<?php get_the_title($author_id); ?>" width="30" height="30" />
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
        }
        ?>

        </div>
        <!-- /wedtech-list -->
        <!-- pagination-wrap -->
        <div class="pagination-wrap pagination-wrap_centering">
            <!-- pagination-wrap__inner -->
            <div class="pagination-wrap__inner">
                <!-- pagination -->
                <div class="pagination">
                    <?php
                    $big = 999999999;
                    echo paginate_links(array(
                        'base'               => get_permalink($author_id) . '%_%', //get_pagenum_link(0)//str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'             => '%#%',
                        'current'            => $paged,
                        'total'              => $author_query->max_num_pages,
                        'before_page_number' => '<span class="centering"><span>',
                        'after_page_number'  => '</span></span>',
                        'prev_text'          => '<span class="centering"><i class="fa fa-angle-left"></i></span>',
                        'next_text'          => '<span class="centering"><i class="fa fa-angle-right"></i></span>'
                    ));
                    ?>
                </div>
                <!-- /pagination -->
            </div>
            <!-- /pagination-wrap__inner -->
        </div>
        <!-- /pagination-wrap -->
        </div>
        <!-- /site__content -->
        <?php
    }
}
?>
<?php
get_footer();
