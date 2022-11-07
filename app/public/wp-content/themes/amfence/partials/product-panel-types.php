<?php 

$vars = get_query_var('args');
$counter = $vars['counter'];
$link_target = false;
$heading = 'Panel Infill Options';
if(get_sub_field('product_variation_heading')){
	$heading = get_sub_field('product_variation_heading');
}
$class = '';
if(get_sub_field('row_background_color')){
	$class = get_sub_field('row_background_color');
}
if(get_sub_field('section_width')){
	$width_class = get_sub_field('section_width');
}
if(get_sub_field('css_class')){
	$css_class = get_sub_field('css_class');
	if($css_class == 'gradient-list'){
		$class = 'bg-white';
		$link_target = true;
	}
	if($css_class == 'box-border'){
		$link_target = true;
	}
}

?>

<section class="product-panel-type-list <?php echo $class . " " . $width_class . " " . $css_class; ?>" id="section<?php echo $counter; ?>">
	<div class="container">
		<?php 
		if(get_sub_field('product_variation_heading')){ 
			if(get_sub_field('product_heading_type') != 'none'){
				
				$h = '<' . get_sub_field('product_heading_type') . '>';
				$he = '</' . get_sub_field('product_heading_type') . '>';
				if($css_class == 'gradient-list'){ /* leave row open to keep all items in same row */ ?>
					<div class="row panel-list"><div class="col"><?php echo $h . $heading . $h3; ?></div>
					<?php
				}
				else{
					?>
					<div class="row"><div class="col"><?php echo $h . $heading . $h3; ?></div></div>
					<div class="row panel-list">
					<?php
				}
			}
		}

			$rows = get_sub_field('panel_type_list');
			
			if($rows){
					$num_items = sizeof($rows);
					if($num_items % 12 == 0){
						$cols = 3;
					}
					elseif($num_items % 3 == 0){
						$cols = 4;
					}
					elseif($num_items % 4 == 0){
						$cols = 3;
					}
					elseif($num_items > 10){
						$cols = 3;
					}
					elseif($num_items % 2 == 0){
						$cols = 6;
					}
					elseif($num_items > 4){
						$cols = 4;
					}
					else{
						$cols = 8;
					}
				foreach($rows as $row){
					$panel_class = '';
					$panel_link = '';
					$img_class = '';
					if($row['background_image_height']){
						$img_class = $row['background_image_height'];
					}
					if($row['panel_link']){
						$panel_link = $row['panel_link'];
						$panel_class = 'clickable';
					}
				if(!$link_target){
				?>
					<div id="<?php echo str_replace(' ', '_', strtolower($row['panel_type'])); ?>" class="col-lg-<?php echo $cols; ?> col-lg-<?php echo $cols; ?> col-sm-12 col-xs-12">
						<?php 
				}
				else if($css_class == 'gradient-list'){
					?>
					<div id="<?php echo str_replace(' ', '_', strtolower($row['panel_type'])); ?>" class="col <?php echo $panel_class; ?>" data-target="<?php echo $panel_link; ?>">
					<?php
				}
				else{
					?>
					<div id="<?php echo str_replace(' ', '_', strtolower($row['panel_type'])); ?>" class="col-lg-<?php echo $cols; ?> col-lg-<?php echo $cols; ?> col-sm-12 col-xs-12 <?php echo $panel_class; ?>" data-target="<?php echo $panel_link; ?>">
					<?php
				}
				
							if($row['panel_type_image']){ 
								$class1 = '';
								$image_url = $row['panel_type_image'];
								
								
								?>
								<?php
								if(!$link_target && $panel_link){
									?>
									<a href="<?php echo $panel_link; ?>">
										<div>
											<div class="panel-type-container <?php echo $img_class . $class1; ?>" style="background-image:url(<?php echo $image_url; ?>)"></div>
											<h3><?php echo $row['panel_type']; ?></h3>
										</div>
									</a>
									<?php
								}
								else{
									?>
									<div><div class="panel-type-container <?php echo $img_class . $class1; ?>" style="background-image:url(<?php echo $image_url; ?>)">
									
									</div>
									<h3><?php echo $row['panel_type']; ?></h3>
									</div>
									<?php
								}
							}
							else{
								?>
								<h3><?php echo $row['panel_type']; ?></h3>
								<?php
							}
							?>
						<div>
							<?php echo $row['panel_description']; ?>
						</div>
					</div>
				<?php
				}
			}
			?>
		</div>
	</div>
</section>