<?php
/**
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="about-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/homepage-header-desktop.jpg" srcset="'+get_template_directory_uri()+'/images/homepage-header-desktop-500.jpg 300w, '+get_template_directory_uri()+'/images/homepage-header-desktop-1000.jpg 768w,'+get_template_directory_uri()+'/images/homepage-header-desktop.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

$args = array(
    'numberposts' => 100,
    'post_type'   => 'about-post',
    'suppress_filters'=>0,
    'order'=> 'ASC',
);

$all_about = get_posts( $args );

?>
    <section class="page-content bottom-space-7" id="page-content">
        <div class="page-content__tree-right-top"></div>
        <div class="page-content__leaf-left-center hidden-xs"></div>
        <div class="container">
            <div class="about-intro">
                <div class="about-intro-content">
                    <h2 class="about-intro-title"><?php _e('The Resort',TEXT_DOMAIN);?></h2>
                    <div class="about-intro-description">
                        <?php
                            the_content();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
            if ( $all_about ) {
                ?>
            <div class="about-timeline">
            <?php
                foreach ( $all_about as $key=>$post ) :
                    setup_postdata( $post ); ?>

                    <div class="about-timeline-container">
                        <div class="about-timeline-content">
                            <h2><?php the_title();?></h2>
                            <div><?php the_content();?></div>
                        </div>
                        <div class="about-timeline-image">
                            <div class="about-timeline-image-wrap">
                                <?php the_post_thumbnail('medium');?>
                                <div class="about-timeline-dotted"></div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
                <?php
            }
            ?>
        </div>
    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');
get_footer();