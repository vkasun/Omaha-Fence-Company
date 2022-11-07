<?php
	$page_id = get_the_ID();
	
?>
<section id="customer-experience">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2><?php echo get_field('cem_title', $page_id); ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<p><?php echo get_field('cem_description', $page_id); ?></p>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<?php
				
				$icon_rows = get_field('cem_icons');
				if($icon_rows){
					echo '<div class="row">';
					$col_count = 1;
					
					foreach($icon_rows as $icon_row){
						
					?>
						<div class="col">
							<a href="<?php echo $icon_row['cem_link']; ?>">
							<div class="icon icon-pencil">
								<img src="<?php echo $icon_row['cem_icons_image']; ?>" />
							</div>
							<h4><?php echo $icon_row['cem_icons_title']; ?></h4>
							</a>
						</div>
					<?php
						if($col_count % 3 == 0){
							echo '</div><div class="row">';
						}
						$col_count++;
					}
					echo "</div>";
				}
				?>
			</div>
		</div>
	</div>
</section>