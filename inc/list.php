<?php

add_action( 'init', 'list_item' );
function list_item(){
	global $kc;
	$kc->add_map(array(
		'list'=> array(
            	'name'=>'List item',
            	'description' => __('Displaing Client', 'amazing'),
            	'css_box'     => true,
                'icon' => 'sl-list',
                'category' => 'Amazing',
                'params' => array(
            		'Add List'=>array(
            			array(
            					'name' => 'list_item',
		                        'label' => 'Add List Items',
		                        'type' => 'group',
		                        'options'     => array( 'add_text' => __( 'Add new items', 'amazing' ) ),
		                        'params'=> array(
		                        	array(
										'name'  => 'list',
										'label' => 'Inter list',
										'type'  => 'text',
									),
		                        )
                			),
            			array(
            					'name' => 'order',
								'label' => 'List type',
								'type' => 'select',  // USAGE SELECT TYPE
								'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'ul' => 'Unordered list',
									'ol' => 'Ordered list',
								),
								'value' => 'ul', 
							),
						array(
								'name' => 'style',
								'label' => 'List style',
								'type' => 'select',  // USAGE SELECT TYPE
								'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'none' => 'None',
									'disc' => 'Disc',
									'circle' => 'Circle',
									'decimal' => 'Decimal',
									'decimal-leading-zero' => 'Decimal leading zero',
									'lower-alpha' => 'Lower alpha',
									'upper-alpha' => 'Upper alpha',
								),
								'value' => 'none', 
								),
						array(
		                        'name' => 'class_name',
		                        'label' => 'Class Name',
		                        'type' => 'text',
		                        'admin_label' => true,
	                    ),
	                    array(
		                        'name' => 'container_name',
		                        'label' => 'container Name',
		                        'type' => 'text',
		                        'admin_label' => true,
	                    ),
            		),

                )
            ),
		)
	);
	add_shortcode( 'list', 'list_callback' );
	function list_callback($atts){
			$list_container = $atts['container_name'];
			$list_class = $atts ['class_name'];
			$list_order = $atts ['order'];
			$list_style = $atts ['style'];

			if ($list_container) {
				?>
				<<?php echo $list_order; ?> class="<?php echo $list_class; ?>">
					<?php foreach ($atts['list_item'] as $key => $item): ?>
						<li><?php echo $item->list ?></li>
					<?php endforeach ?>
				</<?php echo $list_order; ?>>
				<?php
			}else{
				?>
				<<?php echo $list_order; ?> class="<?php echo $list_class; echo $list_style ?>">
					<?php foreach ($atts['list_item'] as $key => $item): ?>
						<li><?php echo $item->list ?></li>
					<?php endforeach ?>
				</<?php echo $list_order; ?>>
				<?php
			}

			?>
			<style type="text/css">
				.<?php echo $list_style ?> {
					list-style: <?php echo $list_style; ?>
				}
			</style>
		<?php
	}
}
