<?php
include get_template_directory() . '/classes/EMB_Walker_Nav_Menu.php';

// config

global $category_icons, $release_date, $default_post_image;

$category_icons     = array(
    1545 => 'book',
    1558 => 'flask',
    1552 => 'lightbulb-o',
    1564 => 'heart',
);
$category_colors    = array(
    1545 => '#f46c28',
    1558 => '#f8b033',
    1552 => '#55bbb5',
);
$category_channels  = array(1545, 1552, 1558);
$default_post_image = get_stylesheet_directory_uri() . '/img/eventmb-default-image.jpg';
$release_date       = '2015-09-23';

// adds metabox to pages and posts with a checklist

function emb_add_meta_boxes() {
    $screens = array('post', 'page');
    foreach ($screens as $screen) {
        add_meta_box('emb_blogging_checklist', __('Blogging Checklist', 'emb'), 'emb_blogging_checklist', $screen, 'side', 'high');
    }
}

add_action('add_meta_boxes', 'emb_add_meta_boxes');

function emb_blogging_checklist($post) {
    ?>
    <p>
        <span class="dashicons dashicons-yes"></span> add < h2 > for titles<br/>
        <span class="dashicons dashicons-yes"></span> edit Permalink (add - not _ )<br/>
        <span class="dashicons dashicons-yes"></span> picture must not be a screenshot of another picture<br/>
        <span class="dashicons dashicons-yes"></span> picture must be renamed before upload (es. 10-ideas-to-spice-up-your-holiday-event.jpg)<br/>
        <span class="dashicons dashicons-yes"></span> picture should always be max 550px - min 450px wide and max 350px tall<br/>
        <span class="dashicons dashicons-yes"></span> picture: Link to None, Full Size, Centered<br/>
        <span class="dashicons dashicons-yes"></span> add tags (as many as you want)<br/>
        <span class="dashicons dashicons-yes"></span> pick <b>one</b> category<br/>
        <span class="dashicons dashicons-yes"></span> select author at the bottom<br/>
        <span class="dashicons dashicons-yes"></span> Don't Capitalize URLs<br/>
    </p>
    <?php
}

// menus

function emb_init() {
    register_nav_menu('header-menu', __('Header Menu'));
    register_nav_menu('main-menu', __('Main Menu'));
    register_nav_menu('footer-menu', __('Footer Menu'));
}

add_action('init', 'emb_init');

add_filter('jpeg_quality', create_function('', 'return 100;'));

add_image_size('post-author-thumbnail', 138, 138, true);
add_image_size('post-author-featured', 150, 150, true);
add_image_size('post-author-mini', 50, 50, true);
add_image_size('post-featured', 550, 365, true);
add_image_size('post-menu', 222, 147);

/* function emb_nav_menu_css_class($classes, $item, $args, $depth){
  $classes[] = 'menu-desctop__item';
  return $classes;
  }

  add_filter('nav_menu_css_class', 'emb_nav_menu_css_class', 10, 4); */

// enqueues

