<?php
/*
Plugin Name: Motherson Core
Description: A plugin to create a custom hamburger menu (MS Menu) with dropdown and sub-menu items. Can be inserted via a shortcode in Elementor.
Version: 1.1
Author: Nuthan Raghunath
*/

function ms_menu_enqueue_scripts() {
    // Enqueue styles and scripts
    wp_enqueue_style('ms-menu-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('ms-menu-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'ms_menu_enqueue_scripts');

// Custom Walker class to modify the menu output with plus/minus icons
class MS_Menu_Walker extends Walker_Nav_Menu {
    // Starts the element output
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = implode(' ', $item->classes);
        $has_children = in_array('menu-item-has-children', $item->classes) ? 'has-children' : '';

        $output .= '<li class="menu-item ' . $has_children . '">';
        $output .= '<a href="' . $item->url . '">';
        if ($has_children) {
            $output .= '<span class="plus-icon"></span>'; // Add the plus icon for items with children
        }
        $output .= '<span>' . $item->title . '</span></a>';
    }

    // Starts the sub-menu output
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="sub-menu">';
    }
}

// Shortcode function for MS Menu
function ms_menu_shortcode() {
    ob_start();
    ?>
    <div class="ms-hamburger-menu">
        <div class="hamburger-icon">
            <div class="line line1"></div>
            <div class="line line2"></div>
            <div class="line line3"></div>
        </div>
        <div class="menu-container">
            <?php
            // Display the WordPress menu assigned to 'ms-menu' location
            wp_nav_menu(array(
                'theme_location' => 'ms-menu', // Register this location in your theme
                'menu_class' => 'menu', // Custom menu class
                'container' => false, // Remove the container
                'depth' => 2, // Supports two levels of submenus
                'walker' => new MS_Menu_Walker() // Use the custom walker
            ));
            ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('ms_menu', 'ms_menu_shortcode');

// Register a new menu location for the MS Menu
function ms_menu_register_menus() {
    register_nav_menu('ms-menu', __('MS Menu', 'motherson-core'));
}
add_action('init', 'ms_menu_register_menus');



function custom_navbar_scripts() {
    ?>
<style>
	 #nav-header {
            background-color: transparent;
        }
#nav-header .elementor-widget-image img {
            vertical-align: middle;
            display: inline-block;
            
            transition: height 0.3s ease; /* Smooth transition for height change */
        }
        #nav-header.custom-nav-header {
            background-color: #030303;
            transition: background-color 0.3s ease;
        }
</style>
   
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var navHeader = document.querySelector('#nav-header');
    if (navHeader) {  // Check if navHeader exists
        var logoImage = navHeader.querySelector('.elementor-widget-image img');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navHeader.classList.add('custom-nav-header');
            } else {
                navHeader.classList.remove('custom-nav-header');
            }
        });
    }
});

    </script>
    <?php
}
add_action('wp_head', 'custom_navbar_scripts');


function display_tags_without_links() {
    $tags = get_the_tags();
    if ($tags) {
        foreach ($tags as $tag) {
            echo '<span class="tag">' . esc_html($tag->name) . '</span> '; // Displays tag without link
        }
    }
}




