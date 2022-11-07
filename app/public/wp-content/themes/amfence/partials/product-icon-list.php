<section class="product-icon-list">
	<div class="container">
		<div class="row">
			
			<?php 
			$icon_rows = get_sub_field('product_icons');
			if($icon_rows){
				foreach($icon_rows as $icon_row){
				?>
					<div class="col">
						
							<div class="icon">
								<a href="<?php echo $icon_row['pil_link']; ?>"><img src="<?php echo $icon_row['pil_image']; ?>" /></a>
							</div>
							<h4><a href="<?php echo $icon_row['pil_link']; ?>"><?php echo $icon_row['pil_title']; ?></a></h4>
						
					</div>
				<?php
				}
			}
			?>
		</div>
	</div>
</section>