function emb_wp_enqueue_scripts() {
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/css/swiper.css');
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css');
    wp_enqueue_style('jquery-ui-smoothness', 'https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/jquery-2.1.3.min.js', false, '2.1.3', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-nicescroll', get_stylesheet_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery'), false, true);
    wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/js/swiper.min.js', false, false, true);
    wp_enqueue_script('jquery-main', get_stylesheet_directory_uri() . '/js/jquery.main.js', array('jquery'), false, true);
    wp_enqueue_script('jquery-ui-tooltip');
    wp_enqueue_script('jquery-hoverIntent', get_stylesheet_directory_uri() . '/js/jquery.hoverIntent.minified.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'emb_wp_enqueue_scripts');

// actions and filters

function emb_body_class($classes) {
    global $release_date;

    if (is_single() && new DateTime(get_the_time('Y-m-j')) < new DateTime($release_date)) {
        $classes[] = 'old-post';
    }
    if (is_search()) {
        unset($classes[array_search('search', $classes)]);
    }
    return $classes;
}

add_filter('body_class', 'emb_body_class');

function emb_pre_get_posts($query) {
    $search_text  = filter_input(INPUT_GET, 'search');
    $tag_category = filter_input(INPUT_GET, 'category');

    if ($query->is_category() && $query->get('cat') == 1565) {
        $query->set('posts_per_page', 7);
    }
    if (isset($search_text) && strlen($search_text) > 0) {
        $query->set('s', $search_text);
    }
    if ($query->is_tag() && !empty($tag_category) && $tag_category == 'review') {
        $query->set('category__in', 1565);
    }
    if ($query->is_feed) {
        $query->set('cat', '-1564');
    }
}

add_action('pre_get_posts', 'emb_pre_get_posts');

function emb_wpcf7_form_class_attr($class) {
    $class .= ' media-kit__send';
    return $class;
}

add_filter('wpcf7_form_class_attr', 'emb_wpcf7_form_class_attr');

function emb_author_link($link, $author_id, $author_nicename) {
    $ret = $link;
    if (is_feed()) {
        global $post;
        $author_id = wpcf_pr_post_get_belongs($post->ID, 'post-author');
        $ret       = get_permalink($author_id);
    }
    return $ret;
}

add_filter('author_link', 'emb_author_link', 10, 3);

function emb_the_author($authordata) {
    $ret = $authordata;
    if (is_feed()) {
        global $post;
        $author_id = wpcf_pr_post_get_belongs($post->ID, 'post-author');
        $ret       = get_the_title($author_id);
    }
    return $ret;
}

add_filter('the_author', 'emb_the_author', 10, 1);

function emb_admin_menu() {
    add_options_page('Ads', 'Ads', 'manage_options', 'emb-options-ads', 'emb_options_ads');
}

add_action('admin_menu', 'emb_admin_menu');

function emb_options_ads() {
    $ads_option = get_option('emb_ads_tags', array());
    $action     = filter_input(INPUT_POST, 'action');
    if (!empty($action) && $action == 'save-ads') {
        $tags           = filter_input(INPUT_POST, 'tags');
        $header_desktop = filter_input(INPUT_POST, 'header-desktop');
        $header_tablet  = filter_input(INPUT_POST, 'header-tablet');
        $header_mobile  = filter_input(INPUT_POST, 'header-mobile');
        $sidebar_1      = filter_input(INPUT_POST, 'sidebar-1');
        $sidebar_2      = filter_input(INPUT_POST, 'sidebar-2');
        $sidebar_3      = filter_input(INPUT_POST, 'sidebar-3');
        $sidebar_4      = filter_input(INPUT_POST, 'sidebar-4');

        if ($tags) {
            $ads_option['tags'] = $tags;
        } else {
            $ads_option['tags'] = '';
        }

        if ($header_desktop) {
            $ads_option['header_desktop'] = $header_desktop;
        } else {
            $ads_option['header_desktop'] = '';
        }

        if ($header_tablet) {
            $ads_option['header_tablet'] = $header_tablet;
        } else {
            $ads_option['header_tablet'] = '';
        }

        if ($header_mobile) {
            $ads_option['header_mobile'] = $header_mobile;
        } else {
            $ads_option['header_mobile'] = '';
        }

        if ($sidebar_1) {
            $ads_option['sidebar_1'] = $sidebar_1;
        } else {
            $ads_option['sidebar_1'] = '';
        }

        if ($sidebar_2) {
            $ads_option['sidebar_2'] = $sidebar_2;
        } else {
            $ads_option['sidebar_2'] = '';
        }

        if ($sidebar_3) {
            $ads_option['sidebar_3'] = $sidebar_3;
        } else {
            $ads_option['sidebar_3'] = '';
        }

        if ($sidebar_4) {
            $ads_option['sidebar_4'] = $sidebar_4;
        } else {
            $ads_option['sidebar_4'] = '';
        }

        update_option('emb_ads_tags', $ads_option, true);
    }
    ?>
    <style type="text/css">
        textarea{margin: 0px; width: 500px; height: 200px;}
    </style>
    <div class="wrap">
        <h2>Ads</h2>
        <form action="" method="post">
            <ul>
                <li>
                    <strong>Tags</strong><br />
                    <textarea name="tags"><?php echo $ads_option['tags'] ? $ads_option['tags'] : ''; ?></textarea>
                </li>
                <li>
                    <strong>Header Desktop</strong><br />
                    <textarea name="header-desktop"><?php echo $ads_option['header_desktop'] ? $ads_option['header_desktop'] : ''; ?></textarea>
                </li>
                <li>
                    <strong>Header Tablet</strong><br />
                    <textarea name="header-tablet"><?php echo $ads_option['header_tablet'] ? $ads_option['header_tablet'] : ''; ?></textarea>
                </li>
                <li>
                    <strong>Header Mobile</strong><br />
                    <textarea name="header-mobile"><?php echo $ads_option['header_mobile'] ? $ads_option['header_mobile'] : ''; ?></textarea>
                </li>
                <li>
                    <strong>Sidebar 1</strong><br />
                    <textarea name="sidebar-1"><?php echo $ads_option['sidebar_1'] ? $ads_option['sidebar_1'] : ''; ?></textarea>
                </li>
                <li>
                    <strong>Sidebar 2</strong><br />
                    <textarea name="sidebar-2"><?php echo $ads_option['sidebar_2'] ? $ads_option['sidebar_2'] : ''; ?></textarea>
                </li>
                <li>
                    <strong>Sidebar 3</strong><br />
                    <textarea name="sidebar-3"><?php echo $ads_option['sidebar_3'] ? $ads_option['sidebar_3'] : ''; ?></textarea>
                </li>
                <li>
                    <strong>Sidebar 4</strong><br />
                    <textarea name="sidebar-4"><?php echo $ads_option['sidebar_4'] ? $ads_option['sidebar_4'] : ''; ?></textarea>
                </li>
            </ul>
            <input type="submit" value="Save" />
            <input type="hidden" name="action" value="save-ads" />
        </form>
    </div>
    <?php
}

// functions

function emb_get_post_top_parent_category_id($post_id) {
    $category = get_the_category($post_id);
    if (count($category) > 0) {
        $catTree     = get_category_parents($category[0]->term_id, false, ':', true);
        $topCategory = explode(':', $catTree);
        $ret         = get_category_by_slug($topCategory[0])->term_id;
    } else {
        $ret = 0;
    }
    return $ret;
}

function emb_wp_ajax_get_scroll_post() {
    global $post, $wp_query;

    $wp_query->is_single = true;
    $ret                 = '';
    $current_id          = filter_input(INPUT_GET, 'current_id');
    $post                = get_post($current_id);
    $previous_post       = get_previous_post(true);

    if ($previous_post) {
        $post_query = new WP_Query(array(
            'post__in' => array($previous_post->ID)
        ));
        if ($post_query->have_posts()) :
            $post_query->the_post();

            ob_start();
            get_template_part('content-single');
            $ret = ob_get_contents();
            ob_end_clean();
        endif;
    }

    echo json_encode($ret);
    die;
}

add_action('wp_ajax_get_scroll_post', 'emb_wp_ajax_get_scroll_post');
add_action('wp_ajax_nopriv_get_scroll_post', 'emb_wp_ajax_get_scroll_post');

function emb_wp_ajax_register_reaction() {
    $ret = '';
    if (is_user_logged_in()) {
        $current_id     = filter_input(INPUT_GET, 'current_id');
        $reaction       = filter_input(INPUT_GET, 'reaction');
        $user_id        = get_current_user_id();
        $user_reactions = get_user_meta($user_id, 'emb_user_reactions', true);
        if (empty($user_reactions)) {
            $user_reactions = array();
        }
        if (!isset($user_reactions[$current_id]) && !empty($current_id) && !empty($reaction)) {
            $reactions = wp_parse_args(get_post_meta($current_id, 'post-reactions', true), array(
                'agree'     => 0,
                'disagree'  => 0,
                'inspiring' => 0,
                'helpful'   => 0
            ));
            if (in_array($reaction, array_keys($reactions))) {
                $reactions[$reaction]        = intval($reactions[$reaction]) + 1;
                update_post_meta($current_id, 'post-reactions', $reactions);
                $user_reactions[$current_id] = 1;
                update_user_meta($user_id, 'emb_user_reactions', $user_reactions);
                $reactions['max']            = max($reactions);
                $ret                         = $reactions;
            }
        }
    }

    echo json_encode($ret);
    die;
}

add_action('wp_ajax_register_reaction', 'emb_wp_ajax_register_reaction');
add_action('wp_ajax_nopriv_register_reaction', 'emb_wp_ajax_register_reaction');

function emb_print_ad($id) {
    $ads_option = get_option('emb_ads_tags', array());
    echo $ads_option[$id];
}

function emb_admin_head() {
    global $typenow;
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    if (!in_array($typenow, array('post'))) {
        return;
    }
    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'emb_mce_external_plugins');
        add_filter('mce_buttons', 'emb_mce_buttons');
    }
}

