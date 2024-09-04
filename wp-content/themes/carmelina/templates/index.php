<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="homepage";
    return $classes;
} );
get_template_part('header','filterdata');
get_header('home');

$args = array(
    'numberposts' => -1,
    'post_type'   => 'exploration-post',
    'suppress_filters'=>0,
    'order'=> 'DESC',
);
$list_post_exploration= get_posts( $args );

$args = array(
    'numberposts' => -1,
    'post_type'   => 'room-post',
    'suppress_filters'=>0,
    'order'=> 'DESC',
);
$list_post_room= get_posts( $args );

$args = array(
    'numberposts' => -1,
    'post_type'   => 'calendar-post',
    'suppress_filters'=>0,
    'order'=> 'ASC',
);
$list_post_calendar= get_posts( $args );

?>
    <section class="section-resort" id="homepage-section-resort">
        <div class="resort-intro-container" id="resort-intro-container">
            <div class="back-text">Carmelina</div>
            <div class="resort-intro">
                <div class="resort-intro-content" id="resort-intro-content">
                    <h2 class="resort-intro-title"><?php _e('Welcome', TEXT_DOMAIN);?></h2>
                    <div class="resort-intro-description"><?php the_content();?></div>
                    <a href="<?php echo home_url( '/about' )?>" class="btn-readmore"><?php _e('About the Resort', TEXT_DOMAIN);?></a>
                </div>
            </div>
        </div>
        <?php if($list_post_exploration){?>
        <div class="resort-exploration">
            <h3 class="resort-exploration-title"><?php _e('Resort', TEXT_DOMAIN);?></h3>
            <h4 class="resort-exploration-sub-title"><?php _e('Experience', TEXT_DOMAIN);?></h4>

            <div class="resort-exploration-content">
                <div class="container-fluid">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <?php
                            foreach ( $list_post_exploration as $key=>$item ) :
                                if($key == 0)
                                {
                                    $active = "active";
                                }
                                else
                                {
                                    $active ="";
                                }
                                ?>
                                <a class="nav-item nav-link <?php echo $active;?>" id="nav-<?php echo $item->ID;?>-tab" data-toggle="tab" href="#nav-<?php echo $item->ID;?>" role="tab" aria-controls="nav-weeken" aria-selected="true"><?php echo $item->post_title ?></a>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <?php
                        foreach ( $list_post_exploration as $key=>$post ) :
                            setup_postdata( $post );
                            if($key == 0)
                            {
                                $active = "show active";
                            }
                            else
                            {
                                $active ="";
                            }
                            ?>
                            <div class="tab-pane fade <?php echo $active;?>" id="nav-<?php the_ID();?>" role="tabpanel" aria-labelledby="nav-<?php the_ID();?>-tab">
                                <div class="exploration animated fadeIn slow">
                                    <?php
                                    // check if the repeater field has rows of data
                                    if( have_rows('exploration_repeater') ):
                                        ?>
                                        <div class="exploration-group-items">
                                                <?php
                                                // loop through the rows of data
                                                $i =0;
                                                while ( have_rows('exploration_repeater') ) : the_row();
                                                    $i++;
                                                    if($i>3) break;
                                                    ?>
                                                    <div class="exploration-item"><div class="exploration-item-image"><?php echo wp_get_attachment_image(get_sub_field('exploration_repeater_image'),'medium'); ?><span><?php the_sub_field('exploration_repeater_label'); ?></span></div></div>
                                                <?php
                                                endwhile;
                                                ?>
                                        </div>
                                    <?php
                                    endif;
                                    ?>

                                    <div class="exploration-item-content">
                                        <h5><?php the_title();?></h5>
                                        <h6><?php the_field('exploration_sub_title');?></h6>
                                        <div>
                                            <?php the_excerpt();?>
                                        </div>
                                        <a href="<?php the_field('exploration_url');?>" class="btn-readmore"><?php _e('Discover More', TEXT_DOMAIN);?></a>
                                    </div>
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
        <?php }?>
    </section>

