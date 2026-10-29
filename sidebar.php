<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _pmi-barrier-spray-foam
 */
 $global_service_ctas = get_field('global_service_ctas', 'option') ?? null;
 $global_phone_number = get_field('global_phone_number', 'option') ?? null;
 $global_request_quote_cta = get_field('global_request_quote_cta', 'option') ?? null;
?>

<div class="sidebar">
    <ul class="widgets">
        <li class="widget-simple">
            <div class="widget-head">
                <h5 class="widget-title">Services</h5>
                <!-- /.widget-title -->
            </div>
            <!-- /.widget-head -->

            <div class="widget-body">
                <?php if( $global_service_ctas && is_array($global_service_ctas) ):
                ?>
                    <ul>
                        <?php foreach( $global_service_ctas as $global_service_cta):
                            $link = $global_service_cta['link'] ?? null;
                            if($link):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <li>
                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <?php if($link_title):?>
                                        <?=wp_kses_post( $link_title );?>
                                    <?php endif;?>
                                </a>
                            </li>
                        <?php endif; endforeach;?>
                    </ul>
                <?php endif;?>
            </div>
            <!-- /.widget-body -->
        </li>
        <!-- /.widget widget-simple -->

        <li class="widget">
            
            <?php if( $global_phone_number || $global_request_quote_cta ):?>
                    <ul class="list-actions text-left widget-list">
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
                    
                <!-- /.section-actions --> 
            <?php endif;?>

        </li>
        <!-- /.widget -->
    </ul>
    <!-- /.widgets -->
</div>
