<?php

/*
Plugin Name: VP SiteMap
Plugin URI: http://wordpress.org/plugins/vp-sitemap/
Description: VP Sitemap WordPress Plugin is a sitemap plugin. You can easy to use by shortcode. 
Author: Maruf Arafat
Version: 1.0
*/

function Simple_sitemap_wprdpress_list_plugin_shortcode($atts){
	extract( shortcode_atts( array(
		'id' => '',
		'type' => 'post',
		'category' => '',
		'color' => '',
		'h_color' => '',
		'size' => '',
	), $atts, 'pricing_table' ) );
	
    $q = new WP_Query(
        array('posts_per_page' => '-1', 'post_type' => $type, 'category_name' => $category)
        );		
		
		
	$list = '
<style type="text/css">
	.Simple_sitemap_wprdpress_plugin_markup {}
	.Simple_sitemap_wprdpress_plugin_markup ol#VP_SiteMap'.$id.' {}
	.Simple_sitemap_wprdpress_plugin_markup ol#VP_SiteMap'.$id.' li {}
	.Simple_sitemap_wprdpress_plugin_markup ol#VP_SiteMap'.$id.' li a {color:'.$color.';text-decoration: none;font-size: '.$size.'px !important;}
	.Simple_sitemap_wprdpress_plugin_markup ol#VP_SiteMap'.$id.' li a:hover {color:'.$h_color.';}
</style>
	<div class="Simple_sitemap_wprdpress_plugin_markup"><ol id="VP_SiteMap'.$id.'">';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$list .= '<li>
					<a href="'.get_permalink( ).'">'.get_the_title( ).'</a>
				</li>';        
	endwhile;
	$list.= '</ol></div>';
	wp_reset_query();
	return $list;
}
add_shortcode('VP_SiteMap_list', 'Simple_sitemap_wprdpress_list_plugin_shortcode');	

function Simple_sitemap_wprdpress_plugin_shortcode($atts){
	extract( shortcode_atts( array(
		'id' => '',
		'type' => 'post',
		'category' => '',
		'color' => '',
		'h_color' => '',
		'size' => '',
	), $atts, 'pricing_table' ) );
	
    $q = new WP_Query(
        array('posts_per_page' => '-1', 'post_type' => $type, 'category_name' => $category)
        );		
		
		
	$list = '
<style type="text/css">
	.Simple_sitemap_wprdpress_plugin_markup {}
	.Simple_sitemap_wprdpress_plugin_markup ul#VP_SiteMap'.$id.' {}
	.Simple_sitemap_wprdpress_plugin_markup ul#VP_SiteMap'.$id.' li {}
	.Simple_sitemap_wprdpress_plugin_markup ul#VP_SiteMap'.$id.' li a {color:'.$color.';text-decoration: none;font-size: '.$size.'px !important;}
	.Simple_sitemap_wprdpress_plugin_markup ul#VP_SiteMap'.$id.' li a:hover {color:'.$h_color.';}
</style>
	<div class="Simple_sitemap_wprdpress_plugin_markup"><ul id="VP_SiteMap'.$id.'">';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$list .= '<li>
					<a href="'.get_permalink( ).'">'.get_the_title( ).'</a>
				</li>';        
	endwhile;
	$list.= '</ul></div>';
	wp_reset_query();
	return $list;
}
add_shortcode('VP_SiteMap', 'Simple_sitemap_wprdpress_plugin_shortcode');	











?>