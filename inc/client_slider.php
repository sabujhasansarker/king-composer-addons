<?php
add_action( 'init', 'slider_funtion' );
function slider_funtion()
{
	global $kc;
	$kc->add_map(array(
		'client_slider'=> array(
	            	'name'=>'Client Rating',
	            	'description' => __('Displaing Client', 'amazing'),
	            	'css_box'     => true,
	                'icon' => 'fa-star',
	                'category' => 'Amazing',
	                'params' => array(
                		'Add Items'=>array(
                			array(
	                			'name' => 'group_item',
		                        'label' => 'Add Testimonial Items',
		                        'type' => 'group',
		                        'options'     => array( 'add_text' => __( 'Add new items', 'amazing' ) ),
		                        'params'=> array(
		                        	array(
										'name'  => 'client_name',
										'label' => 'Inter Client Name',
										'type'  => 'text',
									),
									array(
										'name'  => 'client_image',
										'label' => 'Inter Client Image',
										'type'  => 'attach_image_url',
									),
									array(
										'name'  => 'client_comment',
										'label' => 'Inter Client Comment',
										'type'  => 'textarea',
									),
									array(
										'name' => 'client_rating',
										'label' => 'Rating',
										'type' => 'select',  // USAGE SELECT TYPE
										'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
											'no_rating' => 'No Rating',
											'1' => '1',
											'2' => '2',
											'3' => '3',
											'4' => '4',
											'5' => '5',
										),
										'value' => 5, 
									),
		                        )
	                			)
                		),
	                	'Setting' => array(
							array(
								'name' => 'show_dots',
								'label' => 'Show Dots?',
								'type' => 'toggle',
								'value' => 'yes',
								'description' => 'Check Yes If you want to Show Dots in Testimonial slide'
							),
							array(
								'name' => 'slider_speed',
								'label' => 'Slider Speed',
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => 200,
									'max' => 5000,
									'unit' => 'ms',
									'show_input' => true
								),

								'value' => 800, // remove this if you do not need a default content
								'description' => 'Duration of Slide Speed, Default is 800 (in ms)',
							),
							array(
								'name' => 'slider_autoplay',
								'label' => 'Autoplay?',
								'type' => 'toggle',
								'value' => 'yes',
								'description' => 'Check Yes If you want to autoplay Testimonial'
							),
							array(
								'name' => 'autoplay_duration',
								'label' => 'Autoplay Duration',
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => 1000,
									'max' => 15000,
									'unit' => 'ms',
									'show_input' => true
								),
								'relation' => array(
									'parent'    => 'slider_autoplay',
									'show_when' => 'yes'
								),

								'value' => 3000, // remove this if you do not need a default content
								'description' => 'Chose Autoplay Duratoin as MS. Default is 4000MS',
							),
						),
						'style' => array(
							array(
								'name'    => 'amazing_slider',
								'type'    => 'css',
								'options'		=> array(
									array(
										'Class' => array(
											array('property' => 'container_name', 'label' => 'Container name'),
											array('property' => 'row_name', 'label' => 'Row name'),
										),
										'Dots' => array(
											array( 'property' => 'background-color', 'label' => 'Active Color'),
											array( 'property' => 'background-color', 'label' => 'Hover Color', 'selector' => ':hover' ),
										),

										'Background' => array(
											array( 'property' => 'background', 'label' => 'Background Color or Image')
										),
									)
								)
							)
						),		
	                )
	            ),
	));
	add_shortcode( 'client_slider', 'slider_callback' );
	function slider_callback($atts){
		
$atts['amazing_slider'] = str_replace('`{', '`:{', $atts['amazing_slider']);
$atts['amazing_slider'] = str_replace('`', '"', $atts['amazing_slider']);

$amazing_slider = json_decode($atts['amazing_slider'], true);
// print_r($atts[]);
?>

    <div class="<?php echo($amazing_slider['kc-css']['any']['class']['container_name|']) ?>">
        <div class="<?php echo($amazing_slider['kc-css']['any']['class']['row_name|']) ?>">
            <amp-carousel id="carousel" width="1200" height="630" layout="responsive" type="slides" autoplay delay="<?php echo($atts['autoplay_duration']) ?>" on="slideChange:cSelector.toggle(index=event.index, value=true)">
                <?php 
                    if ($atts['group_item']) {
                        foreach ($atts['group_item'] as $key => $item) {
                           ?>
                           <div class="slide-wrap">
                                <span class="gLogo"><amp-img width="241" height="80" layout="intrinsic" src="<?php echo $item->client_image; ?>" alt="gLogo"></amp-img></span>                    
                                <div class="slideMid">
                                    <p><?php echo $item->client_comment; ?></p>
                                </div>
                                <span class="star"><amp-img width="243" height="41" layout="intrinsic" src="<?php echo get_template_directory_uri() ?>/image/star.png" alt="star"></amp-img></span>
                                <h6><?php echo $item->client_name; ?></h6>
                            </div> 
                           <?php
                        }
                    }
                 ?>
                              
            </amp-carousel>
            <amp-selector id="cSelector" on="select:carousel.goToSlide(index=event.targetOption)" layout="container">
                <?php 
                    for ($i=0; $i < count($atts['group_item']); $i++) { 
                 ?>
                <span option="<?php echo $i; ?>" <?php echo $i>1 ? '' : 'selected' ?>></span>    <?php } ?>
            </amp-selector>
        </div>
    </div>
    <?php
	}
}