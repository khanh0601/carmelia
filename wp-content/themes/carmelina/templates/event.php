<?php
/**
 * Template Name: Event Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="event-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/event-bg.jpg" srcset="'+get_template_directory_uri()+'/images/event-bg-500.jpg 300w, '+get_template_directory_uri()+'/images/event-bg-1000.jpg 768w,'+get_template_directory_uri()+'/images/event-bg.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

$args = array(
    'numberposts' => 100,
    'post_type'   => 'event-post',
    'suppress_filters'=>0,
    'order'=> 'DESC',
);
$list_post = get_posts( $args );

$args2 = array(
    'numberposts' => -1,
    'post_type'   => 'room-capacity-post',
    'suppress_filters'=>0,
    'order'=> 'ASC',
);
$list_room = get_posts( $args2 );
?>
    <section class="page-content bottom-space-7" id="page-content">
        <div class="page-content__tree-right-top"></div>

        <div class="relative">
            <div class="page-content__leaf-left-bottom"></div>
            <div class="container list-card-default-container">
                <?php if ( $list_post ) {?>
                    <div class="list-card-default" data-arrow="list-card-default-arrow-1" data-dotted="list-card-default-dotted-1" data-info="list-card-defaut-info-1">

                        <?php
                        foreach ( $list_post as $key=>$post ) :
                            setup_postdata( $post );
                            $capacity = get_field('meeting_capacity', $post->ID);
                            ?>
                            <div class="card-default">
                                <div class="card-default-image"><?php the_post_thumbnail('medium_large');?></div>
                                <div class="card-default-info">
                                    <div class="card-default-info-container">
                                        <h3>
                                            <?php the_title();?>
                                        </h3>
                                        <?php if($capacity){
                                            ?>
                                            <div class="card-default-info-grid">
                                                <div class="card-default-info-location"><strong><?php _e('Capacity', TEXT_DOMAIN);?></strong><?php echo $capacity?></div>
                                            </div>
                                        <?php
                                            }
                                        ?>
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
                <?php  }?>
            </div>
        </div>
        <div class="container">
            <?php if ( $list_room ) {?>
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="event-capacity-container">
                        <h2 class="bottom-space-2"><?php _e('Room capacity', TEXT_DOMAIN);?></h2>
                        <div class="event-capacity-content">
                            <div class="container">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php
                                    foreach ( $list_room as $key=>$post ) :
                                        if($key == 0)
                                        {
                                            $active = "active";
                                        }
                                        else
                                        {
                                            $active ="";
                                        }
                                        ?>
                                        <a class="nav-item nav-link <?php echo $active;?>" id="nav-<?php echo $post->ID;?>-tab" data-toggle="tab" href="#nav-<?php echo $post->ID;?>" role="tab" aria-controls="nav-<?php echo $post->ID;?>" aria-selected="true"><?php echo $post->post_title;?></a>
                                    <?php endforeach;?>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                <?php
                                    foreach ( $list_room as $key=>$post ) :
                                        if($key == 0)
                                        {
                                            $active = "active";
                                        }
                                        else
                                        {
                                            $active ="";
                                        }
                                        setup_postdata( $post );
                                    ?>
                                    <div class="tab-pane fade <?php echo $active;?>" id="nav-<?php the_ID();?>" role="tabpanel" aria-labelledby="nav-<?php the_ID();?>-tab">
                                        <div class="event-capacity-item">
                                            <h3><span class="event-capacity-item-number"><?php the_field('room_capacity_m2');?></span> m<sup>2</sup></h3>
                                            <ul class="event-capacity-item-default">
                                                <li class="event-capacity-item-default-item"><img src="<?php echo get_template_directory_uri()?>/imgs/room-capacity/cabaret.png" alt="<?php _e('Cabaret', TEXT_DOMAIN);?>"><?php _e('Cabaret', TEXT_DOMAIN);?>:
                                                    <strong>
                                                        <?php
                                                            $text = get_field('room_capacity_cabaret');
                                                            if(!empty($text)) {
                                                                $text = sprintf(_n('%s seat','%s seats',$text,TEXT_DOMAIN),$text);
                                                                echo $text;
                                                            }
                                                            else
                                                            {
                                                                _e('N/A',TEXT_DOMAIN);
                                                            }
                                                            ?>
                                                    </strong>
                                                </li>
                                                <li class="event-capacity-item-default-item"><img src="<?php echo get_template_directory_uri()?>/imgs/room-capacity/ushape.png" alt="<?php _e('U-Shape', TEXT_DOMAIN);?>"><?php _e('U-Shape', TEXT_DOMAIN);?>:
                                                    <strong>
                                                        <?php
                                                        $text = get_field('room_capacity_u_shape');
                                                        if(!empty($text)) {
                                                            $text = sprintf(_n('%s seat','%s seats',$text,TEXT_DOMAIN),$text);
                                                            echo $text;
                                                        }
                                                        else
                                                        {
                                                            _e('N/A',TEXT_DOMAIN);
                                                        }
                                                        ?>
                                                    </strong>
                                                </li>
                                                <li class="event-capacity-item-default-item"><img src="<?php echo get_template_directory_uri()?>/imgs/room-capacity/theater.png" alt="<?php _e('Theater', TEXT_DOMAIN);?>"><?php _e('Theater', TEXT_DOMAIN);?>:
                                                    <strong>
                                                        <?php
                                                        $text = get_field('room_capacity_theater');
                                                        if(!empty($text)) {
                                                            $text = sprintf(_n('%s seat','%s seats',$text,TEXT_DOMAIN),$text);
                                                            echo $text;
                                                        }
                                                        else
                                                        {
                                                            _e('N/A',TEXT_DOMAIN);
                                                        }
                                                        ?>
                                                    </strong>
                                                </li>
                                                <li class="event-capacity-item-default-item"><img src="<?php echo get_template_directory_uri()?>/imgs/room-capacity/classroom.png" alt="<?php _e('Classroom', TEXT_DOMAIN);?>"><?php _e('Classroom', TEXT_DOMAIN);?>:
                                                    <strong>
                                                        <?php
                                                        $text = get_field('room_capacity_classroom');
                                                        if(!empty($text)) {
                                                            $text = sprintf(_n('%s seat','%s seats',$text,TEXT_DOMAIN),$text);
                                                            echo $text;
                                                        }
                                                        else
                                                        {
                                                            _e('N/A',TEXT_DOMAIN);
                                                        }
                                                        ?>
                                                    </strong>
                                                </li>
                                                <li class="event-capacity-item-default-item"><img src="<?php echo get_template_directory_uri()?>/imgs/room-capacity/double-ushape.png" alt="<?php _e('Double U-Shape', TEXT_DOMAIN);?>"><?php _e('Double U-Shape', TEXT_DOMAIN);?>:
                                                    <strong>
                                                        <?php
                                                        $text = get_field('room_capacity_double_u_shape');
                                                        if(!empty($text)) {
                                                            $text = sprintf(_n('%s seat','%s seats',$text,TEXT_DOMAIN),$text);
                                                            echo $text;
                                                        }
                                                        else
                                                        {
                                                            _e('N/A',TEXT_DOMAIN);
                                                        }
                                                        ?>
                                                    </strong>
                                                </li>
                                                <li class="event-capacity-item-default-item"><img src="<?php echo get_template_directory_uri()?>/imgs/room-capacity/banquet.png" alt="<?php _e('Banquet', TEXT_DOMAIN);?>"><?php _e('Banquet', TEXT_DOMAIN);?>:
                                                    <strong>
                                                        <?php
                                                        $text = get_field('room_capacity_banquet');
                                                        if(!empty($text)) {
                                                            $text = sprintf(_n('%s seat','%s seats',$text,TEXT_DOMAIN),$text);
                                                            echo $text;
                                                        }
                                                        else
                                                        {
                                                            _e('N/A',TEXT_DOMAIN);
                                                        }
                                                        ?>
                                                    </strong>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php
                                        endforeach;
                                        wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php  }?>
        <?php
        // check if the repeater field has rows of data
        if( have_rows('facilities_equipment') ):
            ?>

            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="event-equipment-container">
                        <h2 class="top-space-6"><?php _e('Facilities & equipment',TEXT_DOMAIN);?></h2>
                        <ul class="event-equipment" id="event-equipment">
                        <?php
                        // loop through the rows of data
                        while ( have_rows('facilities_equipment') ) : the_row();
                            ?>
                            <li class="event-equipment-item"><?php the_sub_field('facilities_equipment_item'); ?></li>
                        <?php
                        endwhile;
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        endif;


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
                wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');
get_footer();