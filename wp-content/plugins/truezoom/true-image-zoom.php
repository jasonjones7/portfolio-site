<?php
/**
 * Plugin Name: True Image Zoom
 * Description: Click any image to view it at full native resolution in a scrollable lightbox overlay — no shrinking.
 * Version: 1.0.0
 * Author: Your Name
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class True_Image_Zoom {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
        add_action( 'wp_footer',          [ $this, 'render_overlay' ] );
    }

    public function enqueue() {
        wp_enqueue_style(
            'true-image-zoom',
            plugin_dir_url( __FILE__ ) . 'true-image-zoom.css',
            [],
            '1.0.0'
        );
        wp_enqueue_script(
            'true-image-zoom',
            plugin_dir_url( __FILE__ ) . 'true-image-zoom.js',
            [],
            '1.0.0',
            true
        );
    }

    public function render_overlay() {
        ?>
        <div id="tiz-overlay" role="dialog" aria-modal="true" aria-label="Image viewer" style="display:none;">
            <button id="tiz-close" aria-label="Close image viewer">&times;</button>
            <div id="tiz-scroll-area">
                <img id="tiz-img" src="" alt="" />
            </div>
        </div>
        <?php
    }
}

new True_Image_Zoom();
