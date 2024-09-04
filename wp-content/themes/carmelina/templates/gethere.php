<?php
/**
 * Template Name: Get here Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="getting-here-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/getting-here.jpg" srcset="'+get_template_directory_uri()+'/images/getting-here-500.jpg 300w, '+get_template_directory_uri()+'/images/getting-here-1000.jpg 768w,'+get_template_directory_uri()+'/images/getting-here.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();


$terms = get_terms(array('taxonomy'=>'gethere_category','order' => 'DESC'));
//$list_post = array();
foreach ( $terms as $term ) {
    $list_post[$term->slug] = get_posts(
            array(
                'posts_per_page' => -1,
                'post_type' => 'gethere-post',
                'suppress_filters'=>0,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'gethere_category',
                        'field' => 'slug',
                        'terms' => $term->slug
                    )
                ))
    );
}

?>


    <section class="page-content" id="page-content">
        <div class="page-content__leaf-left-center"></div>
        <div class="page-content__tree-right-top hidden-xs"></div>
        <div class="container">
            <div class="page-content-intro">
                <?php
                the_content();
                ?>
            </div>
            <div class="text-center bottom-space-5"><a href="<?php the_field('get_here_page_map_direction');?>" class="btn-wave btn-2x scroll"><?php _e('Map & Directions',TEXT_DOMAIN);?></a></div>
        </div>
        <?php
            foreach ($terms as $term)
            {
        ?>
                <div class="container">
                    <h2><?php echo $term->name;?></h2>
                </div>
                <div class="container list-card-default-container">
                    <div class="list-card-default"  data-arrow="list-card-default-arrow-<?php echo $term->slug?>" data-dotted="list-card-default-dotted-<?php echo $term->slug?>" data-info="list-card-defaut-info-<?php echo $term->slug?>">
                <?php
                foreach ($list_post[$term->slug] as $key => $post)
                {
                    setup_postdata( $post );

                    ?>

                        <div class="card-default">
                            <div class="card-default-image"><?php the_post_thumbnail('medium_large');?></div>
                            <div class="card-default-info">
                                <div class="card-default-info-container">
                                    <h3>
                                        <?php the_title();?>
                                    </h3>
                                    <?php
                                     // check if the repeater field has rows of data
                                    if( have_rows('get_here_detail') ):
                                        ?>
                                    <ul>
                                        <?php
                                        // loop through the rows of data
                                        while ( have_rows('get_here_detail') ) : the_row();
                                        ?>
                                        <li><strong><?php the_sub_field('get_here_label'); ?>:</strong> <?php the_sub_field('get_here_text'); ?></li>
                                        <?php
                                        endwhile;
                                        ?>
                                    </ul>
                                        <?php
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                wp_reset_postdata();

                ?>
                    </div>
                    <div class="list-card-default-info" id="list-card-defaut-info-<?php echo $term->slug?>">
                        <div class="list-card-default-info-container">
                        </div>
                    </div>
                    <div class="list-card-default-nav">
                        <div class="list-card-default-dotted" id="list-card-default-dotted-<?php echo $term->slug?>"></div>
                        <a class="list-card-default-nav-pre" id="list-card-default-arrow-<?php echo $term->slug?>-pre"></a>
                        <a class="list-card-default-nav-next" id="list-card-default-arrow-<?php echo $term->slug?>-next"></a>
                    </div>
                </div>
                <div class="container top-space-2 bottom-space-4">
                    <div class="page-content-note">
                        <?php echo nl2br($term->description);?>
                    </div>
                </div>
        <?php
            }
        ?>

        <div class="container bottom-space-6">
            <div class="row">
                <div class="col m12">
                    <p class="text-center page-content-paragraph">
                        <?php
                        global $global_settings;
                        $phone = $global_settings['theme_setting_header_phone'];
                        $link_number = preg_replace('/[^0-9]/', '', $phone);
                        $email = $global_settings['theme_setting_sale_hcm_email'];

                        echo sprintf(__('Please contact us for more information or to make a reservation via phone <a href="tel:%s" class="phone">%s</a> <br/> or email (<a href="mailto:%s" class="email">%s</a>).',TEXT_DOMAIN),$link_number,$phone,$email,$email);
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');
get_footer();