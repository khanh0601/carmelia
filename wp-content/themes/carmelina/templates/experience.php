<?php
/**
 * Template Name: Experience Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="experience-list-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/experience-list.jpg" srcset="'+get_template_directory_uri()+'/images/experience-list-500.jpg 300w, '+get_template_directory_uri()+'/images/experience-list-1000.jpg 768w,'+get_template_directory_uri()+'/images/experience-list.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

$args = array(
    'numberposts' => -1,
    'post_type'   => 'experience-post',
    'suppress_filters'=>0,
    'order'=> 'ASC',
);

$list_post= get_posts( $args );

?>
    <section class="page-content" id="page-content">
        <div class="page-content__leaf-left-center"></div>
        <div class="page-content__tree-right-top hidden-xs"></div>
        <div class="container">
            <div class="page-content-intro">
                <?php the_content();?>
            </div>
            <?php
            // check if the repeater field has rows of data
            if( $list_post ):
                ?>
                <div class="experience-list bottom-space-6">
                    <?php
                    foreach ( $list_post as $key=>$post ) :
                        setup_postdata( $post );
                        ?>
                        <div class="experience-list-item">
                            <a href="<?php the_permalink()?>" target="_parent">
                                <?php the_post_thumbnail('medium_large');?>
                                <span class="experience-list-item-description"><?php the_title();?></span>
                                <div class="experience-list-item-readmore"><button class="btn-readmore"><?php _e('Discover more',TEXT_DOMAIN);?></button></div>
                            </a>
                        </div>

                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php
            endif;
            ?>

        </div>
    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');
get_footer();