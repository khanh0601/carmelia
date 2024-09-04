<?php

/**
 * @package Panicbear Studio
 */
/*
Plugin Name: Panicbear Studio - Plugin
Plugin URI: https://akismet.com/
Description: Front-end builder for WordPress.
Version: 0.1.2
Requires at least: 0.1
Requires PHP: 7.3.33
Author: nghaihoang9x.info
Author URI: http://nghaihoang9x.info
License: GPLv2 or later
Text Domain: nghaihoang9x
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

define('PANICBEAR_STUDIO_VERSION', '0.1');
define('PANICBEAR_STUDIO__PLUGIN_DIR', plugin_dir_path(__FILE__));


function panicbear_studio_plugin_setup()
{
    /*
     * Load additional block styles.
     */
    $styled_blocks = ['panicbear-studio'];
    foreach ($styled_blocks as $block_name) {
        $css_url = plugin_dir_url(__FILE__) . "assets/css/$block_name-style.min.css";
        wp_enqueue_style("panicbear/$block_name", $css_url);
        $js_url = plugin_dir_url(__FILE__) . "assets/js/$block_name-script.min.js";
        wp_enqueue_script('custom-plugin-js', $js_url, array('jquery'), null, true);
    }

    wp_localize_script('custom-plugin-js', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'panicbear_studio_plugin_setup');

//Load template from specific page
function panicbear_studio_page_template($page_template)
{

    if (get_page_template_slug() == 'blogs-template.php') {
        $page_template = PANICBEAR_STUDIO__PLUGIN_DIR . 'templates/blogs-template.php';
    }
    return $page_template;
}
add_filter('page_template', 'panicbear_studio_page_template');

/**
 * Add "Custom" template to page attirbute template section.
 */
function panicbear_studio_add_template_to_select($post_templates, $wp_theme, $post, $post_type)
{

    // Add custom template named template-custom.php to select dropdown 
    $post_templates['blogs-template.php'] = _e('Blogs Template', 'panicbear-plugin');

    return $post_templates;
}
add_filter('theme_page_templates', 'panicbear_studio_add_template_to_select', 10, 4);


// Wordpress create shortcode for plugin
function panicbear_studio_plugin_shortcode()
{
    ob_start();
    include PANICBEAR_STUDIO__PLUGIN_DIR . 'templates/blogs-sections.php';
    return ob_get_clean();
}
add_shortcode('panicbear_studio', 'panicbear_studio_plugin_shortcode');

// Wordpress create custom post template for plugin
function panicbear_studio_plugin_post_template($single_template)
{
    global $post;
    if ($post->post_type == 'post') {
        $single_template = PANICBEAR_STUDIO__PLUGIN_DIR . 'templates/single.php';
    }
    return $single_template;
}
add_filter('single_template', 'panicbear_studio_plugin_post_template');

// ajax load post by category id
function load_more_posts()
{
    
    $limit = 6;
    if(wp_is_mobile()){
        $limit = 3;
    }
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $limit,
        'paged' => 1,
        'post_status' => 'publish'
    );

    // get post by category id
    if (isset($_POST['category_id'])) {
        $args['cat'] = $_POST['category_id'];
    }

    // load post by search
    if (isset($_POST['search'])) {
        $args['s'] = $_POST['search'];
    }

    // load post by page
    if (isset($_POST['paged'])) {
        $args['paged'] = $_POST['paged'];
    }

    $query = new WP_Query($args);

    ob_start();

    // get total pages
    $total_pages = $query->max_num_pages;

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Output your post content here
?>
            <article class="blog-grid-item">
                <div class="blog-grid-item-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                </div>
                <div class="blog-grid-item-content">
                    <div class="blog-grid-item-meta">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) : ?>
                            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="blog-grid-item-category"><?php echo esc_html($categories[0]->name); ?></a>
                        <?php
                        endif;
                        ?>
                        <span class="blog-grid-item-divider"></span>
                        <span class="blog-grid-item-date">
                            <?php echo get_the_date(); ?>
                        </span>
                    </div>
                    <h2 class="blog-grid-item-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <p class="blog-grid-item-excerpt">
                        <?php
                        echo wp_trim_words(get_the_content(), 20, '...');
                        ?>
                    </p>
                </div>
            </article>
        <?php
        }
    }
    wp_reset_postdata();
    $response = ob_get_clean();

    ob_start();
    // render pagination
    if ($total_pages > 1) {
        ?>
        <li class="disabled" data-page="pre"><a href="javascipt:void(0);" class="pagination-pre"></a></li>
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="<?php echo $i == 1 ? 'active' : ''; ?>" data-page="<?php echo $i; ?>"><a href="javascipt:void(0);"><?php echo $i; ?></a></li>
        <?php endfor; ?>
        <li class="" data-page="next"><a href="javascipt:void(0);" class="pagination-next" data-page="next"></a></li>
<?php
    }
    $pagination = ob_get_clean();
    // return json response
    echo json_encode(array('status' => 'success', 'data' => $response, 'total_pages' => $total_pages, 'pagination' => $pagination));

    die();
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
