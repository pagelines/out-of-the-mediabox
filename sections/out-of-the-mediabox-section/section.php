<?php 
/*
	Section: Out Of The MediaBox
	Author: Kyle & Irving
	Author URI: http://www.kyle-irving.co.uk
	Version: 2.0.0
	Description: Gives ability to add a text hover overlay to an image. Basaed on Pagelines MediaBox Section.
	Class Name: OutOfTheMediaBox
	Filter: component	
	Loading: active	
*/

class OutOfTheMediaBox extends PageLinesSection {	
   function get_plugin_url() {
		$plugins_url = plugins_url();
		$path_dir = pathinfo(dirname(__file__));
		$path_main_dir = explode("/plugins/",$path_dir["dirname"]);
        $section = "/".$path_main_dir[1]."/".$path_dir['basename']."/";
		$url = $plugins_url.$section;
		return $url;
   }
   
   function section_head() {
		$link = $this->get_plugin_url();
	   ?>
		<link rel='stylesheet' href='<?php echo $link; ?>outofthemediabox.css' type='text/css' media='all' />
		<script type='text/javascript' src='<?php echo $link; ?>outofthemediabox.js'></script>
	   <?php
   }
       
   function section_opts(){
		$opts = array(	
			array(
				'title'	=> __( 'OutOfTheMediaBox Media', 'pagelines' ), 
				'type'	=> 'multi',
				'span'	=> 2,
				'opts'	=> array(
					array(
						'type' 		=> 'text',
						'key'		=> 'outofthemediabox_title',
						'label' 	=> __('Title', 'pagelines' ),
					),
					array(
						'type' 		=> 'textarea',
						'key'		=> 'outofthemediabox_html',
						'label' 	=> __( 'Text, Shortcodes and HTML', 'pagelines' ),
						'help'		=> __( 'Enter the text that you want to appear in the hover overlay. You can also use PL shortcodes. For the hover effect to work you must add a 							background image.', 'pagelines' )
					),
					array(
						'type' 	=> 'image_upload',
						'key'	=> 'outofthemediabox_image',
						'label' => __( 'Background Image', 'pagelines' ),
					),
					array(
						'type' 	=> 'text',
						'key'	=> 'outofthemediabox_url',
						'label' => __('OutOfTheMediaBox Link (Optional)','pagelines'),
						'help'  => __ ( 'The link should start with HTTP://' , 'pagelines' )
					),
					
					array( 
						'type' 	=> 'select',
						'key'	=> 'outofthemediabox_url_target',
						'label' => __( 'OutOfTheMediaBox Link Target', 'pagelines' ),
						'opts'	=> array(
							'_self' => array('name' => __( 'Same Window', 'pagelines')),
							'_blank' => array('name' => __( 'New Window', 'pagelines')),
							
						)
					),
				)
			),
			 
			array(
				'title'	=> 'OutOfTheMediaBox Display', 
				'type'	=> 'multi',
				'opts'	=> array(
					array(
						'type' 		=> 'text',
						'key'		=> 'outofthemediabox_height',
						'default'	=> '300',
						'label' => __( 'OutOfTheMediaBox Height (px)', 'pagelines' ),
						'help'		=> __( 'Required for manually height adjusting. Otherwise the outofthemediabox will be drawn at the height of the media.', 'pagelines' )
					),
					array(
						'type' 	=> 'select',
						'key'	=> 'outofthemediabox_overlay_position',
						'label' => __( 'Hover Content Position', 'pagelines' ),
						'default' => 'bottom',
						'opts'	=> array(
							'top'  => array('name' => __( 'Top', 'pagelines' )),
							'bottom'  => array('name' => __( 'Bottom', 'pagelines' )),
						)
					),
					array(
						'type' 	=> 'select',
						'key'	=> 'outofthemediabox_overlay_opacity',
						'label' => __( 'Hover Opacity', 'pagelines' ),
						'opts'	=> array(
							'0.0' 	=> array('name' => __( '0.0', 'pagelines')),
							'0.1' 	=> array('name' => __( '0.1', 'pagelines')),
							'0.2' 	=> array('name' => __( '0.2', 'pagelines') ),
							'0.3' 	=> array('name' => __( '0.3', 'pagelines') ),
							'0.4' 	=> array('name' => __( '0.4', 'pagelines') ),
							'0.5' 	=> array('name' => __( '0.5', 'pagelines')),
							'0.6' 	=> array('name' => __( '0.6', 'pagelines') ),
							'0.7' 	=> array('name' => __( '0.7', 'pagelines') ),
							'0.8' 	=> array('name' => __( '0.8', 'pagelines') ),
							'0.9' 	=> array('name' => __( '0.9', 'pagelines')),
							'1.0' 	=> array('name' => __( '1.0', 'pagelines') ),
						)
					),
					array( 
						'type' 	=> 'select',
						'key'	=> 'outofthemediabox_overlay_width',
						'label' => __( 'Hover Width', 'pagelines' ),
						'opts'	=> array(
							'25%' 	=> array('name' => __( '25%', 'pagelines')),
							'50%' 	=> array('name' => __( '50%', 'pagelines')),
							'75%' 	=> array('name' => __( '75%', 'pagelines')),
							'100%' 	=> array('name' => __( '100%', 'pagelines')),
						)
					),
					array( 
						'type' 	=> 'select',
						'key'	=> 'outofthemediabox_overlay_titlealign',
						'label' => __( 'Hover Title Align', 'pagelines' ),
						'default' => 'left',
						'opts'	=> array(
							'left' 	=> array('name' => __( 'Left', 'pagelines')),
							'center' => array('name' => __( 'Center', 'pagelines')),
							'right' => array('name' => __( 'Right', 'pagelines')),
							
						)
					),
					array(
						'type' 			=> 'color',
						'key'			=> 'outofthemediabox_bgcolor',
						'default'		=> '#333333',
						'label' 		=> __( 'Hover Background Color', 'pagelines' ),
						
					),
					array(
						'type' 			=> 'color',
						'key'			=> 'outofthemediabox_textcolor',
						'default'		=> '#ffffff',
						'label' 		=> __('Hover Font Color', 'pagelines'),
						
					),
				)
			),
			array(
				'type' 			=> 'select_animation',
				'key'			=> 'outofthemediabox_animation',
				'label' 		=> __( 'Viewport Animation', 'pagelines' ),
				'help' 			=> __( 'Optionally animate the appearance of this section on view.', 'pagelines' ),
			),
		);
		return $opts;
	}
	
