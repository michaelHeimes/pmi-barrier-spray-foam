
<?php
$classes = $args['classes'] ?? '';

$global_footer_cta_background_image = get_field('global_footer_cta_background_image', 'option');
$global_footer_ctas = get_field('global_footer_ctas', 'option') ?? [];

$background_image_url = '';

if (is_array($global_footer_cta_background_image)) {
	$background_image_url = $global_footer_cta_background_image['url'] ?? '';
} elseif (is_numeric($global_footer_cta_background_image)) {
	$background_image_url = wp_get_attachment_image_url($global_footer_cta_background_image, 'full');
} elseif (is_string($global_footer_cta_background_image)) {
	$background_image_url = $global_footer_cta_background_image;
}

if (!empty($global_footer_ctas) && is_array($global_footer_ctas)):
?>
	<div class="main-actions<?= $classes ? ' ' . esc_attr($classes) : ''; ?>"
		<?php if ($background_image_url): ?>
			style="background-image: url('<?= esc_url($background_image_url); ?>');"
		<?php endif; ?>
	>
		<div class="shell">
			<div class="main-actions-inner">

				<?php foreach ($global_footer_ctas as $cta):
					$link = $cta['link'] ?? null;

					if (empty($link) || !is_array($link)) {
						continue;
					}

					$link_url = $link['url'] ?? '';
					$link_title = $link['title'] ?? '';
					$link_target = $link['target'] ?: '_self';

					if (!$link_url) {
						continue;
					}
				?>
					<a href="<?= esc_url($link_url); ?>"
					   class="btn btn-default btn-default-large"
					   target="<?= esc_attr($link_target); ?>">
						<span class="btn-frame">
							<i class="ico-logo"></i>
							<span><?= esc_html($link_title); ?></span>
						</span>
					</a>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
<?php endif; ?>
