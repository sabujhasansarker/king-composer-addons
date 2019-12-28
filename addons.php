<?php

/**
 * Plugin Name: amazing addon
 * Description: Description
 * Plugin URI: http://#
 * Author: sabuj
 * Author URI: http://#
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: amazing
 * Domain Path: domain/path
 */

/*
    Copyright (C) Year  sabuj  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

 
add_action('init', 'amazing');
 
function amazing() {
 
	if (function_exists('kc_add_map')) { 
	    kc_add_map(
	        array(
	        	// amp image 
	            'kc_icon' => array(
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
	            // end Amp image Component

	            // slider image start
	            'client_slider'=> array(
	            	'name'=>'Client Slider',
	            	'description' => __('Displaing Client', 'amazing'),
	            	'css_box'     => true,
	                'icon' => 'sl-picture',
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
	            // slider image end	            
	            // cliend image start
	            'client'=> array(
	            	'name'=>'Client',
	            	'description' => __('Displaing Client', 'amazing'),
	            	'css_box'     => true,
	                'icon' => 'sl-picture',
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
	            // clliend end
	            // video start
	            'amp_video' => array(
	                'name' => 'Amp Video',
	                'description' => __('Display single icon', 'amazing'),
	                'icon' => 'sl-picture',
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
	            // title
	            'amazing_title' => array(
	                'name' => 'Title',
	                'description' => __('Display single icon', 'amazing'),
	                'icon' => 'sl-picture',
	                'category' => 'Amazing',
	                'params' => array(
	                    'video' => array(
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
	                    ),
	                    ),
	                )
	            ),
	        )

	    ); // End add map
	
	} // End if

}  
 
?>