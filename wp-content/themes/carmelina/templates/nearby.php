<?php
/**
 * Template Name: Nearby Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="destination-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/destination_bg.jpg" srcset="'+get_template_directory_uri()+'/images/destination_bg-500.jpg 300w, '+get_template_directory_uri()+'/images/destination_bg-1000.jpg 768w,'+get_template_directory_uri()+'/images/destination_bg.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

$args = array(
    'post_type'   => 'nearby-post',
    'suppress_filters'=>0,
    'order'=> 'ASC',
    'posts_per_page'=>100,
);

$list_post = get_posts( $args );
?>
    <section class="page-content z-index-3" id="page-content">
        <div class="page-content__leaf-left-center"></div>
        <div class="page-content__tree-right-top hidden-xs"></div>
        <div class="container list-card-default-container">
            <div class="page-content-intro">
                <?php
                the_content();
                ?>
            </div>
            <?php if ( $list_post ) {?>
            <div class="list-card-default" data-arrow="list-card-default-arrow-1" data-dotted="list-card-default-dotted-1" data-info="list-card-defaut-info-1">

                <?php
                foreach ( $list_post as $key=>$post ) :
                    setup_postdata( $post );
                    $location = get_field('nearby_location', $post->ID);
                    ?>
                    <div class="card-default">
                        <div class="card-default-image"><?php the_post_thumbnail('medium_large');?></div>
                        <div class="card-default-info">
                            <div class="card-default-info-container">
                                <h3>
                                    <?php the_title();?>
                                </h3>
                                <div class="card-default-info-location"><strong><?php _e('Distance',TEXT_DOMAIN);?></strong> <?php echo $location ?></div>
                                <div class="card-default-info-description">
                                    <?php the_excerpt();?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>


            </div>
            <div class="list-card-default-info" id="list-card-defaut-info-1">
                <div class="list-card-default-info-container">
                </div>
            </div>
            <div class="list-card-default-nav">
                <div class="list-card-default-dotted" id="list-card-default-dotted-1"></div>
                <a class="list-card-default-nav-pre" id="list-card-default-arrow-1-pre"></a>
                <a class="list-card-default-nav-next" id="list-card-default-arrow-1-next"></a>
            </div>
            <?php  }?>
        </div>
    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');
get_footer();