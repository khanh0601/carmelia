<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="experience-detail-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/private-beach.jpg" srcset="'+get_template_directory_uri()+'/images/private-beach-500.jpg 300w, '+get_template_directory_uri()+'/images/private-beach-1000.jpg 768w,'+get_template_directory_uri()+'/images/private-beach.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

?>
    <section class="page-content" id="page-content">
        <div class="page-content__leaf-left-center"></div>
        <div class="page-content__tree-right-top hidden-xs"></div>
        <div class="container">
            <div class="page-content-intro">
                <?php the_content();?>
            </div>
        </div>
        <?php
        // check if the repeater field has rows of data
        if( have_rows('experience_repeater') ):
            ?>
        <div class="container list-card-default-container">
            <div class="list-card-default" data-arrow="list-card-default-arrow-1" data-dotted="list-card-default-dotted-1" data-info="list-card-defaut-info-1">
                <?php
                // loop through the rows of data
                while ( have_rows('experience_repeater') ) : the_row();
                    ?>
                    <div class="card-default">
                        <div class="card-default-image">
                            <?php
                                $image_post = get_sub_field('experience_repeater_image');
                                echo wp_get_attachment_image($image_post, 'large');
                            ?>
                        </div>
                        <div class="card-default-info">
                            <div class="card-default-info-container">
                                <h3><?php the_sub_field('experience_repeater_title');?></h3>
                            <?php
                            // check if the repeater field has rows of data
                            if( have_rows('experience_repeater_attr') ):
                                ?>
                                    <div class="card-default-info-grid">
                                        <?php
                                        // loop through the rows of data
                                        while ( have_rows('experience_repeater_attr') ) : the_row();
                                            ?>
                                                <div class="card-default-info-location"><strong><?php the_sub_field('experience_repeater_attr_label'); ?></strong><?php the_sub_field('experience_repeater_attr_text'); ?></div>
                                        <?php
                                        endwhile;
                                        ?>
                                    </div>
                            <?php
                            endif;

                            $class= "";
                            if(get_sub_field('experience_repeater_url')) $class = "bottom-space-1";
                            ?>
                                <div class="card-default-info-description <?php echo $class;?>">
                                    <?php the_sub_field('experience_repeater_content'); ?>
                                </div>
                                <?php if(get_sub_field('experience_repeater_url')){
                                   ?>
                                    <a target="_blank" href="<?php the_sub_field('experience_repeater_url'); ?>" class="btn-readmore"><?php _e('Price List',TEXT_DOMAIN);?></a>
                                <?php
                                }?>

                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
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
        </div>
        <?php
        endif;
        ?>

        <div class="container">
        <?php
        $images = get_field('gallery_image',$post->ID);

        if( $images ):
            ?>
            <div class="gallery-default-container top-space-6">
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
        <?php endif; ?>


<?php
// check if the repeater field has rows of data
    $post_object = get_field('related_experience_item');
    if( $post_object ):
    ?>
            <div class="related-list-container top-space-5-75 bottom-space-6">
                <h2><?php
                        _e('Other Experiences',TEXT_DOMAIN)
                    ?></h2>
                <div class="related-list">
                    <?php
                    foreach ( $post_object as $key=>$post ) :
                        setup_postdata( $post );
                        ?>
                        <div>
                            <div class="related-item"><a href="<?php the_permalink()?>"><?php the_post_thumbnail('medium');?><span><?php the_title();?></span></a></div>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
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