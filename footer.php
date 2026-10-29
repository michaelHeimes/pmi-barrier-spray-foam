<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _pmi-barrier-spray-foam
 */
 $global_footer_logo = get_field('global_footer_logo', 'option') ?? null;
 $global_footer_contact_info = get_field('global_footer_contact_info', 'option') ?? null;
 $footer_nav_1_title = get_field('footer_nav_1_title', 'option') ?? null;
 $footer_nav_2_title = get_field('footer_nav_2_title', 'option') ?? null;
?>

	<footer id="colophon" class="footer site-footer">
		<div class="shell">
			<div class="footer-inner">
				<a href="<?=get_home_url();?>" class="footer-logo" aria-label="link to home page">
					<?php if($global_footer_logo ) {
						echo wp_get_attachment_image( $global_footer_logo['id'], 'full' );
					};?>
					<span class="sr-only"><?=bloginfo('name');?></span>
				</a>
			</div><!-- /.footer-inner -->
			
			<div class="footer-content">
				<div class="footer-cols">
					<?php if($global_footer_contact_info):?>
						<div class="footer-col footer-col-size1 list-contacts">
							<div class="footer-content-inner">
								<h5>Contact Us</h5>
									<?=wp_kses_post( $global_footer_contact_info );?>
							</div><!-- /.footer-content-inner -->
						</div><!-- /.footer-col footer-col-size1 -->
					<?php endif;?>
					<div class="footer-col footer-col-size2 mobile-hidden">
						<div class="footer-content-inner">
							<?php if( $footer_nav_1_title ):?>
								<h5><?=wp_kses_post( $footer_nav_1_title );?></h5>
							<?php endif;?>
							
							<?php
							wp_nav_menu(
								array(
									'container'			=> false,
									'menu_id'			=> 'main-nav',
									'menu_class'		=> 'list-links',
									'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'theme_location'	=> 'footer-nav-1',
									'depth'				=> 0,
								)
							);
							?>
						</div><!-- /.footer-content-inner -->
					</div><!-- /.footer-col footer-col-size2 -->
					
					<div class="footer-col footer-col-size3 mobile-hidden">
						<div class="footer-content-inner">
							<?php if( $footer_nav_2_title ):?>
								<h5><?=wp_kses_post( $footer_nav_2_title );?></h5>
							<?php endif;?>
							
							<?php
							wp_nav_menu(
								array(
									'container'			=> false,
									'menu_id'			=> 'main-nav',
									'menu_class'		=> 'list-links',
									'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'theme_location'	=> 'footer-nav-2',
									'depth'				=> 0,
								)
							);
							?>
						</div><!-- /.footer-content-inner -->
					</div><!-- /.footer-col footer-col-size3 -->
				</div><!-- /.footer-cols -->
			</div>
		</div>
	</footer>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</div><!-- .wrapper -->

</body>
</html>
