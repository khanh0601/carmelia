<?php
/**
 * Template Name: Carreer Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="carreer-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/carreer-pagebg.jpg" srcset="'+get_template_directory_uri()+'/images/carreer-pagebg-500.jpg 300w, '+get_template_directory_uri()+'/images/carreer-pagebg-1000.jpg 768w,'+get_template_directory_uri()+'/images/carreer-pagebg.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

?>
    <section class="page-content" id="page-content">
        <div class="page-content__tree-left-top hidden-xs"></div>
        <div class="container">
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <div class="text-center fs1-125 top-space-3 bottom-space-4">
                        <?php
                            the_content();
                        ?>
                    </div>
                </div>
            </div>
            <?php
            $post_object = get_field('default_gallery');

            if( $post_object ):

                // override $post
                $post = $post_object;
                setup_postdata( $post );
                $images = get_field('gallery_image',$post->ID);

                if($images) :

                ?>
                <div class="gallery-default-container">
                    <div class="gallery-default">
                        <?php foreach( $images as $image ): ?>
                            <div>
                                <div class="gallery-default-item">
                                    <img src="<?php echo $image['url']; ?>"
                                         srcset="<?php echo $image['sizes']['medium']; ?> 320w,
                                                <?php echo $image['sizes']['medium_large']; ?> 640w,
                                                <?php echo $image['sizes']['large']; ?> 1280w,
                                                <?php echo $image['url']; ?> 1920w"
                                         sizes="(max-width: 640px) 100vw, 2000px"
                                         alt="<?php echo $image['alt']; ?>" />
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="gallery-default-nav">
                        <div class="gallery-default-dotted" id="gallery-default-dotted-1"></div>
                        <a class="gallery-default-nav-pre" id="gallery-default-arrow-1-pre"></a>
                        <a class="gallery-default-nav-next" id="gallery-default-arrow-1-next"></a>
                    </div>
                </div>

                <?php
                endif;
                    wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>

        </div>
    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');
get_footer();