<section class="product-color-choices">
	<div class="container">
		<div class="row"><div class="col"><h2>Standard Colors</h2></div></div>
		<div class="row panel-list">
			<?php 
			$rows = get_sub_field('panel_type_list');
			if($rows){
				foreach($rows as $row){
				?>
					<div class="col">
						<div class="panel-type-container" style="background-image:url(<?php echo $row['panel_type_image']; ?>)">
							<h3><?php echo $row['panel_type']; ?></h3>
						</div>
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