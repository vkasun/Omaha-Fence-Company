</div> <!-- end main content -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
				<p class="palm-description">
					<?php
						if(get_field('footer_content', 'option')){
							echo get_field('footer_content', 'option');
						}
					?>
				</p>
			</div>
			<div class="col-lg-8">
				<div class="row">
                    <div id="footer-locations" class="col">
                        <h3>Locations</h3>
                        <?php echo do_shortcode('[amfence-locations class="locations" cols="1"][/amfence-locations]') ?>
                    </div>
						<?php
							$rows = get_field('footer_menus', 'option');
							//var_dump($rows);
							if($rows){
								foreach($rows as $row){
								?>
									<div class="col">
										<h3><?php echo $row['footer_menu_title']; ?></h3>
											<?php echo wp_nav_menu( array( 'menu' => $row['footer_menu'], 'depth' => 1) ); ?>
									</div>
								<?php
								}
							}
						?>
						
					<!--<div class="col-auto">
						<h3>Connect</h3>
						<div class="social-container">
							<a href="https://www.pinterest.com/americanfencecompany/" target="_blank"><div class="pinterest-white-alt"></div></a>
						</div>
					</div>-->
				</div>
			</div>
			
        </div>
		<div class="row">
			<div class="col text-center copyright">
				<span style="font-size:16px;">6925 N 94th Plaza - Omaha, NE 68122 | tel: 402-896-6722 | email: <a href="mailto:customercareomaha@americafence.com">customercareomaha@americafence.com</a><br></span>
				Copyright ©<?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>. All Rights Reserved.<br>
				Details and information are subject to change without notice.
			</div>
		</div>
    </div>
</footer>

<?php wp_footer(); ?>
<script>
jQuery ( document ).ready ( function($) {

var hash= window.location.hash

if ( hash == '' || hash == '#' || hash == undefined ) return false;

	    
      var target = $(hash);
    
      headerHeight = 120;
      
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      
      if (target.length) {
        $('html,body').stop().animate({
          scrollTop: target.offset().top - 125 //offsets for fixed header
        }, 'linear');
        
      }

} );
</script>

</body>
</html> 