<!--room post-->
<?php if($list_post_room){?>
    <section class="session-destination">
        <div class="saobien"></div>
        <div class="saobiennho"></div>
        <h3><?php _e('Delightful', TEXT_DOMAIN);?></h3>
        <h4><?php _e('Accomodation', TEXT_DOMAIN);?></h4>

        <div class="destination-content">

            <nav>
                <div class="nav nav-tabs" id="nav-destination" role="tablist">
                    <?php
                    foreach ( $list_post_room as $key=>$item ) :
                        if($key == 0)
                        {
                            $active = "active";
                        }
                        else
                        {
                            $active ="";
                        }
                        ?>
                        <a class="nav-item nav-link <?php echo $active;?>" id="nav-<?php echo $item->ID;?>-tab" data-toggle="tab" data-room-type="<?php echo $item->ID;?>" href="#nav-<?php echo $item->ID;?>" role="tab" aria-controls="nav-<?php echo $item->ID;?>" aria-selected="true"><?php the_field('page_header_title',$item->ID)?><br/><?php the_field('page_header_subtitle',$item->ID)?></a>
                    <?php
                    endforeach;
                    ?>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContentDestination">

                <?php
                foreach ( $list_post_room as $key=>$post ) :
                    setup_postdata( $post );
                    if($key == 0)
                    {
                        $active = "show active";
                    }
                    else
                    {
                        $active ="";
                    }
                    ?>
                    <div class="tab-pane <?php echo $active;?>" id="nav-<?php the_ID();?>" role="tabpanel" aria-labelledby="nav-<?php the_ID();?>-tab">
                        <div class="destination container animated fadeIn slow">
                            <div class="destination-slider-con">
                                <div class="destination-slider-wrap">
                                    <div class="destination-slider-arrow" id="destination-slider-arrow-<?php the_ID();?>">
                                        <a class="destination-slider-arrow-pre" id="destination-slider-arrow-<?php the_ID();?>-pre"></a>
                                        <a class="destination-slider-arrow-next" id="destination-slider-arrow-<?php the_ID();?>-next"></a>
                                    </div>
                                    <div class="destination-slider" data-dotted="destination-slider-arrow-dotted-<?php the_ID();?>" data-arrow="destination-slider-arrow-<?php the_ID();?>">
                                        <?php
                                        $images = get_field('gallery_image',get_the_ID());

                                        if($images)
                                        {
                                            foreach( $images as $image ): ?>
                                                <div><div class="destination-slider-item"><img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>" /></div></div>

                                        <?php
                                            endforeach;
                                        }
                                        ?>
                                    </div>
                                    <div class="destination-slider-arrow-dotted" id="destination-slider-arrow-dotted-<?php the_ID();?>"></div>
                                </div>
                            </div>
                            <div class="destination-sumary">
                                <h3><?php echo nl2br(get_field('homepage_room_title_display',get_the_ID()));?></h3>
                                <div><?php the_excerpt();?></div>
                                <a href="<?php the_permalink();?>" class="btn-readmore"><?php _e('View Details', TEXT_DOMAIN);?></a>
                            </div>
                            <div class="destination-form">
                                <form name="checkin-pre">
                                    <div class="destination-form-grid">
                                        <div class="check-in">
                                            <h6><?php _e('Check In', TEXT_DOMAIN);?></h6>
                                            <a class="check-in-date" href="javascript:void(0);">
                                                <span class="check-in-date-dd"></span><span class="check-in-date-mm"></span>
                                            </a>
                                            <input type="text" class="checkin-pre" value="">
                                        </div>

                                        <div class="check-out">
                                            <h6><?php _e('Check Out', TEXT_DOMAIN);?></h6>
                                            <a class="check-out-date" href="javascript:void(0);">
                                                <span class="check-out-date-dd"></span><span class="check-out-date-mm"></span>
                                            </a>
                                        </div>

                                        <div class="room-number">
                                            <div class="input-field col s12">
                                                <select class="room-number-select">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">10+</option>
                                                </select>
                                                <label><?php _e('No. of Room(s)', TEXT_DOMAIN);?></label>
                                            </div>
                                        </div>

                                        <div class="guest-number">
                                            <div class="input-field col s12">
                                                <select class="guest-number-select">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">10+</option>
                                                </select>
                                                <label><?php _e('No. of Guest(s)', TEXT_DOMAIN);?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="destination-form-submit">
                                        <a class="btn-wave scroll" data-scroll="#checkin-form" href="javascript:void(0)"><?php _e('Reserve your room', TEXT_DOMAIN);?></a>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>

                <?php
                endforeach;
                wp_reset_postdata();
                ?>

            </div>
        </div>
    </section>
<?php }?>


    <section class="section-calendar">
        <?php
            if($list_post_calendar){
        ?>
        <div class="calendar">
            <div class="calendar-filter">
                <div class="calendar-filter-content">
                    <h5><?php _e('Carmelina', TEXT_DOMAIN);?></h5>
                    <h6><?php _e('Calendar', TEXT_DOMAIN);?></h6>
                    <p><?php _e('Contact us to learn more about our upcoming events.', TEXT_DOMAIN);?></p>
                    <div class="calendar-filter-select">
                        <select id="calendar-filter-m">
                            <?php
                                $current_month = date('F');
                                $list_month = array();
                                for ($i=0;$i<3;$i++)
                                {
                                    $monthName = date('F', strtotime('+'.$i.' month'));
                                    $list_month[]=$monthName;
                                    $selected ="";
                                    if($current_month==$monthName)
                                    {
                                        $selected ='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $monthName;?>" <?php echo $selected;?>> <?php echo $monthName;?> </option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="calendar-filter-arrow">
                    <a class="calendar-filter-arrow-pre"></a>
                    <a class="calendar-filter-arrow-next"></a>
                </div>
            </div>


            <div class="calendar-content">
                <div class="calendar-content-slider">

                    <?php
                        foreach ( $list_post_calendar as $key=>$post ) :
                            setup_postdata( $post );
                            $month = get_field('calendar_month');
                            $dateObj   = DateTime::createFromFormat('d/m/Y', $month);
                            $monthName = $dateObj->format('F'); // March
                            $dateName = $dateObj->format('d'); // number

                            if(!in_array($monthName,$list_month))
                            {
                                continue;
                            }
                    ?>
                    <div class="calendar-content-item-container <?php echo $monthName ?>">
                        <div class="calendar-content-item animated fadeIn slow">
                            <?php the_post_thumbnail('medium');?>
                            <div class="calendar-content-item-detail">
                                <div class="calendar-content-item-detail-date">
                                    <div class="calendar-content-item-detail-date-dd"><span><?php echo $dateName ?></span></div>
                                    <div class="calendar-content-item-detail-date-mm"><span><?php echo $dateObj->format('M'); ?></span></div>
                                </div>
                                <div class="calendar-content-item-detail-description">
                                    <h5><?php the_title();?></h5>
                                    <div><?php the_excerpt();?></div>
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
        </div>
        <?php }?>
        <?php
        $post_object = get_field('default_gallery');
        if( $post_object ):
            $post = $post_object;
            setup_postdata( $post );
            $images = get_field('gallery_image',$post->ID);

            if($images) :
            ?>

            <div class="container-fluid overflow-hidden">

                <div class="home-gallery-mobile-con">
                    <div class="home-gallery-mobile">
                        <div class="home-gallery-mobile-intro">
                            <div class="home-gallery-mobile-intro-content">
                                <h5><?php _e('Carmelina', TEXT_DOMAIN);?></h5>
                                <h6><?php _e('Gallery', TEXT_DOMAIN);?></h6>
                                <p><?php _e('Tour the gallery of Carmelina Beach Resort to preview our pleasant  accommodation and beautiful surroundings that await you in Ho Tram.', TEXT_DOMAIN);?></p>
                                <a href="<?php echo home_url( '/gallery' )?>" class="btn-wave"><?php _e('Discover more', TEXT_DOMAIN);?></a>
                            </div>
                        </div>
                        <div class="home-gallery-mobile-slider">
                            <?php foreach( $images as $key => $image ){
                                if($key>10) break;
                                ?>
                                <div class="home-gallery-mobile-item-container"><div class="home-gallery-mobile-item"><img src="<?php echo $image['url']; ?>"  alt="<?php echo $image['alt']; ?>"/></div></div>

                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="home-gallery-con">
                    <div class="home-gallery">
                        <div class="home-gallery-intro">
                            <div class="home-gallery-intro-content">
                                <h5><?php _e('Carmelina', TEXT_DOMAIN);?></h5>
                                <h6><?php _e('Gallery', TEXT_DOMAIN);?></h6>
                                <p><?php _e('Tour the gallery of Carmelina Beach Resort to preview our pleasant  accommodation and beautiful surroundings that await you in Ho Tram.', TEXT_DOMAIN);?></p>
                                <a href="<?php echo home_url( '/gallery' )?>" class="btn-wave"><?php _e('Discover more', TEXT_DOMAIN);?></a>
                            </div>
                        </div>
                        <?php foreach( $images as $key => $image ){
                            if($key>10) break;
                            ?>
                            <div class="home-gallery-item"><img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
            endif;
            wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>

    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');


get_footer();