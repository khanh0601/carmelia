<?php
/**
 * Template Name: Dining Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="dining-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/diningpage.jpg" srcset="'+get_template_directory_uri()+'/images/diningpage-500.jpg 300w, '+get_template_directory_uri()+'/images/diningpage-1000.jpg 768w,'+get_template_directory_uri()+'/images/diningpage.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

$args = array(
    'numberposts' => -1,
    'post_type'   => 'dining-menu-post',
    'suppress_filters'=>0,
    'order'=> 'DESC',
);

$list_post_menu = get_posts( $args );

$args = array(
    'numberposts' => -1,
    'post_type'   => 'dining-place-post',
    'suppress_filters'=>0,
    'order'=> 'DESC',
);

$list_post_place = get_posts( $args );
?>
    <section class="page-content bottom-space-7" id="page-content">
        <div class="page-content__tree-left-top"></div>
        <div class="page-content__leaf-left-center"></div>

        <div class="dining-intro-container">
            <div class="back-text"><?php _e('Carmelina', TEXT_DOMAIN);?></div>
            <div class="dining-intro">
                <div class="dining-intro-content" id="dining-intro-content">
                    <h2 class="dining-intro-title"><?php the_field('dining_page_subtitle') ?></h2>
                    <div class="dining-intro-description"><?php the_content()?></div>
                </div>
            </div>
        </div>
        <?php if ( $list_post_menu ) {?>

            <div class="food-menu-container">
                <div class="saobien"></div>
                <div class="saobiennho"></div>
                <div class="food-menu">
                    <?php
                    foreach ( $list_post_menu as $key=>$post ) :
                        setup_postdata( $post );
                        ?>
                        <div class="food-menu-item">
                            <div class="food-menu-item-container">
                                <div class="container">
                                    <div class="food-menu-item-content">
                                        <div><?php the_post_thumbnail();?></div>
                                        <div>
                                            <div class="food-menu-item-content-paragraph">
                                                <h3 class="text-center"><?php the_title();?></h3>
                                                <h4 class="text-center"><?php the_field('dining_menu_subtitle');?></h4>
                                                <div class="text-center fs1-125"><?php the_content();?></div>
                                                <p class="text-center top-space-2">
                                                    <a href="<?php the_field('dining_menu_url');?>" class="btn-wave btn-2x"><?php _e('VIEW MENU', TEXT_DOMAIN);?></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php  }?>


        <?php if ( $list_post_place ) {?>

            <div class="container list-card-default-container bottom-space-5 top-space-5">
                <div class="list-card-default" data-arrow="list-card-default-arrow-1" data-dotted="list-card-default-dotted-1" data-info="list-card-defaut-info-1">
                    <?php
                    foreach ( $list_post_place as $key=>$post ) :
                        setup_postdata( $post );
                        ?>
                        <div class="card-default">
                            <div class="card-default-image"><?php the_post_thumbnail('medium_large');?></div>
                            <div class="card-default-info">
                                <div class="card-default-info-container">
                                    <h3>
                                        <?php the_title();?>
                                    </h3>
                                    <div class="card-default-info-grid">
                                        <div class="card-default-info-location"><strong><?php _e('Open', TEXT_DOMAIN);?></strong><?php the_field('dining_place_open');?></div>
                                    </div>
                                    <div class="card-default-info-description">
                                        <?php the_content();?>
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
            </div>

        <?php  }?>



            <?php
            $post_object = get_field('default_gallery');

            if( $post_object ):
                ?>
                <div class="container bottom-space-5">
            <?php

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
                </div>
            <?php endif; ?>

        <?php
        $post_object = get_field('dining_restaurant_spacing');

        if( $post_object ):
            // override $post
            $post = $post_object;
            setup_postdata( $post );
            $images = get_field('gallery_image',$post->ID);
            ?>

            <div class="gallery-grid container">
                <div class="row">
                    <div class="col s12 m8 offset-m2 text-center">
                        <h3><?php _e('Dining', TEXT_DOMAIN);?></h3>
                        <h4><?php _e('Gallery', TEXT_DOMAIN);?></h4>
                        <div class="gallery-grid-content"><?php the_content();?> </div>
                    </div>
                </div>
                <?php

                if($images) :

                    ?>
                    <div class="gallery-grid-container top-space-1">
                        <?php foreach( $images as $image ): ?>
                            <div class="gallery-grid-item">
                                <a href="<?php echo $image['url']; ?>"><img src="<?php echo $image['sizes']['medium_large']; ?>"  alt="<?php echo $image['alt']; ?>" /></a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php
                endif;
                wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            </div>
        <?php endif; ?>
    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');
get_footer();