	function section_template() {
	
		// Box height
		$box_height = $this->opt('outofthemediabox_height');
		if(!empty($box_height)) {
			$box_height = str_replace(array(" ","px"),"",trim($box_height));
			$box_height = 'style="height:'.$box_height.'px;"';
		}	
		
		// Overlay Title Align
	    $overlay_titlealign = $this->opt('outofthemediabox_overlay_titlealign');
	    $title_attr = array();
		$title_attr["align"] = 'text-align:center';
			
		switch($overlay_titlealign) {
		    case "left":
			$title_attr["align"] = 'text-align:left';	
			break;
		    case "right":
			$title_attr["align"] = 'text-align:right';
			break;
		}
		
		$title_attr["display"] = "";
		if(empty($overlay_titlealign)) {
			$title_attr["display"] = "display:none;";
		}
		$title_style = 'style="'.implode(";",$title_attr).'"';
		
		// Title Field
		$overlay_title = $this->opt('outofthemediabox_title');
		$title = '<h4 data-sync="outofthemediabox_title" '.$title_style.'>';
		$title .= $overlay_title.'</h4>';
		$title_temp = preg_replace('/[^a-zA-Z0-9 s]/', '', strtolower($overlay_title));
		$formated_title = str_replace(array("    ","   ","  "," "),"_",$title_temp);
		
		// Content Field
		$media_html = $this->opt('outofthemediabox_html');
		$html = do_shortcode( wpautop( $media_html ) );
		
		// Image Field
		$image = $this->opt('outofthemediabox_image');
		if($image) {
			$imgattr = 'src="'.$image.'" alt="'.$formated_title.'"';
		} else {
			$imgattr = 'src="'.$this->get_plugin_url().'default.png" alt="'.$formated_title.'"';
		} 
		$img = '<img class="full_hw" data-sync="outofthemediabox_image" ';
		$img .= $imgattr.' '.$box_height.' />';
		
		$main_class = ""; 
		$overlay_position = $this->opt('outofthemediabox_overlay_position');
		switch($overlay_position) {
		    case "top":
			$main_class = "bar-top";		
			break;
		    case "bottom":
			$main_class = "bar-bottom";
			break;
		}
				
		// Animation 
		$animation = ($this->opt('outofthemediabox_animation')) ? $this->opt('outofthemediabox_animation') : 'pla-fade';
		
		$main_class .= " ".$animation." pl-animation fix";
		
		// Optional Link
		$box_url = ($this->opt('outofthemediabox_url'))? $this->opt('outofthemediabox_url') : '';
		if(!empty($box_url)) {
		   $box_url = 'href="'.$box_url.'"';
		}
		
		// Optional Link Target
		$box_target = ($this->opt('outofthemediabox_url_target'))? $this->opt('outofthemediabox_url_target') : '';
		if(!empty($box_target) && !empty($box_url)) {
		   $box_target = 'target="'.$box_target.'"';
		}
		
		$misaic_style = array(); 
		$overlay_width = $this->opt('outofthemediabox_overlay_width');
		$misaic_style["width"] = "width:100%";
		if(!empty($overlay_width)) {
			$misaic_style["width"] = "width:".$overlay_width;
		}
		$overlay_opacity = $this->opt('outofthemediabox_overlay_opacity');
		$misaic_style["opacity"] = "opacity:0.8";
		if(!empty($overlay_opacity)) {
			$misaic_style["opacity"] = "opacity:".$overlay_opacity;
		}
		$bgcolor = $this->opt('outofthemediabox_bgcolor');
		$misaic_style["bgcolor"] = "background-color:#333333";
		if(!empty($bgcolor)) {
			$opacity = str_replace("opacity:","",$misaic_style["opacity"]);
		    $get_rgba = $this->hex2rgb($bgcolor,$opacity);
			$misaic_style["bgcolor"] = "background-color:".$get_rgba;
		}
		$textcolor = $this->opt('outofthemediabox_textcolor');
		$misaic_style["textcolor"] = "color:#ffffff;";
		if(!empty($textcolor)) {
			$misaic_style["textcolor"] = "color:#".$textcolor.";";
		}
		$full_misaic_style = implode(";",$misaic_style);
	    
		if($overlay_position == "bottom") {
		    $alter_html = $title;
			$alter_html .= ' <div style="display: none;" class="toggle">
							'.$html.'
					</div>';	
		 } else {
			$alter_html = '	<div style="display: none;" class="toggle">
							'.$html.'
					</div>';
			$alter_html .= $title;
		 }
						
		echo '<div class="obox mosaic-block '.$main_class.' '.$animation.'" id="obox_'.$formated_title.'">
			<div class="mosaic-overlay" style="'.$full_misaic_style.'">
				<div class="details">
					'.$alter_html.'
				</div>
			</div>
			<a '.$box_url.' '.$box_target.'><div class="mosaic-backdrop">
				'.$img.'
			</div></a>
		</div>'; 
	} 
	
	function hex2rgb($hex,$opacity) {
	   $hex = str_replace("#", "", $hex);
	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = "rgba($r, $g, $b, $opacity)";
	   return $rgb;
	}
} 
?>