add_action('admin_head', 'emb_admin_head');

function emb_mce_external_plugins($plugin_array) {
    $plugin_array['emb_social_title'] = get_stylesheet_directory_uri() . '/js/tinymce.plugin.socialtitle.js?' . rand();
    return $plugin_array;
}

function emb_mce_buttons($buttons) {
    array_push($buttons, 'emb_social_title');
    return $buttons;
}

function emb_social_title_shortcode($atts) {
    if (is_feed()) {
        return '<h2>' . strip_tags($atts['title']) . '</h2>';
    } else {
        return '<div class="single-post__topic-inner pw-widget" pw:url="' . get_permalink() . '" pw:title=" ' . trim(preg_replace('/\s\s+/', ' ', strip_tags($atts['title']))) . '">
                <h2>' . strip_tags($atts['title']) . '</h2>
                <div class="social-share">
                    <span>Share</span>
                    <a class="pw-button-twitter">
                        <span class="centering">
                            <span style="background: #20a7d4">
                                <i class="fa fa-twitter"></i>
                            </span>
                        </span>
                    </a>
                    <a class="pw-button-facebook">
                        <span class="centering">
                            <span style="background: #2e5793">
                                <i class="fa fa-facebook"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </div>';
    }
}

add_shortcode('emb_social_title', 'emb_social_title_shortcode');

