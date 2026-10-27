<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _pmi-barrier-spray-foam
 */

 $global_header_logo = get_field('global_header_logo', 'option') ?? null;
 $global_phone_number = get_field('global_phone_number', 'option') ?? null;
 $global_request_quote_cta = get_field('global_request_quote_cta', 'option') ?? null;
 $slider_images = get_field('slider_images') ?? null;
 $banner_image = get_field('banner_image') ?? null;
 $banner_image_404 = get_field('banner_image_404', 'option') ?? null;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/x-icon" href="<?=get_template_directory_uri();?>/images/favicon.ico" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'pmi-barrier-spray-foam' ); ?></a>

<div class="wrapper">
	<header class="header">
		<div class="header-inner">
			<div class="shell">

				<a href="<?=get_home_url();?>" class="logo" aria-label="link to home page">
					<?php if($global_header_logo ) {
						echo wp_get_attachment_image( $global_header_logo['id'], 'full' );
					};?>
					<span class="sr-only"><?=bloginfo('name');?></span>
				</a>
	
				<div class="header-content">
					<?php if( $global_phone_number || $global_request_quote_cta ):?>
						<ul class="list-actions">
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
						</ul><!-- /.list-actions -->
					<?php endif;?>
					<a href="#" class="nav-trigger">
						<span class="text">menu</span>
	
						<span class="lines"></span>
					</a>
				</div><!-- /.header-content -->			
				</div><!-- /.shell -->
		</div><!-- /.header-inner -->
	
		<nav class="nav">
			<div class="shell">
				<?php
				wp_nav_menu(
					array(
						'container'			=> false,
						'menu_id'			=> 'main-nav',
						'menu_class'		=> 'clearfix',
						'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'theme_location'	=> 'main-nav',
						'depth'				=> 2,
					)
				);
				?>
			</div><!-- /.shell -->
		</nav><!-- /.nav -->
	</header><!-- /.header -->
