<?php
/*
 * Template Name: Blog Template
 */

add_filter('body_class', function ($classes) {
    $classes[] = "homepage";
    return $classes;
});
get_template_part('header', 'filterdata');
get_header();

echo do_shortcode('[panicbear_studio]');
?>
<section class="section-blog" id="blog-trending">
    <div class="blog-intro-container">
        <div class="blog-intro animated fadeIn slow">
            <div class="blog-intro-content blog-intro-content-blog-trending">
                <?php if(get_field('sub_title')) : ?>
                    <h3 class="blog-intro-title"> <?php echo get_field('sub_title');?></h3>
                <?php endif; ?>
                <?php if(get_field('title')) : ?>
                    <h4 class="blog-intro-sub-title">
                        <?php
                            echo get_field('title');
                        ?>
                    </h4>
                <?php endif; ?>
                <?php if(get_field('description')) : ?>
                <div class="blog-intro-description">
                    <p>
                        <span class="s2">
                            <?php
                                echo get_field('description');
                            ?>
                        </span>
                    </p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="blog-exploration">
        <div class="blog-exploration-content animated fadeIn slow">
            <div class="container-fluid">
                <div class="blog-trending animated fadeIn slow">
                    <div class="blog-trending-group-items">
                        <?php
                        // wp_query get blogs by category "trending"
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'order' => 'DESC',
                            'post_status' => 'publish',
                            'post__not_in' => array(get_the_ID()),
                            'tag' => 'trending',
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
								include PANICBEAR_STUDIO__PLUGIN_DIR . 'templates/custom-template.php';
						/*
                        ?>
                                <article class="blog-grid-item">
                                    <div class="blog-grid-item-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <!-- get post thumbnail -->
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                    <div class="blog-grid-item-content">
                                        <div class="blog-grid-item-meta">
                                            <?php
                                            // get post category
                                            $categories = get_the_category();
                                            if (!empty($categories)) : ?>
                                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="blog-grid-item-category"><?php echo esc_html($categories[0]->name); ?></a>
                                            <?php
                                            endif;
                                            ?>
                                            <span class="blog-grid-item-divider"></span>
                                            <span class="blog-grid-item-date">
                                                <?php
                                                // echo get_the_date();
                                                // get date format 20 Feb 2024
                                                echo get_the_date('d-m-Y');
                                                ?>
                                            </span>
                                        </div>
                                        <h2 class="blog-grid-item-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        <p class="blog-grid-item-excerpt">
                                            <?php
                                            // lấy 94 ký tự đầu tiên của post
                                            echo wp_trim_words(get_the_content(), 20, '...');
                                            ?>
                                        </p>
                                    </div>
                                </article>
                        <?php */
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="session-blog-listing">
    <div class="saobien"></div>
    <div class="saobiennho"></div>
    <div class="blog-listing-content animated fadeIn slow">
        <div class="blog-listing-nav-tabs">
            <div class="container">
                <div class="blog-listing-nav-tabs-inner">
                    <nav>
                        <div class="nav nav-tabs" id="nav-destination" role="tablist">
                            <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" data-room-type="" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">
                                <?php echo _e('All','panicbear-plugin'); ?></a>
                            <?php
                            // get all taxonomy=category
                            $categories = get_categories(array(
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'hide_empty' => 0,
                            ));
                            foreach ($categories as $category) :
                                // hide Uncategorized category
                                if ($category->name == 'Uncategorized' || $category->name == 'Uncategorized @vi') {
                                    continue;
                                }                               
                            ?>
                                <a class="nav-item nav-link " id="nav-<?php echo $category->term_id; ?>-tab" data-toggle="tab" data-room-type="<?php echo $category->term_id; ?>" href="#nav-<?php echo $category->term_id; ?>" role="tab" aria-controls="nav-<?php echo $category->term_id; ?>" aria-selected="true">
                                    <?php echo $category->name; ?>
                                </a>
                            <?php endforeach;
                            ?>
                        </div>
                    </nav>
                    <div class="blog-listing-search">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M14 14L11.1 11.1M12.6667 7.33333C12.6667 10.2789 10.2789 12.6667 7.33333 12.6667C4.38781 12.6667 2 10.2789 2 7.33333C2 4.38781 4.38781 2 7.33333 2C10.2789 2 12.6667 4.38781 12.6667 7.33333Z" stroke="#3B3B3B" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="input-field col s12">
                            <input id="search-blog-post" type="text" name="search-blog-post" maxlength="255" placeholder="<?php _e('Search...','panicbear-plugin') ;?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContentDestination">
            <div class="tab-pane show active" id="nav-482" role="tabpanel" aria-labelledby="nav-482-tab">
                <div class="container">
                    <div class="blog-listing animated fadeIn slow">
                        <div class="blog-listing-grid">
                            <?php
                            // wp_query get all blogs
                            $limit = 6;
                            if(wp_is_mobile()){
                                $limit = 3;
                            }
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => $limit,
                                'post_status' => 'publish'
                            );
                            $query = new WP_Query($args);
                            // get total page
                            $total_page = $query->max_num_pages;
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
									include PANICBEAR_STUDIO__PLUGIN_DIR . 'templates/custom-template.php';
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <ul class="pagination blog-grid-pagination-ajax" data-current="1" data-total="<?php echo $total_page; ?>" data-galleryid="all">
                    <li class="disabled" data-page="pre"><a href="javascipt:void(0);" class="pagination-pre"></a></li>
                    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                        <li class="<?php echo $i == 1 ? 'active' : ''; ?>" data-page="<?php echo $i; ?>"><a href="javascipt:void(0);"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                    <li class="" data-page="next"><a href="javascipt:void(0);" class="pagination-next" data-page="next"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
get_template_part('template-parts/home/home', 'location');
get_template_part('template-parts/home/footer', 'form');
get_footer();
