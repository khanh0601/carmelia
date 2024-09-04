<?php
/*
 * Template Name: Single Template
 */

add_filter('body_class', function ($classes) {
    $classes[] = "homepage";
    return $classes;
});
get_template_part('header', 'filterdata');
get_header();
?>

<section class="blog-detail">
    <article class="article">
        <div class="article-header animated fadeIn slow">
            <div class="container">
                <div class="article-header-content">
                    <div class="article-header-breadcrumbs">
                        <a href="/"><?php echo _e('Home','panicbear-plugin'); ?></a>
                        <span class="article-header-breadcrumbs-divider">/</span>
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
							<a href="<?php the_permalink(); ?>"><?php echo _e('Blog','panicbear-plugin'); ?></a>
						<?php
							}
						}
						wp_reset_postdata();
						?>
                        <span class="article-header-breadcrumbs-divider">/</span>
                        <?php
                        // get current post category
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                        }
                        ?>
                        <span class="article-header-breadcrumbs-divider">/</span>
                        <span><?php echo get_the_title(); ?></span>
                    </div>
                    <h1 class="article-header-title"><?php echo get_the_title(); ?></h1>
                    <div class="article-header-meta">
                        <?php
                        if (!empty($categories)) {
                            echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="blog-grid-item-category">' . esc_html($categories[0]->name) . '</a>';
                        }
                        ?>
                        <span class="article-header-divider"></span>
                        <time>
                            <?php
                            echo get_the_date();
                            ?>
                        </time>
                    </div>
                </div>
                <div class="article-header-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            </div>
        </div>
        <main class="article-main animated fadeIn slow">
            <div class="container">
                <div class="article-main-inner">
                    <div class="article-main-sidebar-left">
                        <div class="article-main-sidebar-table-of-content-wrapper">
                            <h5 class="article-main-sidebar-table-of-content-title"><?php _e('Table of content','panicbear-plugin'); ?></h5>
                            <ul class="article-main-sidebar-table-of-content">
                                <?php
                                // get table of content and scrollspy
                                $content = get_the_content();
                                $pattern = '/<h2>(.*?)<\/h2>/';
                                preg_match_all($pattern, $content, $matches);
                                if (!empty($matches[1])) {
                                    $index = 0;
                                    foreach ($matches[1] as $match) {
                                        $index++;
                                        echo '<li><a href="#' . sanitize_title($match) . '">' . $index . '. ' . $match . '</a></li>';
                                    }
                                }
                                // add sanitize_title slug id to content
                                $content = preg_replace_callback($pattern, function ($matches) {
                                    return '<h2 id="' . sanitize_title($matches[1]) . '">' . $matches[1] . '</h2>';
                                }, $content);
                                ?>
                            </ul>
                        </div>
                        <div class="article-main-social">
                            <span class="article-main-social-title">
                                <?php _e('Share','panicbear-plugin') ?>
                            </span>
                            <?php
                            // facebook share link
                            $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
                            ?>
                            <a href="<?php echo $facebook; ?>" class="article-main-social-item">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.1667 1.66663H11.6667C10.5616 1.66663 9.50179 2.10561 8.72039 2.88701C7.93899 3.66842 7.5 4.72822 7.5 5.83329V8.33329H5V11.6666H7.5V18.3333H10.8333V11.6666H13.3333L14.1667 8.33329H10.8333V5.83329C10.8333 5.61228 10.9211 5.40032 11.0774 5.24404C11.2337 5.08776 11.4457 4.99996 11.6667 4.99996H14.1667V1.66663Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a href="#" class="article-main-social-item">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.6663 9.16669C11.3085 8.68825 10.8519 8.29237 10.3276 8.00591C9.80323 7.71944 9.22342 7.54909 8.62747 7.50641C8.03152 7.46373 7.43336 7.54972 6.87356 7.75854C6.31376 7.96736 5.80542 8.29413 5.38301 8.71669L2.88301 11.2167C2.12402 12.0025 1.70404 13.055 1.71354 14.1475C1.72303 15.24 2.16123 16.2851 2.93377 17.0576C3.7063 17.8301 4.75135 18.2683 5.84384 18.2778C6.93633 18.2873 7.98884 17.8674 8.77468 17.1084L10.1997 15.6834M8.333 10.8333C8.69088 11.3118 9.14746 11.7077 9.67179 11.9941C10.1961 12.2806 10.7759 12.4509 11.3719 12.4936C11.9678 12.5363 12.566 12.4503 13.1258 12.2415C13.6856 12.0327 14.1939 11.7059 14.6163 11.2833L17.1163 8.78335C17.8753 7.9975 18.2953 6.94499 18.2858 5.85251C18.2763 4.76002 17.8381 3.71497 17.0656 2.94243C16.293 2.1699 15.248 1.7317 14.1555 1.7222C13.063 1.71271 12.0105 2.13269 11.2247 2.89168L9.79133 4.31668" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="article-main-content">
                        <div class="article-main-content-wrapper">
                            <?php echo $content; ?>
                        </div>
                        <div class="article-main-content-social">
                            <div class="article-main-social">
                                <span class="article-main-social-title">
                                    <?php _e('Follow us on:','panicbear-plugin'); ?>
                                </span>
                                <a href="https://www.facebook.com/Carmelinaresort/" class="article-main-social-item">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.1667 1.66663H11.6667C10.5616 1.66663 9.50179 2.10561 8.72039 2.88701C7.93899 3.66842 7.5 4.72822 7.5 5.83329V8.33329H5V11.6666H7.5V18.3333H10.8333V11.6666H13.3333L14.1667 8.33329H10.8333V5.83329C10.8333 5.61228 10.9211 5.40032 11.0774 5.24404C11.2337 5.08776 11.4457 4.99996 11.6667 4.99996H14.1667V1.66663Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/carmelina.beach.resort" class="article-main-social-item">

                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_303_790)">
                                            <path d="M11.6668 4.33325H11.6735M4.66683 1.33325H11.3335C13.1744 1.33325 14.6668 2.82564 14.6668 4.66659V11.3333C14.6668 13.1742 13.1744 14.6666 11.3335 14.6666H4.66683C2.82588 14.6666 1.3335 13.1742 1.3335 11.3333V4.66659C1.3335 2.82564 2.82588 1.33325 4.66683 1.33325ZM10.6668 7.57992C10.7491 8.13475 10.6543 8.70139 10.396 9.19926C10.1377 9.69713 9.72894 10.1009 9.22792 10.353C8.72691 10.6052 8.15914 10.693 7.60536 10.6039C7.05159 10.5148 6.54001 10.2533 6.1434 9.85669C5.74678 9.46008 5.48533 8.9485 5.39622 8.39473C5.30711 7.84095 5.39488 7.27318 5.64706 6.77217C5.89923 6.27115 6.30296 5.86241 6.80083 5.60408C7.29869 5.34574 7.86534 5.25098 8.42017 5.33325C8.98612 5.41717 9.51007 5.68089 9.91463 6.08545C10.3192 6.49002 10.5829 7.01397 10.6668 7.57992Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_303_790">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </a>
                                <a href="https://www.tripadvisor.com.vn/Hotel_Review-g2549585-d4996396-Reviews-Carmelina_Beach_Resort-Ho_Tram_Phuoc_Thuan_Ba_Ria_Vung_Tau_Province.html" class="article-main-social-item">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_250_576)">
                                            <path d="M15.9837 8.65994C15.9725 10.9475 14.1158 12.7988 11.8261 12.8012C10.9156 12.8012 10.0735 12.5086 9.38865 12.0122L9.59535 11.7538L9.60553 11.7411L9.5928 11.7309L9.04928 11.296L9.03654 11.2858L9.02636 11.2986L8.83789 11.5344C8.49651 11.1815 8.21706 10.7684 8.01704 10.3126C8.19513 9.90367 8.30994 9.46086 8.34911 8.99652C8.52604 10.7608 10.0153 12.1381 11.8261 12.1381C13.7507 12.1381 15.3118 10.5824 15.3206 8.65994H15.9837ZM14.9593 7.09753C14.3883 5.94411 13.2 5.15075 11.8261 5.14902H11.8261C10.0159 5.14902 8.52714 6.52535 8.34931 8.28877C8.31038 7.82449 8.19574 7.38174 8.0178 6.97291C8.66109 5.50859 10.1241 4.48603 11.8261 4.48603C12.0426 4.48603 12.2553 4.50257 12.4628 4.53447C12.7053 4.66892 12.9357 4.81403 13.1525 4.96882C13.9765 5.55725 14.6041 6.28507 14.9593 7.09753ZM15.3206 8.62733C15.3144 7.18796 14.4923 5.88543 13.1714 4.94228C12.9771 4.80356 12.772 4.67259 12.5571 4.55008C13.0863 4.64394 13.5808 4.83788 14.0205 5.11164L13.9369 5.33345L13.9312 5.34875L13.9465 5.35447L14.5986 5.59803L14.6139 5.60372L14.6196 5.58848L14.6264 5.57043C15.4567 6.3274 15.979 7.4163 15.9837 8.62733H15.3206ZM9.5597 11.7462L9.3623 11.9929C9.1837 11.8613 9.01601 11.7158 8.86083 11.5579L9.04164 11.3317L9.5597 11.7462ZM8.84033 11.5835C8.99565 11.7413 9.16337 11.8867 9.34191 12.0184L7.99995 13.6957L6.65699 12.017C6.83549 11.8853 7.00317 11.7399 7.15846 11.5822L7.98722 12.619L7.99995 12.6349L8.01269 12.619L8.84033 11.5835ZM8.33152 8.64363C8.33091 9.22137 8.21259 9.77153 7.99926 10.2714C7.78634 9.7715 7.66852 9.22133 7.66852 8.64363C7.66852 8.64362 7.66852 8.64362 7.66852 8.64361C7.66852 8.06522 7.78661 7.51443 8.00001 7.01402C8.21341 7.51443 8.33152 8.06524 8.33152 8.64363ZM7.65072 8.99849C7.6896 9.46209 7.80394 9.90422 7.98144 10.3126C7.78129 10.7679 7.50197 11.1805 7.1609 11.533L6.97355 11.2986L6.96336 11.2858L6.95062 11.296L6.40723 11.7309L6.3945 11.7411L6.40469 11.7538L6.61026 12.0108C5.92568 12.5072 5.08399 12.8003 4.17389 12.8012C1.8832 12.8012 0.0251226 10.9486 0.0163356 8.65994H0.679341C0.688124 10.5824 2.24937 12.1381 4.17391 12.1381C5.9841 12.1381 7.47289 10.7618 7.65072 8.99849ZM4.17391 5.14902C2.80991 5.14902 1.62841 5.93046 1.05274 7.07013C1.40997 6.2687 2.03267 5.55063 2.84749 4.96882C3.06426 4.81404 3.29459 4.66893 3.53709 4.53449C3.7447 4.50258 3.95737 4.48603 4.17391 4.48603C5.8758 4.48603 7.33889 5.50859 7.98221 6.9729C7.80398 7.38241 7.68927 7.82594 7.65053 8.29106C7.47183 6.52759 5.98386 5.1513 4.17393 5.14902H4.17391ZM7.99995 3.40994C6.31739 3.40994 4.76476 3.81784 3.52638 4.50314C2.96164 4.59075 2.43417 4.79113 1.96773 5.08055L1.88356 4.85729C2.03316 4.72565 2.19041 4.59889 2.35479 4.47737C2.77767 4.16477 3.24773 3.88695 3.75636 3.65032L4.97543 3.86839L4.99149 3.87126L4.99435 3.8552L5.11598 3.17257L5.11884 3.15655L5.10282 3.15367L5.09158 3.15164C5.99302 2.89038 6.97406 2.74684 7.99995 2.74684C9.02586 2.74684 10.0069 2.89038 10.9084 3.15163L10.8971 3.15367L10.8811 3.15655L10.8839 3.17257L11.0057 3.8552L11.0085 3.87126L11.0246 3.86839L12.2436 3.65032C12.7523 3.88695 13.2223 4.16477 13.6452 4.47737C13.8096 4.59889 13.9669 4.72565 14.1164 4.85728L14.0323 5.08053C13.5658 4.79111 13.0383 4.59072 12.4735 4.50313C11.2352 3.81783 9.68256 3.40994 7.99995 3.40994ZM1.97946 5.11166C2.41914 4.83791 2.91367 4.64397 3.44278 4.5501C3.22789 4.6726 3.02281 4.80357 2.82854 4.94228C1.50768 5.88543 0.685506 7.18796 0.679341 8.62733H0.0163356C0.0209848 7.41631 0.543368 6.32742 1.37363 5.57046L1.38039 5.58848L1.3861 5.60372L1.40135 5.59803L2.05353 5.35451L2.06885 5.34878L2.06308 5.33348L1.97946 5.11166ZM1.85743 4.8804L1.93953 5.0982C1.74395 5.22172 1.5593 5.36097 1.38735 5.51419L1.34174 5.39255C1.50126 5.21489 1.67347 5.04394 1.85743 4.8804ZM1.39964 5.54694C1.57126 5.39309 1.75574 5.25329 1.95128 5.12936L2.0268 5.32968L1.4052 5.56178L1.39964 5.54694ZM1.3613 5.53759C1.00203 5.86312 0.699484 6.25012 0.470267 6.682C0.684642 6.23427 0.970298 5.81111 1.31722 5.42003L1.3613 5.53759ZM1.84511 4.84774C1.66114 5.0107 1.48873 5.18108 1.32885 5.35817L0.181861 2.29946L4.95101 3.15943C4.53243 3.28714 4.13156 3.44034 3.75196 3.6164L1.2377 3.16664L1.20945 3.16159L1.21957 3.18844L1.84511 4.84774ZM11.0489 3.15942L15.8181 2.29946L14.6712 5.35815C14.5113 5.18106 14.3389 5.01069 14.1549 4.84773L14.7805 3.18844L14.7906 3.16159L14.7624 3.16664L12.248 3.61641C11.8684 3.44034 11.4675 3.28713 11.0489 3.15942ZM14.1426 4.88039C14.3265 5.04392 14.4987 5.21488 14.6583 5.39253L14.6127 5.51416C14.4407 5.36095 14.2561 5.2217 14.0605 5.09818L14.1426 4.88039ZM15.5298 6.68198C15.3005 6.2501 14.998 5.8631 14.6387 5.53757L14.6828 5.42001C15.0297 5.81109 15.3154 6.23425 15.5298 6.68198ZM14.0487 5.12934C14.2443 5.25327 14.4287 5.39307 14.6004 5.54692L14.5948 5.56178L13.9732 5.32965L14.0487 5.12934ZM10.9782 3.17216C11.402 3.2984 11.8077 3.45074 12.1919 3.62645L11.0349 3.83342L10.9189 3.18287L10.9782 3.17216ZM3.8081 3.62645C4.19225 3.45074 4.598 3.29841 5.0217 3.17217L5.08103 3.18287L4.96511 3.83342L3.8081 3.62645ZM7.13796 11.5565C6.9828 11.7144 6.81515 11.8599 6.63661 11.9915L6.44033 11.7462L6.95826 11.3317L7.13796 11.5565ZM11.8261 10.7143C10.6825 10.7143 9.75547 9.78714 9.75547 8.64363C9.75547 7.49998 10.6825 6.57298 11.8261 6.57298C12.9696 6.57298 13.8968 7.49997 13.8968 8.6436C13.8944 9.78613 12.9687 10.7119 11.8261 10.7143ZM11.8261 7.23598C11.0487 7.23598 10.4185 7.86617 10.4185 8.64363C10.4185 9.421 11.0487 10.0512 11.8261 10.0512C12.6035 10.0512 13.2336 9.42099 13.2336 8.64363C13.2336 7.86617 12.6035 7.23598 11.8261 7.23598ZM11.4946 8.31207H12.1576V8.9751H11.4946V8.31207ZM4.17388 10.7143C3.03025 10.7143 2.10326 9.78714 2.10326 8.64363C2.10326 7.49998 3.03026 6.57298 4.17391 6.57298C5.31755 6.57298 6.24454 7.49997 6.24456 8.6436C6.24217 9.78613 5.31651 10.7119 4.17388 10.7143ZM4.17391 7.23598C3.39655 7.23598 2.76626 7.86617 2.76626 8.64363C2.76626 9.421 3.39658 10.0512 4.17391 10.0512C4.95124 10.0512 5.58156 9.421 5.58156 8.64363C5.58156 7.86617 4.95124 7.23598 4.17391 7.23598ZM3.84235 8.31207H4.50548V8.9751H3.84235V8.31207Z" fill="white" stroke="white" stroke-width="0.0326087" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_250_576">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="article-main-sidebar-right">
                        <h4 class="article-main-sidebar-title">
                            <?php echo _e('You might like','panicbear-plugin'); ?>
                        </h4>
                        <div class="article-main-posts">
                            <?php
                            // get trending post use wp_query
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'order' => 'DESC',
                                'post_status' => 'publish',
                                'post__not_in' => array(get_the_ID()),
                                'tag' => 'trending',
                            );
                            $trending_posts = new WP_Query($args);
                            while ($trending_posts->have_posts()) : $trending_posts->the_post();
                            ?>
                                <div class="article-main-post-item">
                                    <div class="article-main-post-item-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                    <div class="article-main-post-item-content">
                                        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="article-footer animated fadeIn slow">
            <h3 class="article-related-post-title"><?php _e('Related Blogs', 'panicbear-plugin'); ?></h3>
            <div class="article-related-post">
                <div class="container">
                    <div class="blog-listing-grid">
                        <?php
                        // get related post use wp_query
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 2,
                            'order' => 'DESC',
                            'category__in' => wp_get_post_categories(get_the_ID()),
                            'post__not_in' => array(get_the_ID()),
                        );
                        $related_posts = new WP_Query($args);
                        while ($related_posts->have_posts()) : $related_posts->the_post();
														include PANICBEAR_STUDIO__PLUGIN_DIR . 'templates/custom-template.php';
						/*
                        ?>

                            <article class="blog-grid-item">
                                <div class="blog-grid-item-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
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
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
<?php

$args = array(
    'post_type'   => 'gallery-grid-post',
    'suppress_filters' => 0,
    'order' => 'ASC',
    'numberposts' => -1,
);

$gallery_post = get_posts($args);

$all_image = array();
$list_image = array();
$total_page = array();
$item_count = 9;
if (wp_is_mobile()) {
    $item_count = 6;
}
foreach ($gallery_post as $key => $post) {
    $list_image[$post->ID] = get_field('gallery_image', $post->ID);
    $total_page[$post->ID] = ceil(count($list_image[$post->ID]) / $item_count);
    $all_image = array_merge($all_image, $list_image[$post->ID]);
    $list_image[$post->ID] = array_slice($list_image[$post->ID], 0, $item_count);
}

usort($all_image, "cmpGalleryGrid");

$total_page['all'] = ceil(count($all_image) / $item_count);
$all_image = array_slice($all_image, 0, $item_count);
?>
<section class="page-content bottom-space-7 single-blog-gallery" id="page-content">
    <div class="saobien"></div>
    <div class="saobiennho"></div>
    <div class="page-content__leaf-left-top"></div>
    <div class="single-blog-gallery__leaf"></div>
    <div class="container">
        <div class="blog-intro-content">
            <h3 class="blog-intro-title"><?php _e('Snapshot of','panicbear-plugin');?></h3>
            <h4 class="blog-intro-sub-title"><?php _e('Carmelina','panicbear-plugin');?></h4>
            <div class="blog-intro-description">
                <p>
                    <span class="s2">
                        <?php _e('Let our photos transport you to your next getaway.','panicbear-plugin'); ?>
                    </span>
                </p>
            </div>
        </div>
        <?php foreach ($gallery_post as $post) :
            setup_postdata($post);
        ?>
            <div class="gallery-grid">
                <?php
                if ($list_image[get_the_ID()]) {
                ?>
                    <div class="gallery-grid-container top-space-4">
                        <?php foreach ($list_image[get_the_ID()] as $img) : ?>
                            <div class="gallery-grid-item">
                                <a href="<?php echo $img['url']; ?>"><img src="<?php echo $img['sizes']['medium_large']; ?>" alt="<?php echo $img['alt']; ?>" /></a>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
            break;
        endforeach;
        wp_reset_postdata();
        ?>
        <a href="https://www.instagram.com/carmelina.beach.resort" class="btn-wave">
            <?php _e('View more','panicbear-plugin'); ?>
        </a>
    </div>
</section>
<?php
get_template_part('template-parts/home/home', 'location');
get_template_part('template-parts/home/footer', 'form');
get_footer();