function search_pre_get_posts($query) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_search) {
            if(!empty($_GET['webinar'])){
                $query->set('meta_key', 'wpcf-post-show-webinar');
                $query->set('meta_value', '1');
            }
        }
    }
}

add_action('pre_get_posts', 'search_pre_get_posts');

add_action('add_meta_boxes', 'st_add_meta_boxes_change_wp_types_title', 999);

function st_add_meta_boxes_change_wp_types_title() {
    global $wp_meta_boxes;

    $wp_meta_boxes['post']['normal']['default']['wpcf-post-relationship']['title'] = 'Select Author';
}

/*function emb_print_ad($id) {
    $ad = '';
    switch ($id) {
        case 'header-desktop':
            $ad = "<!-- /60287564/etouches_978x160 -->
<div id='div-gpt-ad-1443703924699-0' style='height:160px; width:978px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1443703924699-0'); });
</script>
</div>";
            break;
        case 'header-mobile':
            $ad = "<!-- /60287564/etouches_hero_mobile -->
<div id='div-gpt-ad-1443703924699-1' style='height:188px; width:347px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1443703924699-1'); });
</script>
</div>";
            break;
        case 'sidebar-1':
            $ad = "<!-- /60287564/etouches_1st_Jan_Dec_2015 -->
<div id='div-gpt-ad-1443703924699-2' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1443703924699-2'); });
</script>
</div>";
            break;
        case 'sidebar-2':
            $ad = "<!-- /60287564/Lanyon_Aug-Sept-Oct_2015 -->
<div id='div-gpt-ad-1443703924699-4' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1443703924699-4'); });
</script>
</div>";
            break;
        case 'sidebar-3':
            $ad = "<!-- /60287564/Glisser_July_2015 -->
<div id='div-gpt-ad-1443703924699-3' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1443703924699-3'); });
</script>
</div>";
            break;
        case 'sidebar-4':
            $ad = "<!-- /60287564/emshop_300-250_sidebar -->
<div id='div-gpt-ad-1443703924699-5' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1443703924699-5'); });
</script>
</div>";
            break;
    }
    echo $ad;
}*/

/*
$tempposts = get_posts(array(
    'nopaging'    => true,
    'post_status' => 'any'
        ));
foreach ($tempposts as $temppost) {
    switch ($temppost->post_author) {
        case '34':
            $id_author = 18;
            break;
        case '23':
            $id_author = 14;
            break;
        case '13':
        case '38':
            $id_author = 18095;
            break;
        case '33':
            $id_author = 15;
            break;
        case '26':
            $id_author = 12;
            break;
        case '29':
            $id_author = 21;
            break;
        case '4':
            $id_author = 18096;
            break;
        case '28':
            $id_author = 11;
            break;
        case '35':
            $id_author = 16;
            break;
        case '36':
            $id_author = 13;
            break;
        default:
            $id_author = 0;
    }

    if ($id_author > 0) {
        update_post_meta($temppost->ID, '_wpcf_belongs_post', $id_author);
        update_post_meta($temppost->ID, '_wpcf_belongs_post-author_id', $id_author);
    }
}*/

/* var_dump(get_post_meta(13175, '_wpcf_belongs_post-author_id', true));


  add_filter('wpt_field_options', 'add_some_options', 10, 3);

  function add_some_options($options, $title, $type) {
  echo 'test';
  var_dump($options);
  var_dump($title);
  var_dump($type);
  die;
  } */


/*$t_posts = get_posts(array(
    'nopaging'    => true,
    'post_status' => 'any'
        ));
foreach ($t_posts as $t_post) {
    $meta = get_post_meta($t_post->ID, '_wpcf_belongs_post', true);
    if(!empty($meta)){
        update_post_meta($t_post->ID, '_wpcf_belongs_post-author_id', $meta);
    }
}*/