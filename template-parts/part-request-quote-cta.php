<?php 
$global_request_quote_cta = $args['global_request_quote_cta'] ?? null; 
if($global_request_quote_cta):
	$link = $global_request_quote_cta;
	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';
?>
	<a href="?php echo esc_url( $link ); ?>" class="btn btn-default header-btn" target="<?php echo esc_attr( $link_target ); ?>">
		<span class="btn-frame">
			<i class="ico-logo hidden-xs hidden-sm"></i>
			<i class="ico-list visible-xs-inline-block"></i>
			<span class="hidden-xs"><?php echo esc_html( $link_title ); ?></span>
		</span>
	</a>
<?php endif;?>