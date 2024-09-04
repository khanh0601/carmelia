<section class="section-blog section-blog-featured" id="blog-section">
        <div class="blog-intro-container animated fadeIn slow">
            <div class="blog-intro">
                <div class="blog-intro-content">
                    <h3 class="blog-intro-title"><?php echo _e('Resort','panicbear-plugin'); ?></h3>
                    <h4 class="blog-intro-sub-title"><?php echo _e('REVEALS','panicbear-plugin'); ?></h4>
                </div>
            </div>
        </div>
        <div class="container animated fadeIn slow">
            <div class="blog-listing-featured">
                <?php
                // Lấy bài viết có tag là featured
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'tag' => 'featured',
                    'post_status' => 'publish'
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post(); 
// 						include PANICBEAR_STUDIO__PLUGIN_DIR . 'templates/custom-template.php';
                ?>
                <article class="blog-featured-item">
                    <div class="blog-featured-item-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </div>
                    <div class="blog-featured-item-content">
                        <div class="blog-featured-item-meta">
							
			<?php
			$categories = get_the_category();
			if (!empty($categories)) : 
				foreach($categories as $index => $categorie) :
				if($index > 2) continue;
			?>
				<a href="<?php echo esc_url(get_category_link($categorie->term_id)); ?>" class="blog-grid-item-category"><?php echo esc_html($categorie->name); ?></a>
			<?php
				endforeach;
			endif;
			?>
                        </div>
                        <h2 class="blog-featured-item-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
		<span class="blog-grid-item-date">
			<?php _e('Posted','panicbear-plugin'); ?>: <?php echo get_the_date(); ?>
		</span>
                        <p class="blog-featured-item-excerpt">
                            <?php
                            echo wp_trim_words(get_the_content(), 20, '...');
                            ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="blog-featured-item-readmore">
                            <?php _e('Read more','panicbear-plugin'); ?>
                            <svg width="23" height="5" viewBox="0 0 23 5" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 2.5H22" stroke="#3B3B3B" stroke-width="0.5" stroke-linejoin="bevel" />
                                <path d="M20 0.56546L21.9345 2.5" stroke="#3B3B3B" stroke-width="0.5"
                                    stroke-linecap="square" />
                                <path d="M20 4.43454L21.9345 2.5" stroke="#3B3B3B" stroke-width="0.5"
                                    stroke-linecap="square" />
                            </svg>
                        </a>
                    </div>
                </article>
                <?php 
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="blog-listing-row">
                <?php
                // Lấy bài viết có tag là featured từ vị trí thứ 2
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'tag' => 'featured',
                    'offset' => 1,
                    'post_status' => 'publish'
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
						include PANICBEAR_STUDIO__PLUGIN_DIR . 'templates/custom-template.php';
						/*
                ?>
                <article class="blog-grid-item">
                    <div class="blog-grid-item-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </div>
                    <div class="blog-grid-item-content">
                        <div class="blog-grid-item-meta">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) : ?>
                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="blog-grid-item-category"><?php echo esc_html($categories[0]->name); ?></a>
                            <?php
                            endif;
                            ?>
                            <span class="blog-grid-item-divider"></span>
                            <span class="blog-grid-item-date">
                                <?php echo get_the_date('d-m-Y'); ?>
                            </span>
                        </div>
                        <h2 class="blog-grid-item-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <p class="blog-grid-item-excerpt">
                            <?php
                            echo wp_trim_words(get_the_content(), 20, '...');
                            ?>
                        </p>
                    </div>
                </article>
                <?php */
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="blog-listing-featured-button animated fadeIn slow">
            <?php
            // lấy đường dẫn page có page template là "Blog Template" để hiển thị button view all
            $args = array(
                'post_type' => 'page',
                'posts_per_page' => 1,
                'meta_key' => '_wp_page_template',
                'meta_value' => 'blogs-template.php'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
            ?>
                <a href="<?php the_permalink(); ?>" class="btn-wave"><?php echo _e('View all','panicbear-plugin'); ?></a>
            <?php
                }
            }
            wp_reset_postdata();
            ?>
        </div>
    </section>