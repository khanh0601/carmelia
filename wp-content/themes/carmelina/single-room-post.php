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
    $classes[] ="accomodation-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/accommodation.jpg" srcset="'+get_template_directory_uri()+'/images/accommodation-500.jpg 300w, '+get_template_directory_uri()+'/images/accommodation-1000.jpg 768w,'+get_template_directory_uri()+'/images/accommodation.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

?>
    <section class="page-content" id="page-content">
        <div class="page-content__leaf-right-top"></div>
        <div class="container">
            <div class="row top-space-3 bottom-space-3">
                <div class="col m12 s12 text-center">
                    <div class="room-attributes">
                        <div>
                            <span class="room-attributes-number"><?php the_field('room_m2');?></span>
                            <span>m</span><sup>2</sup>
                        </div>
                        <div>
                            <span class="room-attributes-number"><?php the_field('room_aldults');?></span>
                            <?php
                                $text = sprintf(_n('Adult','Adults',get_field('room_aldults'),TEXT_DOMAIN),get_field('room_aldults'));
                                echo $text;
                            ?>
                            <span class="room-attributes-nn">&</span>
                            <span class="room-attributes-number"><?php the_field('room_child');?></span>
                            <span class="room-attributes-2row">
                                <span class="room-attributes-2row-top"><?php _e('Child',TEXT_DOMAIN);?></span>
                                <span class="room-attributes-2row-bottom"><?php _e('under 5',TEXT_DOMAIN);?></span>
                            </span>
                        </div>
                        <div>
                            <?php
                            // check if the repeater field has rows of data
                            if( have_rows('room_bed') ):
                                $count = count(get_field('room_bed'));

                                if($count>1)
                                {
                                    $i=0;
                                    while ( have_rows('room_bed') ) : the_row();
                                        $i++;
                                        ?>
                                        <span class="room-attributes-number"><?php the_sub_field('room_bed_number');?></span>
                                        <?php
                                            the_sub_field('room_bed_text');
                                            if($i<$count){
                                        ?>
                                                <span class="room-attributes-nn">/</span>
                                        <?php
                                            }

                                    endwhile;
                                }
                                else
                                {
                                    while ( have_rows('room_bed') ) : the_row();
                                        ?>
                                        <span class="room-attributes-number"><?php the_sub_field('room_bed_number');?></span>
                                        <?php the_sub_field('room_bed_text'); ?>
                                    <?php
                                    endwhile;
                                }

                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-intro">
                <?php the_content();?>
            </div>
            <?php
            $images = get_field('gallery_image',$post->ID);

            if( $images ):
                ?>
                <div class="gallery-default-container">
                    <div class="gallery-default">
                        <?php foreach( $images as $image ):
                            ?>
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
                $features = wp_get_post_terms( get_the_ID(), 'room_feature'  );
                $utility = wp_get_post_terms( get_the_ID(), 'room_utility' );

                if($features || $utility) {
                    ?>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <div class="room-feature">
                                <h2><?php _e('Room Features',TEXT_DOMAIN);?></h2>
                                <?php if($features) {?>
                                <ul class="room-feature-default">
                                    <?php foreach ($features as $term) {
                                        $image = get_field('room_feature_icon', $term);
                                        ?>
                                        <li class="room-feature-default-item"><?php echo wp_get_attachment_image($image, 'large'); ?> <?php echo $term->name;?>
                                        </li>
                                    <?php }?>
                                </ul>

                                <?php }?>

                                <?php if($utility) {?>
                                <div class="room-feature-no-icon-container" id="room-feature-no-icon-container">
                                    <ul class="room-feature-no-icon" id="room-feature-no-icon">
                                        <?php foreach ($utility as $term) {
                                            ?>
                                            <li class="room-feature-no-icon-item"><?php echo $term->name;?></li>
                                        <?php }?>
                                    </ul>
                                </div>
                                    <div class="text-center accomodation-btn-seemore">
                                        <a href="javascript:void(0);"
                                                                                         id="accomodation-btn-seemore-feature"
                                                                                         class="btn-seemore"
                                                                                         data-target="room-feature-no-icon-container"
                                                                                         data-seemore="<?php _e("See More",TEXT_DOMAIN);?>"
                                                                                         data-seeless="<?php _e("See Less",TEXT_DOMAIN);?>">
                                            <?php
                                            _e('See More',TEXT_DOMAIN)
                                            ?>
                                            </a></div>
                                <?php }?>

                            </div>
                        </div>
                    </div>


                    <?php

                }


            $list_post = get_field('related_room_item');
            // check if the repeater field has rows of data
            if( $list_post ):
                ?>
                <div class="related-list-container">
                    <h2><?php
                        _e('Other Rooms',TEXT_DOMAIN)
                        ?></h2>
                    <div class="related-list">
                        <?php
                        foreach ( $list_post as $key=>$post ) :
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

$args = array(
    'numberposts' => -1,
    'post_type'   => 'dining-offer-post',
    'suppress_filters'=>0,
    'order'=> 'ASC',
);

$list_post = get_posts( $args );
// check if the repeater field has rows of data
if( $list_post ):
    ?>
    <section class="section-dining-offer">
        <div class="dining-offer">
            <div class="dining-offer-filter">
                <div class="dining-offer-filter-content">
                    <h5><?php _e('Seasonal',TEXT_DOMAIN);?></h5>
                    <h6><?php _e('Offers',TEXT_DOMAIN);?></h6>
                    <p><?php _e('Discover seasonal offers and perks that let you experience more of your vacation for less.',TEXT_DOMAIN);?></p>
                    <a href="<?php echo home_url( '/offers' )?>" class="btn-readmore"><?php _e('Discover more',TEXT_DOMAIN);?></a>
                </div>
                <div class="dining-offer-filter-arrow">
                    <a class="dining-offer-filter-arrow-pre"></a>
                    <a class="dining-offer-filter-arrow-next"></a>
                </div>
            </div>
            <div class="dining-offer-content">
                <div class="dining-offer-content-slider">
                    <?php
                    foreach ( $list_post as $key=>$post ) :
                        setup_postdata( $post );
                        ?>
                        <div class="dining-offer-content-item-container">
                            <div class="dining-offer-content-item">
                                <a href="<?php echo get_permalink( get_page_by_path( 'offers' ) )?>"><?php the_post_thumbnail();?></a>
                            </div>
                        </div>

                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>

        <div class="section-dining-offer-bottom-wave"></div>
    </section>



<?php
endif;
?>


<?php
get_template_part('template-parts/home/footer','form');
get_footer();