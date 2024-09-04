<?php 
	$pop = get_field('popup_pages');
	//var_dump($pop->ID);exit();
	
	$img = wp_get_attachment_image(get_field('popup_mobile_image', $pop->ID));
?>


<div class="cs-popup">
	<div class="inner">
		<div class="ct">
			<?php echo $img; ?>
		</div>
	</div>
	<div class="overlay"></div>
</div>