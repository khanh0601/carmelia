<?php
/**
 * Template Name: Gallery Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="gallery-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/gallery-pagebg.jpg" srcset="'+get_template_directory_uri()+'/images/gallery-pagebg-500.jpg 300w, '+get_template_directory_uri()+'/images/gallery-pagebg-1000.jpg 768w,'+get_template_directory_uri()+'/images/gallery-pagebg.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

$args = array(
    'post_type'   => 'gallery-grid-post',
    'suppress_filters'=>0,
    'order'=> 'ASC',
    'numberposts' => -1,
);

$gallery_post = get_posts( $args );

$all_image = array();
$list_image= array();
$total_page = array();
foreach ($gallery_post as $key => $post)
{
    $list_image[$post->ID] = get_field('gallery_image',$post->ID);
    $total_page[$post->ID] = ceil(count($list_image[$post->ID])/13);
    $all_image = array_merge($all_image,$list_image[$post->ID]);
    $list_image[$post->ID] = array_slice($list_image[$post->ID] ,0,13);
}

usort($all_image, "cmpGalleryGrid");

$total_page['all'] = ceil(count($all_image)/13);
$all_image = array_slice($all_image ,0,13);
?>
    <section class="page-content bottom-space-7" id="page-content">
        <div class="page-content__leaf-left-top"></div>
        <div class="container">
            <div class="row">
                <div class="col m12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-gallery-grid" role="tablist">
                            <a class="nav-item nav-link active" id="nav-gallery-grid1-tab" data-toggle="tab" href="#nav-gallery-grid1" role="tab" aria-controls="nav-gallery-grid1" aria-selected="true"><?php _e('All', TEXT_DOMAIN);?></a>
                            <?php foreach( $gallery_post as $post ):
                                setup_postdata( $post );
                                ?>
                                <a class="nav-item nav-link" id="nav-gallery-grid<?php the_ID(); ?>-tab" data-toggle="tab" href="#nav-gallery-grid<?php the_ID(); ?>" role="tab" aria-controls="nav-gallery-grid<?php the_ID(); ?>" aria-selected="false"><?php the_title(); ?></a>

                            <?php endforeach;
                                wp_reset_postdata();
                            ?>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContentgallery-grid">
                        <div class="tab-pane fade show active" id="nav-gallery-grid1" role="tabpanel" aria-labelledby="nav-gallery-grid1-tab">
                            <div class="gallery-grid container">
                                <div class="row">
                                    <div class="col s12 m8 offset-m2 text-center top-space-1">
                                        <?php the_content();?>
                                    </div>
                                </div>
                                <div class="gallery-grid-container top-space-4">
                                    <?php foreach ($all_image as $img):?>
                                        <div class="gallery-grid-item">
                                            <a href="<?php echo $img['url']; ?>"><img src="<?php echo $img['sizes']['medium_large']; ?>"  alt="<?php echo $img['alt']; ?>" /></a>
                                        </div>
                                    <?php
                                    endforeach;
                                    ?>
                                </div>

                                <ul class="pagination pagination-ajax" data-current="1" data-total="<?php echo $total_page['all'];?>"  data-url="<?php echo admin_url('admin-ajax.php');?>" data-galleryid="all">
                                    <li class="disabled" data-page="pre"><a href="javascipt:void(0);" class="pagination-pre"></a></li>
                                    <?php for($i=1;$i<=$total_page['all'];$i++) { ?>
                                        <li class="<?php if($i==1) echo 'active';?>" data-page="<?php echo $i;?>"><a href="javascipt:void(0);"><?php echo $i;?></a></li>
                                        <?php
                                            }
                                    ?>
                                    <li class="<?php if($total_page[get_the_ID()]==1) echo 'disabled';?>" data-page="next"><a href="javascipt:void(0);" class="pagination-next" data-page="next"></a></li>
                                </ul>
                            </div>
                        </div>
                        <?php foreach( $gallery_post as $post ):
                            setup_postdata( $post );
                            ?>
                                <div class="tab-pane fade" id="nav-gallery-grid<?php the_ID(); ?>" role="tabpanel" aria-labelledby="nav-gallery-grid<?php the_ID(); ?>-tab">
                                    <div class="gallery-grid container">
                                        <div class="row">
                                            <div class="col s12 m8 offset-m2 text-center top-space-1">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                        <?php
                                            if($list_image[get_the_ID()]){
                                            ?>
                                        <div class="gallery-grid-container top-space-4">
                                            <?php foreach ($list_image[get_the_ID()] as $img):?>
                                                <div class="gallery-grid-item">
                                                    <a href="<?php echo $img['url']; ?>"><img src="<?php echo $img['sizes']['medium_large']; ?>"  alt="<?php echo $img['alt']; ?>" /></a>
                                                </div>
                                            <?php
                                            endforeach;
                                            ?>
                                        </div>
                                        <?php
                                            }
                                            ?>
                                        <ul class="pagination pagination-ajax" data-current="1" data-total="<?php echo $total_page[get_the_ID()];?>" data-url="<?php echo admin_url('admin-ajax.php');?>" data-galleryid="<?php the_ID(); ?>">
                                            <li class="disabled" data-page="pre"><a href="javascipt:void(0);" class="pagination-pre"></a></li>
                                            <?php for($i=1;$i<=$total_page[get_the_ID()];$i++) { ?>
                                                <li class="<?php if($i==1) echo 'active';?>" data-page="<?php echo $i;?>"><a href="javascipt:void(0);"><?php echo $i;?></a></li>
                                                <?php
                                            }
                                            ?>
                                            <li class="<?php if($total_page[get_the_ID()]==1) echo 'disabled';?>" data-page="next"><a href="javascipt:void(0);" class="pagination-next"></a></li>
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
    </section>
<?php
get_template_part('template-parts/home/home','location');
get_template_part('template-parts/home/footer','form');
get_footer();