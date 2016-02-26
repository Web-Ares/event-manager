<?php get_header(); ?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <!-- site__content -->
        <div class="site__content single-post single-post_legacy">
            <!-- site__content-wrap -->
            <div class="site__content-wrap">
                <!-- site__content-inner -->
                <div class="site__content-inner">
                    <?php //<i class="fa fa-refresh fa-spin"></i> ?>
                    <?php get_template_part('content-single'); ?>

                    <?php
                    $related_query = new WP_Query(array(
                        'category__in'   => wp_get_post_categories($post->ID),
                        'post__not_in'   => array($post->ID),
                        'posts_per_page' => 3,
                        'meta_key'       => '_msp_total_shares',
                        'orderby'        => 'meta_value_num',
                        'order' => 'DESC'));
                    if ($related_query->have_posts()) {
                        ?>
                        <!-- related -->
                        <div class="related">
                            <h2><i class="fa fa-inbox"></i>RELATED</h2>
                            <!-- related__items -->
                            <div class = "related__items">
                                <?php
                                while ($related_query->have_posts()) {
                                    $related_query->the_post();
                                    $thumbnail_id       = get_post_thumbnail_id(get_the_ID());
                                    $featured_image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image;
                                    $top_category_id    = emb_get_post_top_parent_category_id(get_the_ID());
                                    $author_id          = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
                                    $author_url         = '';
                                    if (types_render_field('post-author-active', array("post_id" => $author_id, "output" => "raw")) == "1") {
                                        $author_url = get_permalink($author_id);
                                    }
                                    ?>
                                    <!-- related__item -->
                                    <div class = "related__item">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image_url; ?>" width="198" height="131" alt="<?php the_title(); ?>" /></a>
                                        <!-- related__head -->
                                        <div class="related__head">
                                            <a href="<?php echo $author_url; ?>">
                                                <!-- related__avatar -->
                                                <div class="related__avatar">
                                                    <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($author_id), 'post-author-thumbnail')[0]; ?>" width="21" height="21" alt="">
                                                </div>
                                                <!-- /related__avatar -->
                                                <p><span>By</span> <?php echo get_the_title($author_id); ?></p>
                                            </a>
                                            <span class="related__bulb"><i class="fa fa-<?php echo $category_icons[$top_category_id]; ?>"></i></span>
                                        </div>
                                        <!-- /related__head -->
                                        <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                    </div>
                                    <!-- /related__item -->
                                <?php } ?>
                            </div>
                            <!-- /related__items -->
                        </div>
                        <!-- /related -->
                    <?php } ?>
                </div>
                <!-- /site__content-inner -->
                <!-- site__content-aside -->
                <aside class="site__content-aside">
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
                </aside>
                <!-- /site__content-aside -->
            </div>
            <!-- /site__content-wrap -->
            <!-- connect-event -->
            <div class="connect-event">
                <div>
                    <h2><i class="fa fa-hand-o-down"></i>Don't miss another article!</h2>
                    <!-- connect-social -->
                    <div class="connect-social">
                        <a href="https://twitter.com/EventMB" class="twitter-follow-button connect__twitter" data-show-count="false">Follow @EventMB</a>
                        <script>!function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = p + '://platform.twitter.com/widgets.js';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, 'script', 'twitter-wjs');</script>
                        <div class="fb-like connect__facebook" data-href="https://www.facebook.com/EventManagerBlog" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
                    </div>
                    <!-- /connect-social -->
                    <form action="//eventmanagerblog.us11.list-manage.com/subscribe/post?u=c480f324793364ec1d982cad3&amp;id=c297bc4951" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate connect-with__subscribe" target="_blank" novalidate>
                        <div>
                            <i class="fa fa-envelope"></i>
                            <input type="email" name="EMAIL" placeholder="Enter Email" class="required email" required />
                            <div style="position: absolute; left: -5000px;"><input type="text" name="b_c480f324793364ec1d982cad3_c297bc4951" tabindex="-1" value=""></div>
                        </div>
                        <button type="submit" name="subscribe"><span>Subscribe</span></button>
                    </form>
                </div>
            </div>
            <!-- /connect-event -->
        </div>
        <!-- /site__content -->
        <?php
    }
}
?>
<?php
get_footer();
