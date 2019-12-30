<?php

add_action( 'init', 'AmpVideo' );
function AmpVideo(){
	global $kc;
	$kc->add_map(array(
		'amp_video' => array(
	                'name' => 'Amp Video',
	                'description' => __('Display single icon', 'amazing'),
	                'icon' => 'fab-youtube',
	                'category' => 'Amazing',
	                'params' => array(
	                    'video' => array(
	                    	array(
	                        'name' => 'video_id',
	                        'label' => 'input video url',
	                        'type' => 'text',
	                        'admin_label' => true,
	                    )
	                    ),
	                    
						'styling' => array(
							array(
								'name'    => 'amp_video_style',
								'type'    => 'css',
								'options'		=> array(
									array(
										'amp' => array(
											array('property' => 'width', 'label' => 'Video Width'),
											array('property' => 'height', 'label' => 'Video height'),
										),
									)
								)
							)
						),
	                )
	            ),
	));
	add_shortcode( 'amp_video', 'amp_video_callback' );
	function amp_video_callback($atts){
		$atts['amp_video_style'] = str_replace('`{', '`:{', $atts['amp_video_style']);
		$atts['amp_video_style'] = str_replace('`', '"', $atts['amp_video_style']);
		$amp_video_style = json_decode($atts['amp_video_style'], true);
		$video_style = $amp_video_style['kc-css']['any']['amp'];
		print_r($video_style  );
?>
	<amp-youtube width="<?php echo $video_style['width|'] ?>" height="<?php echo $video_style['height|'] ?>" layout="responsive" data-param-modestbranding="1" data-param-rel="1" data-videoid="<?php echo substr($atts['video_id'], 32); ?>">
	</amp-youtube>
	<?php
	}
}