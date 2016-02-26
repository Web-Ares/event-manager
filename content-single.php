<?php
global $release_date, $category_icons, $default_post_image;
$thumbnail_id       = get_post_thumbnail_id(get_the_ID());
$featured_image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $default_post_image;
$top_category_id    = emb_get_post_top_parent_category_id(get_the_ID());
$tags               = get_the_tags();
$author_id          = wpcf_pr_post_get_belongs(get_the_ID(), 'post-author');
$reactions          = wp_parse_args(get_post_meta(get_the_ID(), 'post-reactions', true), array(
    'agree'     => 0,
    'disagree'  => 0,
    'inspiring' => 0,
    'helpful'   => 0
        ));
$max_reactions      = max($reactions);
$sponsored = types_render_field('post-sponsored', array('output' => 'raw'));
$author_box_link = ($sponsored == 1) ? types_render_field('post-sponsor-link', array('output' => 'raw')) : get_permalink($author_id);
?>
<!-- single-post__theme -->
<div class="single-post__theme" data-id="<?php the_ID(); ?>" data-url="<?php echo parse_url(get_permalink(get_the_ID()))['path']; ?>">
    <?php
    $post_date          = new DateTime(get_the_time('Y-m-j'));
    if (new DateTime(get_the_time('Y-m-j')) > new DateTime($release_date)) {
        ?>
        <!-- site__content-head -->
        <div class="site__content-head">
            <?php if (!empty($featured_image_url)) { ?>
                <img src="<?php echo $featured_image_url; ?>" alt="<?php the_title(); ?>" />
            <?php } ?>
        </div>
        <!-- /site__content-head -->
    <?php } ?>
    <!-- site__content-forked -->
    <div class="site__content-forked">
        <!-- site__content-title -->
        <h1 class="site__content-title">
            <?php the_title(); ?>
        </h1>
        <!-- /site__content-title -->
        <!-- single-post__topic -->
        <div class="single-post__topic">
            <header>
                <time datetime="<?php the_time('Y-m-j'); ?>"><?php the_time('F j, Y'); ?></time>
                <div>
                    <i class="fa fa-<?php echo $category_icons[$top_category_id]; ?>"></i>
                    <a href="<?php echo get_category_link($top_category_id); ?>"><?php echo get_cat_name($top_category_id); ?></a>
                    <span>
                        <a href="#footer-tags" title="See Tags"><i class="fa fa-tag"></i></a>
                    </span>
                </div>
            </header>
            <!-- single-post__topic-wrap -->
            <div class="single-post__topic-wrap">
                <!-- social-networks -->
                <div class="pw-widget social-networks" pw:url="<?php the_permalink(); ?>" pw:title="<?php the_title(); ?>">
                    <a class="pw-button-facebook">
                        <b class="pw-box-counter hidden" data-channel="facebook"></b>
                        <span class="centering">
                            <span style="background: #2e5793">
                                <i class="fa fa-facebook"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-twitter">
                        <b class="pw-box-counter hidden" data-channel="twitter"></b>
                        <span class="centering">
                            <span style="background: #2e5793">
                                <i class="fa fa-twitter"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-linkedin">
                        <b class="pw-box-counter hidden" data-channel="linkedin"></b>
                        <span class="centering">
                            <span style="background: #086b9d">
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-googleplus">
                        <b class="pw-box-counter hidden" data-channel="googleplus"></b>
                        <span class="centering">
                            <span style="background: #d14120">
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-pinterest" pw:image="<?php echo get_post_meta($post->ID, 'pinterest_url', true); ?>">
                        <b class="pw-box-counter hidden" data-channel="pinterest"></b>
                        <span class="centering">
                            <span style="background: #d14120">
                                <i class="fa fa-pinterest"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-whatsapp">
                        <b class="pw-box-counter hidden" data-channel="whatsapp"></b>
                        <span class="centering">
                            <span style="background: #34af23">
                                <i class="fa fa-whatsapp"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-email">
                        <b class="pw-box-counter hidden" data-channel="email"></b>
                        <span class="centering">
                            <span style="background: #d14120">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-sms">
                        <b class="pw-box-counter hidden" data-channel="sms"></b>
                        <span class="centering">
                            <span style="background: #34af23">
                                <i class="fa fa-mobile"></i>
                            </span>
                        </span>
                    </a>
                    <span class="social-networks__total">
                        <span class="centering">
                            <span><b class="pw-box-counter" data-channel="post"></b></span>
                        </span>
                    </span>
                </div>
                <!-- /social-networks -->
                <!-- single-post__topic-inner -->
                <div class="single-post__topic-inner">
                    <?php the_content(); ?>
                </div>
                <!-- /single-post__topic-inner -->
                <!-- social-networks -->
                <div class="pw-widget social-networks" pw:url="<?php the_permalink(); ?>" pw:title="<?php the_title(); ?>">
                    <a class="pw-button-facebook">
                        <b class="pw-box-counter hidden" data-channel="facebook"></b>
                        <span class="centering">
                            <span style="background: #2e5793">
                                <i class="fa fa-facebook"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-twitter">
                        <b class="pw-box-counter hidden" data-channel="twitter"></b>
                        <span class="centering">
                            <span style="background: #2e5793">
                                <i class="fa fa-twitter"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-linkedin">
                        <b class="pw-box-counter hidden" data-channel="linkedin"></b>
                        <span class="centering">
                            <span style="background: #086b9d">
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-googleplus">
                        <b class="pw-box-counter hidden" data-channel="googleplus"></b>
                        <span class="centering">
                            <span style="background: #d14120">
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-pinterest" pw:image="<?php echo get_post_meta($post->ID, 'pinterest_url', true); ?>">
                        <b class="pw-box-counter hidden" data-channel="pinterest"></b>
                        <span class="centering">
                            <span style="background: #d14120">
                                <i class="fa fa-pinterest"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-whatsapp">
                        <b class="pw-box-counter hidden" data-channel="whatsapp"></b>
                        <span class="centering">
                            <span style="background: #34af23">
                                <i class="fa fa-whatsapp"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-email">
                        <b class="pw-box-counter hidden" data-channel="email"></b>
                        <span class="centering">
                            <span style="background: #d14120">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-sms">
                        <b class="pw-box-counter hidden" data-channel="sms"></b>
                        <span class="centering">
                            <span style="background: #34af23">
                                <i class="fa fa-mobile"></i>
                            </span>
                        </span>
                    </a>
                    <span class="social-networks__total">
                        <span class="centering">
                            <span><b class="pw-box-counter" data-channel="post"></b></span>
                        </span>
                    </span>
                </div>
                <!-- /social-networks -->
            </div>
            <!-- /single-post__topic-wrap -->
        </div>
        <!-- /single-post__topic -->
    </div>
    <!-- /site__content-forked -->
    <?php if (false) { //if (types_render_field('post-sponsored', array('output' => 'raw')) != 1 && $top_category_id != 1565) { ?>
        <!-- your-reaction -->
        <div class="your-reaction">
            <header>Your Reaction</header>
            <!-- your-reaction__wrap -->
            <div class="your-reaction__wrap">
                <!-- your-reaction__level -->
                <div class="your-reaction__level">
                    <a href="#" class="btn btn_black popup__open" data-id="<?php the_ID(); ?>" <?php echo!is_user_logged_in() ? 'data-popup="login-FB"' : ''; ?> data-reaction="agree"><i class="fa fa-thumbs-up"></i></a>
                    <div class="your-reaction__index" data-index="<?php echo $max_reactions > 0 ? $reactions['agree'] * 100 / $max_reactions : 0; ?>">
                        <span class="your-reaction__index-mobile"></span>
                        <span class="your-reaction__index-tablet"></span>
                        <span class="your-reaction__index-value"><?php echo $reactions['agree']; ?></span>
                    </div>
                </div>
                <!-- /your-reaction__level -->
                <!-- your-reaction__level -->
                <div class="your-reaction__level">
                    <a href="#" class="btn btn_black popup__open" data-id="<?php the_ID(); ?>" <?php echo!is_user_logged_in() ? 'data-popup="login-FB"' : ''; ?> data-reaction="disagree"><i class="fa fa-thumbs-down"></i></a>
                    <div class="your-reaction__index" data-index="<?php echo $max_reactions > 0 ? $reactions['disagree'] * 100 / $max_reactions : 0; ?>">
                        <span class="your-reaction__index-mobile"></span>
                        <span class="your-reaction__index-tablet"></span>
                        <span class="your-reaction__index-value"><?php echo $reactions['disagree']; ?></span>
                    </div>
                </div>
                <!-- /your-reaction__level -->
                <!-- your-reaction__level -->
                <div class="your-reaction__level">
                    <a href="#" class="btn btn_black popup__open" data-id="<?php the_ID(); ?>" <?php echo!is_user_logged_in() ? 'data-popup="login-FB"' : ''; ?> data-reaction="inspiring">Inspiring</a>
                    <div class="your-reaction__index" data-index="<?php echo $max_reactions > 0 ? $reactions['inspiring'] * 100 / $max_reactions : 0; ?>">
                        <span class="your-reaction__index-mobile"></span>
                        <span class="your-reaction__index-tablet"></span>
                        <span class="your-reaction__index-value"><?php echo $reactions['inspiring']; ?></span>
                    </div>
                </div>
                <!-- /your-reaction__level -->
                <!-- your-reaction__level -->
                <div class="your-reaction__level">
                    <a href="#" class="btn btn_black popup__open" data-id="<?php the_ID(); ?>" <?php echo!is_user_logged_in() ? 'data-popup="login-FB"' : ''; ?> data-reaction="helpful">Helpful</a>
                    <div class="your-reaction__index" data-index="<?php echo $max_reactions > 0 ? $reactions['helpful'] * 100 / $max_reactions : 0; ?>">
                        <span class="your-reaction__index-mobile"></span>
                        <span class="your-reaction__index-tablet"></span>
                        <span class="your-reaction__index-value"><?php echo $reactions['helpful']; ?></span>
                    </div>
                </div>
                <!-- /your-reaction__level -->
            </div>
            <!-- /your-reaction__wrap -->
        </div>
        <!-- /your-reaction -->
    <?php } ?>
    <!-- about-author -->
    <div class="about-author">
        <header><a href="<?php echo $author_box_link; ?>">About The Author</a></header>
        <!-- about-author__wrap -->
        <div class="about-author__wrap">
            <a href="<?php echo $author_box_link; ?>" class="about-author__pic">
                <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($author_id), 'post-author-thumbnail')[0]; ?>" width="110" height="110" alt="<?php echo get_the_title($author_id); ?>"/>
            </a>
            <div class="about-author__inner">
                <?php echo get_post_field('post_content', $author_id); ?>
            </div>
        </div>
        <!-- /about-author__wrap -->
        <div id="footer-tags"></div>
    </div>
    <!-- /about-author -->

    <!-- controls-btn -->
    <div class="controls-btn">
        <i class="fa fa-tag"></i>
        <?php
        if ($tags) {
            foreach ($tags as $tag) {
                ?>
                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="btn btn_black"><?php echo $tag->name; ?></a>
                <?php
            }
        }
        ?>
    </div>
    <!-- /controls-btn -->
    <!-- comments -->
    <div class="comments">
        <header>
            <i class="fa fa-angle-down"></i>
            <a href="<?php echo home_url('comment-policy'); ?>" class="btn btn_black">Comment Policy</a>
            <a href="#" class="comments-title">Comments</a>
        </header>
        <!-- comments__wrap -->
        <div class="comments__wrap" style="display:none;">
            <?php comments_template('', true); ?>
        </div>
        <!-- /comments__wrap -->
    </div>
    <!-- /comments -->

    <!-- social-networks -->
    <div class="pw-widget social-networks social-networks_fixed" pw:url="<?php the_permalink(); ?>" pw:title="<?php the_title(); ?>">
        <div>
            <a class="pw-button-facebook">
                <b class="pw-box-counter hidden" data-channel="facebook"></b>
                <span class="centering">
                    <span style="background: #2e5793">
                        <i class="fa fa-facebook"></i>
                    </span>
                </span>
            </a>
            <a class="pw-button-twitter">
                <b class="pw-box-counter hidden" data-channel="twitter"></b>
                <span class="centering">
                    <span style="background: #2e5793">
                        <i class="fa fa-twitter"></i>
                    </span>
                </span>
            </a>
            <a class="pw-button-linkedin">
                <b class="pw-box-counter hidden" data-channel="linkedin"></b>
                <span class="centering">
                    <span style="background: #086b9d">
                        <i class="fa fa-linkedin"></i>
                    </span>
                </span>
            </a>
            <a class="pw-button-googleplus">
                <b class="pw-box-counter hidden" data-channel="googleplus"></b>
                <span class="centering">
                    <span style="background: #d14120">
                        <i class="fa fa-google-plus"></i>
                    </span>
                </span>
            </a>
            <a class="pw-button-pinterest" pw:image="<?php echo get_post_meta($post->ID, 'pinterest_url', true); ?>">
                <b class="pw-box-counter hidden" data-channel="pinterest"></b>
                <span class="centering">
                    <span style="background: #d14120">
                        <i class="fa fa-pinterest"></i>
                    </span>
                </span>
            </a>
            <a class="pw-button-whatsapp">
                <b class="pw-box-counter hidden" data-channel="whatsapp"></b>
                <span class="centering">
                    <span style="background: #34af23">
                        <i class="fa fa-whatsapp"></i>
                    </span>
                </span>
            </a>
            <a class="pw-button-email">
                <b class="pw-box-counter hidden" data-channel="email"></b>
                <span class="centering">
                    <span style="background: #d14120">
                        <i class="fa fa-envelope"></i>
                    </span>
                </span>
            </a>
            <a class="pw-button-sms">
                <b class="pw-box-counter hidden" data-channel="sms"></b>
                <span class="centering">
                    <span style="background: #34af23">
                        <i class="fa fa-mobile"></i>
                    </span>
                </span>
            </a>
        </div>
    </div>
    <!-- /social-networks -->

</div>
<!-- /single-post__theme -->