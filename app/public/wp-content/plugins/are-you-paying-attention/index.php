<?php

/*
  Plugin Name:  Are You Paying Attention Quiz
  Description: Give your readers a multiple choice question.
  Version 1.0
  Author: Brad
  Author URI: www.timfara.com
*/

if( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class AreYouPayingAttention {
    
    // Constructor Function
    function __construct() {
        add_action('init', array($this, 'adminAssets')); // register block type in PHP
    }

    function adminAssets() {
        wp_register_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element')); //register our JS file
        register_block_type('ourplugin/are-you-paying-attention', array(
            'editor_script' => 'ournewblocktype',
            'render_callback' => array($this, 'theHTML')
        ));
    }

    function theHTML($attributes) {
        ob_start(); // keeps us from having to concetenate awkwardly ?> 
        <h3>Today the sky is <?php echo esc_html($attributes['skyColor']) ?> and the grass is <?php echo esc_html($attributes['grassColor']) ?></h3>
        <?php return ob_get_clean();
        return '<p>Today the sky is ' . $attributes['skyColor'] . ' and the grass is ' . $attributes['grassColor'] . '!!!</p>';
    }
}



$areYouPayingAttention = new AreYouPayingAttention();