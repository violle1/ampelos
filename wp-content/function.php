<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function hello_elementor_child_enqueue_styles() {
    wp_enqueue_style( 'hello-elementor-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'hello-elementor-child-style', get_stylesheet_uri(), array( 'hello-elementor-parent-style' ), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles' );