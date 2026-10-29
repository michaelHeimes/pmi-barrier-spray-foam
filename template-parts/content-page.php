<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _pmi-barrier-spray-foam
 */
$thumbnail_url = get_the_post_thumbnail_url();
?>

<div class="intro" style="background-image: url(<?=esc_url($thumbnail_url);?>);"></div>

<div class="main">
	<div class="container">
		<div class="shell">
			<div class="content">

				<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				
					<div class="entry-content">
						<?php
						the_content();
				
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pmi-barrier-spray-foam' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->
				
			</div>
			
			<?php get_sidebar();?>
			
		</div>
	</div>
	
	<div class="shell">
		<?php get_template_part('template-parts/section', 'service-buckets')?>
		<!-- /.list-services --> 
	</div>
	
	<?php get_template_part('template-parts/section', 'main-actions',
		array(
			'classes' => 'main-actions-alt',
		)
	)?>
	
</div>
