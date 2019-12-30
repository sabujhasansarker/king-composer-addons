<?php

/**
 * @Author: sabuj
 * @Date:   2019-12-29 18:45:32
 * @Last Modified by:   sabuj
 * @Last Modified time: 2019-12-29 19:41:54
 */
add_action( 'init', 'AmpImage' );
function AmpImage(){
	global $kc;
	$kc->add_map(
    array(
        'amp_image' => array(
	                'name' => 'Amp Image',
	                'description' => __('Display single icon', 'amazing'),
	                'icon' => 'sl-picture',
	                'category' => 'Amazing',
	                'params' => array(
	                    'Image' => array(
	                    	array(
	                        'name' => 'image',
	                        'label' => 'Select Image',
	                        'type' => 'attach_image_url',
	                        'admin_label' => true,
	                    )
	                    ),
	                    
						'styling' => array(
							array(
								'name'    => 'amp_image_style',
								'type'    => 'css',
								'options'		=> array(
									array(
										'amp' => array(
											array('property' => 'extra_class_name', 'label' => 'Extra Class Name For This Image'),
											array('property' => 'width', 'label' => 'Image Width'),
											array('property' => 'height', 'label' => 'Image height'),
										),
									)
								)
							)
						),
	                )
	            ),
)
);
add_shortcode( 'amp_image', 'am_banner_element_PHP_Function' );

// Register Before After Shortcode
function am_banner_element_PHP_Function( $atts ) {
	$atts['amp_image_style'] = str_replace('`{', '`:{', $atts['amp_image_style']);
	$atts['amp_image_style'] = str_replace('`', '"', $atts['amp_image_style']);
	$amp_image_style = json_decode($atts['amp_image_style'], true);
	$amp = $amp_image_style['kc-css']['any']['amp'];
	$amp_container = $amp ['extra_class_name|'] ?? '';
     ?>
    <!--  ============  Hero Area ============ -->
    <?php 
    	if ($amp_container) {
    		?>
    		<div class="<?php echo($amp_container ) ?>">
		       <amp-img width="<?php echo $amp['width|'] ?>" height="<?php echo  $amp['height|'] ?>" layout="responsive" src="<?php echo $atts['image'] ?>" alt="Image">
			   </amp-img>
		    </div>
    		<?php
    	}else{
    		?>
    		<amp-img width="<?php echo $amp['width|'] ?>" height="<?php echo  $amp['height|'] 	?>" layout="responsive" src="<?php echo $atts['image'] ?>" alt="Image">
	   		</amp-img>
    		<?php
    	}
    }
}