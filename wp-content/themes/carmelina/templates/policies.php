<?php
/**
 * Template Name: Policies Page
 *
 * @package WordPress
 * @subpackage Carmelina
 * @since Carmelina 1.0
 */

add_filter( 'body_class', function( $classes ) {
    $classes[] ="policies-page";
    return $classes;
} );

/*filter default image header page*/
if (!has_post_thumbnail())
{
    function page_default_header_image( $output ) {
        $output = '<img class="header-background" src="'+get_template_directory_uri()+'/images/policies-bg.jpg" srcset="'+get_template_directory_uri()+'/images/policies-bg-500.jpg 300w, '+get_template_directory_uri()+'/images/policies-bg-1000.jpg 768w,'+get_template_directory_uri()+'/images/policies-bg.jpg 992w"/>';
        return $output;
    }
    add_filter( 'header_style', 'page_default_header_image' );
}

get_template_part('header','filterdata');
get_header();

$args = array(
    'numberposts' => 10,
    'post_type'   => 'policy',
    'suppress_filters'=>0
);

$latest_policies = get_posts( $args );

?>
    <section class="page-content bottom-space-5" id="page-content">
        <div class="page-content__tree-right-top"></div>
        <div class="page-content__leaf-left-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col m12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-policies" role="tablist">
                            <?php
                                if ( $latest_policies ) {
                                    foreach ( $latest_policies as $key=>$post ) :
                                        $active ="";
                                        if($key==0)
                                        {
                                            $active =" active";
                                        }
                                        setup_postdata( $post );
                            ?>
                                        <a class="nav-item nav-link<?php echo $active; ?>" id="nav-policies-<?php the_ID(); ?>-tab" data-toggle="tab" href="#nav-policies-<?php the_ID(); ?>" role="tab" aria-controls="nav-policies-<?php the_ID(); ?>" aria-selected="true"><?php the_title(); ?></a>
                            <?php
                                    endforeach;
                                    wp_reset_postdata();
                                }
                            ?>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContentpolicies">
                        <?php
                        if ( $latest_policies ) {
                            foreach ( $latest_policies as $key=>$post ) :
                                $active ="";
                                if($key==0)
                                {
                                    $active ="show active";
                                }
                                setup_postdata( $post ); ?>
                                <div class="tab-pane fade <?php echo $active; ?>" id="nav-policies-<?php the_ID(); ?>" role="tabpanel" aria-labelledby="nav-policies-<?php the_ID(); ?>-tab">
                                    <div class="policies container">
                                        <h3><?php the_title();?></h3>
                                        <div class="policies-main">
                                            <div class="policies-container">
                                                <?php the_content();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();