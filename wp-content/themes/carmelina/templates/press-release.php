<?php
/**
 * Template Name: Press Release Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="press-release-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/press-release-headerbg.jpg" srcset="'+get_template_directory_uri()+'/images/press-release-headerbg-500.jpg 300w, '+get_template_directory_uri()+'/images/press-release-headerbg-1000.jpg 768w,'+get_template_directory_uri()+'/images/press-release-headerbg.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();


$args = array(
    'post_type'   => 'press-release-post',
    'suppress_filters'=>0,
    'order'=> 'DESC',
    'numberposts' => -1,
);

$press_release_post = get_posts( $args );

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
            <?php
            if ( $press_release_post ) {
                ?>
                <div class="list-card-news">
                    <?php
                    foreach ( $press_release_post as $key=>$post ) :
                        setup_postdata( $post );
                        $url = get_field('press_release_post_url', $post->ID);
                    ?>
                        <div class="card-news">
                            <div class="card-news-image"><?php the_post_thumbnail('medium_large');?></div>
                            <div class="card-news-info">
                                <div class="card-news-info-container">
                                    <h3>
                                        <?php the_title();?>
                                    </h3>
                                    <div class="card-news-info-date"><?php  echo get_the_date('d M Y'); ?></div>
                                    <div class="card-news-info-description">
                                        <?php the_excerpt();?>
                                    </div>
                                    <a href="<?php echo $url; ?>" target="_blank" class="btn-wave"><?php _e('Learn more',TEXT_DOMAIN); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>

                <div class="list-card-news-info">
                    <div class="list-card-news-info-container">
                        <h3>

                        </h3>
                        <div class="list-card-news-info-date"></div>
                        <div class="list-card-news-info-description">
                        </div>
                        <a href="#" target="_blank" class="btn-wave"><?php _e('Read more',TEXT_DOMAIN); ?></a>
                    </div>
                </div>

                <div class="list-card-news-nav">
                    <div class="list-card-news-dotted"></div>
                    <a class="list-card-news-nav-pre"></a>
                    <a class="list-card-news-nav-next"></a>
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