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
			if (!empty($categories)) : 
				foreach($categories as $index => $categorie) :
				if($index > 2) continue;
			?>
				<a href="<?php echo esc_url(get_category_link($categorie->term_id)); ?>" class="blog-grid-item-category"><?php echo esc_html($categorie->name); ?></a>
			<?php
				endforeach;
			endif;
			?>
<!-- 			<span class="blog-grid-item-divider"></span> -->
		</div>
		<h2 class="blog-grid-item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
		<span class="blog-grid-item-date">
			<?php _e('Posted','panicbear-plugin'); ?>: <?php echo get_the_date(); ?>
		</span>
		<p class="blog-grid-item-excerpt">
			<?php
			echo wp_trim_words(get_the_content(), 20, '...');
			?>
		</p>
	</div>
</article>