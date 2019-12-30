<?php
add_action( 'init', 'client_funtiion', );
function client_funtiion()
{
	global $kc;
	$kc->add_map(array(
			'client'=> array(
	            	'name'=>'Client',
	            	'description' => __('Displaing Client', 'amazing'),
	            	'css_box'     => true,
	                'icon' => 'sl-emotsmile',
	                'category' => 'Amazing',
	                'params' => array(
                		'Add Items'=>array(
                			array(
                				'name'=>'title',
                				'label' => 'Add Title',
		                        'type' => 'text',
                			),

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
										'name'    => 'client_single_image',
										'type'    => 'css',
										'options'		=> array(
											array(
												'Class' => array(
													array('property' => 'width', 'label' => 'Width'),
													array('property' => 'height', 'label' => 'Height'),
													
												)
											)
										)
									),
									array(
										'name'  => 'client_link',
										'label' => 'Inter Client link',
										'type'  => 'link',
									),
									array(
										'name'=>'single_client_toggle',
										'label'=>'Show Oncllick Event',
										'type' => 'toggle',
										'value' => 'no',
									),
									array(
										'name' => 'single_click',
										'label' => 'Onclick Toggle',
										'type' => 'select',  // USAGE SELECT TYPE
										'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
											'no_rating' => 'No event',
											'tap' => 'tap',
											'buttom' => 'buttom',
											'left' => 'left',
											'right' => 'right',
										),
										'relation' => array(
											'parent'    => 'single_toggle',
											'show_when' => 'yes'
										),
									),
									array(
										'name' => 'single_image_class',
										'label' => 'Onclick Toggle class',
										'type' => 'select',  // USAGE SELECT TYPE
										'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
											'no_rating' => 'No Class',
											'toggleMenu' => 'toggleMenu',
											'gPopup' => 'gPopup',
										),
										'relation' => array(
											'parent'    => 'single_client_toggle',
											'show_when' => 'yes'
										),
									),
									
		                        )
	                			)
                		),
						'style' => array(
							array(
								'name'    => 'cliend_style',
								'type'    => 'css',
								'options'		=> array(
									array(
										'Class' => array(
											array('property' => 'container_name', 'label' => 'Container name'),
											array('property' => 'row_name', 'label' => 'Row name'),
										)
									)
								)
							)
						),		
	                )
	            ),
	));
	add_shortcode( 'client', 'client_callback' );
	function client_callback($atts){
	$atts['cliend_style'] = str_replace('`{', '`:{', $atts['cliend_style']);
	$atts['cliend_style'] = str_replace('`', '"', $atts['cliend_style']);
	$cliend_style = json_decode($atts['cliend_style'], true);
 ?>
<div class="<?php echo($cliend_style['kc-css']['any']['class']['container_name|'] ) ?>">
        <div class="<?php echo($cliend_style['kc-css']['any']['class']['row_name|'] ) ?>">
            <span><?php echo $atts['title']; ?></span>
            <ul>
            	<?php 
            		if ($atts['group_item']) {
            			foreach ($atts['group_item'] as $key => $item) {
            							$item->client_single_image=str_replace('`{', '`:{', $item->client_single_image);
            							$item->client_single_image=str_replace('`', '"', $item->client_single_image);
            							$client_single_image = json_decode($item->client_single_image, true);
            							// print_r($client_single_image);

	            			?>
	            			<li><<?php echo $item->single_client_toggle == 'yes' ? 'button on="'.$item->single_click.':
	            			'.$item->single_image_class.'"' : 'a href="'.$item->client_link.'"'; ?>><amp-img width="<?php echo($client_single_image['kc-css']['any']['class']['width|']) ?>" height="<?php echo($client_single_image['kc-css']['any']['class']['height|']) ?>" layout="responsive" src="<?php  echo $item->client_image ?>" alt="upLogo"></amp-img></<?php echo $item->single_client_toggle == 'yes' ? 'button' : 'a' ?>></li>
	            			<?php
            			}
            		}
            	 ?>
           </ul>
        </div>
    </div>
    <?php
	}
}