<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$global_service_ctas = get_field('global_service_ctas', 'option') ?? null;
if( $global_service_ctas && is_array($global_service_ctas) ):
?>
	<ul class="list-services">
		<?php foreach( $global_service_ctas as $global_service_cta):
			$background_image = $global_service_cta['background_image'] ?? null;
			$link = $global_service_cta['link'] ?? null;
			if($link):
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
		?>
			<li>
				<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					<?php if($background_image):?>
						<figure>
							<?=wp_get_attachment_image( $background_image['id'], 'large' );?>
						</figure>
					<?php endif;?>
					<?php if($link_title):?>
					<div>
						<span>
							<?=wp_kses_post( $link_title );?>
						</span>
						<i class="ico-arrow"></i>
					</div>
					<?php endif;?>
				</a>
			</li>
		<?php endif; endforeach;?>
	</ul>
<?php endif;?>