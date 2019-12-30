<?php

add_action( 'init', 'title' );
function title(){
	global $kc;
	$kc->add_map(array(
		'amazing_title' => array(
	                'name' => 'Title',
	                'description' => __('Display single icon', 'amazing'),
	                'icon' => 'sl-pencil',
	                'category' => 'Amazing',
	                'params' => array(
	                    'text_box' => array(
	                    	array(
	                        'name' => 'title',
	                        'label' => 'input text',
	                        'type' => 'textarea',
	                        'admin_label' => true,
	                    ),
							array(
	                        'name' => 'title_tag',
	                        'label' => 'input tag',
	                        'type' => 'select',
	                        'options'=> array(
											'h1' => 'h1',
											'h2' => 'h2',
											'h3' => 'h3',
											'h4' => 'h4',
											'h5' => 'h5',
											'h6' => 'h6',
											'span' => 'span',
											'p' => 'p',
										),
										'value' => 'h1',
	                        			'admin_label' => true,
	                    			),
							array(
	                        'name' => 'class_name',
	                        'label' => 'Class Name',
	                        'type' => 'text',
	                        'admin_label' => true,
	                    ),array(
	                        'name' => 'container_name',
	                        'label' => 'container Name',
	                        'type' => 'text',
	                        'admin_label' => true,
	                    ),array(
	                        'name' => 'text_style',
	                        'label' => 'Text align',
	                        'type' => 'select',
	                        'options'=> array(
	                        				'Select'=>'text aling',
											'left' => 'left',
											'right' => 'right',
											'center' => 'center',
											'justify' => 'justify',
										),
										'value' => 'Select',
	                        			'admin_label' => true,
	                    ),
	                    ),
	                )
	            ),
	));
	add_shortcode( 'amazing_title', 'title_callback' );
	function title_callback($atts){
		$class_name = $atts['class_name'] ?? '';
		$tag = $atts['title_tag'];
		$container_name = $atts['container_name'];
		$text_style = $atts['text_style'];
		// print_r($atts);
		?>
		<?php 
			if ($container_name) {
				?>
				<div class="<?php echo $container_name ?>">
					<<?php echo $tag; ?> class="<?php echo($class_name); echo ($text_style)?>" ><?php echo $atts['title']; ?></<?php echo $tag; ?>>
				</div>
				<?php
			}else{
				?>
				<<?php echo $tag; ?> class="<?php echo($class_name); echo ($text_style) ?>"><?php echo $atts['title']; ?></<?php echo $tag; ?>>
				<?php
			}

		}
	}		