<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _pmi-barrier-spray-foam
 */
 
 $fields = get_fields();
 
 $mobile_image = $fields['mobile_image'] ?? null;
 $slides = $fields['slides'] ?? null;
 
 $global_phone_number = get_field('global_phone_number', 'option') ?? null;
 $global_request_quote_cta = get_field('global_request_quote_cta', 'option') ?? null;
 
get_header();
?>

	<main id="primary" class="site-main">
		<?php if($mobile_image):?>
			<?=wp_get_attachment_image( $mobile_image['id'], 'large', false, array( 'class' => 'mobile-image' ) );?>
		<?php endif;?>
		<?php if( $slides && is_array( $slides) ):?>
		   <div class="slider">
			 <div class="slider-clip">
			   <div class="slides">
				   	<?php foreach( $slides as $slide):
						$image = $slide['image'] ?? '';
						$text = $slide['text'] ?? null;
						$cta = $slide['cta'] ?? null;
					?>
						<div class="slide" style="background-image: url(<?=esc_url($image['url']);?>);">
							<div class="slide-content">
								<?php if($text):?>
									<h4>
										<?=wp_kses_post( $text );?>
									</h4>	
								<?php endif;?>
								<?php if($cta):
									$link = $cta;
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';	
								?>
									<a class="btn btn-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
										<span><?php echo esc_html( $link_title ); ?></span>
										<i class="ico-arrow"></i>
									</a>
								<?php endif;?>		
							</div>						
							<!-- /.slide-content --> 
						</div>
						<!-- /.slide -->
					<?php endforeach;?>
			   </div>
			   <!-- /.slides --> 
			 </div>
			 <!-- /.slider-clip --> 
		   </div>
		   <!-- /.slider -->
		<?php endif;?>

		<section class="section">
			<div class="shell">
				
				<?php the_content();?>
				
				<?php if( $global_phone_number || $global_request_quote_cta ):?>
					<div class="section-actions">
						<ul class="list-actions text-center section-list">
							<?php if( $global_phone_number ):?>
								<li>
									<a href="tel:<?=esc_attr( $global_phone_number );?>">
										<span class="hidden-xs">Tel: <?=esc_attr( $global_phone_number );?></span>
										<i class="ico-phone visible-xs-inline-block"></i>
									</a>
								</li>
							<?php endif;?>
							<?php if( $global_request_quote_cta ):?>
							<li>
								<?php get_template_part('/template-parts/part', 'request-quote-cta',
									array(
										'global_request_quote_cta' => $global_request_quote_cta,
									) 
								);?>
							</li>
							<?php endif;?>
						</ul>
						
						<?php get_template_part('template-parts/section', 'service-buckets')?>
						<!-- /.list-services --> 
						
					</div>
					<!-- /.section-actions --> 
				<?php endif;?>
			</div>
			<!-- /.shell --> 
		</section>
		<!-- /.section -->

		<!-- /.main-actions -->
		<?php get_template_part('template-parts/section', 'main-actions',
			array(
				'classes' => '',
			)
		)?>
		
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
