<?php

/**
 * Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Portfolio
 */


function portfolio_scripts()
{
	wp_enqueue_style('portfolio-style', get_stylesheet_uri());
	wp_enqueue_script('portfolio-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true);
	// wp_enqueue_style('portfolio-style', get_template_directory_uri() . '/assets/css/style.min.css');
}

add_action('wp_enqueue_scripts', 'portfolio_scripts');

add_theme_support('custom-logo');
add_theme_support('menus');

add_filter('nav_menu_item_id', '__return_empty_string');
add_filter('nav_menu_css_class', '__return_empty_array');

add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);


add_filter('nav_menu_css_class', 'change_menu_item_css_classes', 10, 3);

function change_menu_item_css_classes($classes, $item, $args)
{
	if ($args->menu === 'Main') {
		$classes[] = 'menu__item';
		if ($item->current || $item->ID == 180 && in_category( 'project' )) {
			$classes[] = 'menu__item--active';
		}
	}
	return $classes;
}


function filter_nav_menu_link_attributes($atts, $item, $args)
{
	if ($args->menu === 'Main') {
		$atts['class'] = 'menu__link';
	}

	return $atts;
}
