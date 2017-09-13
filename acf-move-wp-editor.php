<?php
/*
Plugin Name: Advanced Custom Fields: Move WP Editor
Plugin URI: https://github.com/log1x/acf-move-wp-editor
Description: A simple ACF Field that moves the WordPress content editor of a post or page to the location of this field.
Version: 1.0.0
Author: Log1x
Author URI: https://log1x.com

License: MIT License
License URI: http://opensource.org/licenses/MIT
*/

namespace Acf\Field\MoveWPEditor;

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('init')) {
    class init
    {
        /**
         * Construct
         */
        public function __construct()
        {
            $this->settings = [
                'version' => '1.0.0',
                'url'     => plugin_dir_url(__FILE__),
                'path'    => plugin_dir_path(__FILE__)
            ];

            load_plugin_textdomain('acf-move-wp-editor', false, plugin_basename(dirname(__FILE__ )) . '/resources/lang');
            add_action('acf/include_field_types', [$this, 'fields']);
            add_action('acf/register_fields', [$this, 'fields']);
        }


        /**
         * Include our ACF Field Types
         *
         * @param  integer $version
         * @return void
         */
        public function fields($version = 5)
        {
            include_once('fields/field.php');
        }
    }

    // Initialize
    new init();
}
