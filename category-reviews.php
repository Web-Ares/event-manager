<?php get_header(); ?>

<!-- site__content -->
<div class="site__content">
    <!-- reviews -->
    <div class="reviews">
        <header>
            <h1>
                <a href="<?php echo home_url('reviews'); ?>">
                    <i class="fa fa-comment"></i>
                    LATEST REVIEWS
                </a>
            </h1>
            <!-- reviews__search -->
            <form action="" method="GET" class="reviews__search">
                <input type="search" name="search" value="<?php echo filter_input(INPUT_GET, 'search'); ?>" class="reviews__search-input" placeholder="Search Reviews"/>
                <button type="submit" class="reviews__search-submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
            <!-- /reviews__search -->
        </header>
        <!-- filter -->
        <dl class="filter">
            <dt>
            <span>Filter</span>
            </dt>
            <dd>
            <dd>
                <a href="<?php echo get_tag_link(931); ?>/?category=review" class="btn btn_black">Social Media</a>
                <a href="<?php echo get_tag_link(47); ?>/?category=review" class="btn btn_black">Event Apps</a>
                <a href="<?php echo get_tag_link(146); ?>/?category=review" class="btn btn_black">Event Registration</a>
                <a href="<?php echo get_tag_link(791); ?>/?category=review" class="btn btn_black">Gamification</a>
                <a href="<?php echo get_tag_link(46); ?>/?category=review" class="btn btn_black">Slide Sharing</a>
                <?php /*<a href="<?php echo get_tag_link(146); ?>/?category=review" class="btn btn_black">Networking Tools</a>*/ ?>
                <a href="<?php echo get_tag_link(283); ?>/?category=review" class="btn btn_black">Video</a>
                <?php /*<a href="<?php echo get_tag_link(146); ?>/?category=review" class="btn btn_black">Photo Sharing</a>*/ ?>
                <a href="<?php echo get_tag_link(1227); ?>/?category=review" class="btn btn_black">Q &amp; A, Polling</a>
            </dd>
            </dd>

        </dl>
        <!-- /filter -->
        <!-- site__content-wrap -->
        <div class="site__content-wrap">

            <!-- site__content-inner -->
            <div class="site__content-inner">

                <!-- site__content-forked -->
                <div class="site__content-forked">

                    <?php
                    global $wp_query;

                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            $author_id  = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
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
            <!-- /site__content-forked -->
            <!-- reviews__ledge -->
            <div class="reviews__ledge">
                <header class="reviews__ledge-head">New Startup, Let us know!</header>
                <a href="<?php echo home_url('event-startup-submission'); ?>" class="btn">Submit Your Startup</a>
            </div>
            <!-- /reviews__ledge -->
            <!-- reviews__list -->
            <div class="reviews__list">

                <?php
                global $wp_query;
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        $author_id  = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
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
        <!-- /reviews__list -->
        <!-- pagination -->
        <div class="pagination">
            <?php
            $big = 999999999;
            echo paginate_links(array(
                'base'               => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'             => '?paged=%#%',
                'current'            => max(1, get_query_var('paged')),
                'total'              => $wp_query->max_num_pages,
                'before_page_number' => '<span class="centering"><span>',
                'after_page_number'  => '</span></span>',
                'prev_text'          => '<span class="centering"><i class="fa fa-angle-left"></i></span>',
                'next_text'          => '<span class="centering"><i class="fa fa-angle-right"></i></span>'
            ));
            ?>
        </div>
        <!-- /pagination -->
    </div>
    <!-- /site__content-inner -->
    <!-- site__content-aside -->
    <div class="site__content-aside">
        <!-- advertisement -->
        <div class="advertisement">
            <!-- advertisement__item -->
            <a href="#" class="advertisement__item">
                <!-- advertisement__item-pic -->
                <div class="advertisement__item-pic">
                    <?php emb_print_ad('sidebar_1'); ?>
                </div>
                <!-- /advertisement__item-pic -->
                <footer>Advertisement</footer>
            </a>
            <!-- /advertisement__item -->
            <!-- advertisement__item -->
            <a href="#" class="advertisement__item">
                <!-- advertisement__item-pic -->
                <div class="advertisement__item-pic">
                    <?php emb_print_ad('sidebar_2'); ?>
                </div>
                <!-- /advertisement__item-pic -->
                <footer>Advertisement</footer>
            </a>
            <!-- /advertisement__item -->
            <!-- advertisement__item -->
            <a href="#" class="advertisement__item">
                <!-- advertisement__item-pic -->
                <div class="advertisement__item-pic">
                    <?php emb_print_ad('sidebar_3'); ?>
                </div>
                <!-- /advertisement__item-pic -->
                <footer>Advertisement</footer>
            </a>
            <!-- /advertisement__item -->
            <!-- advertisement__item -->
            <a href="#" class="advertisement__item">
                <!-- advertisement__item-pic -->
                <div class="advertisement__item-pic">
                    <?php emb_print_ad('sidebar_4'); ?>
                </div>
                <!-- /advertisement__item-pic -->
                <footer>Advertisement</footer>
            </a>
            <!-- /advertisement__item -->
        </div>
        <!-- /advertisement -->
    </div>
    <!-- /site__content-aside -->
</div>
<!-- /site__content-wrap -->
</div>
<!-- /reviews -->
</div>
<!-- /site__content -->

<?php
get_footer();
