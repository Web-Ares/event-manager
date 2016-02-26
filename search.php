<?php get_header(); ?>

<!-- site__content -->
<div class="site__content">
    <!-- reviews -->
    <div class="reviews reviews_channel">
        <header>
            <h1>
                <i class="fa fa-book"></i>
                <?php printf('Search Results for: %s', get_search_query()); ?>
            </h1>
        </header>
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
                        if ($wp_query->current_post == 0) {
                            break;
                        }
                    }
                }
                ?>
            </div>
            <!-- /site__content-forked -->
            <!-- connect-with -->
            <div class="connect-with">
                <!-- connect-with__wrap -->
                <div class="connect-with__wrap">
                    <header>
                        <i class="fa fa-hand-o-down"></i>
                        CONNECT WITH EVENT MB
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
                        <div href="<?php the_permalink(); ?>" class="card-review">
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
                    if ($wp_query->current_post == 0) {
                        break;
                    }
                }
                ?>
            <?php } ?>
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
