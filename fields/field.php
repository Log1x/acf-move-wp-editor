<?php

namespace Acf\Field\MoveWPEditor;

/**
 * Exit if accessed directly
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * ExampleField
 */
if (!class_exists('WPEditorField')) {
    class WPEditorField extends \acf_field
    {
        /**
         * Construct
         */
        public function __construct($settings)
        {
            $this->name     = 'wpeditor';
            $this->label    = __('WordPress Editor', 'acf-move-wp-editor');
            $this->category = 'content';
            $this->settings = $settings;

            parent::__construct();
        }

        /**
         *  render_field_settings()
         *
         *  Create extra settings for your field. These are visible when editing a field.
         *
         *  @param  array $field
         *  @return void
         */
        public function render_field_settings($field) {

        }

        /**
         *  render_field()
         *
         *  Create the HTML interface for your field
         *
         *  @param    array $field
         *  @return    void
         */
        public function render_field($field)
        {
            return $field;
        }

        /**
         *  input_admin_enqueue_scripts()
         *
         *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
         *  Use this action to add CSS + JavaScript to assist your render_field() action.
         *
         *  @return    void
         */
        public function input_admin_enqueue_scripts()
        {
            $url     = $this->settings['url'];
            $version = $this->settings['version'];

            wp_register_script('acf-move-wp-editor', "{$url}dist/scripts/main.js", ['acf-input'], $version);
            wp_enqueue_script('acf-move-wp-editor');
        }

        /**
         *  load_value()
         *
         *  This filter is applied to the $value after it is loaded from the db
         *
         *  @param  mixed $value
         *  @param  mixed $post_id
         *  @param  array $field
         *  @return $value
         */
        public function load_value($value, $post_id, $field)
        {
            return $value;
        }

        /**
         *  update_value()
         *
         *  This filter is applied to the $value before it is saved in the database.
         *
         *  @param  mixed $value
         *  @param  mixed $post_id
         *  @param  array $field
         *  @return $value
         */
        public function update_value($value, $post_id, $field)
        {
            return $value;
        }

        /**
         *  format_value()
         *
         *  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
         *
         *  @param  mixed $value
         *  @param  mixed $post_id
         *  @param  array $field
         *  @return mixed
         */
        public function format_value($value, $post_id, $field)
        {
            return $field;
        }

        /*
        *  validate_value()
        *
        *  This filter is used to perform validation on the value prior to saving.
        *  All values are validated regardless of the field's required setting. This allows you to validate and return
        *  messages to the user if the value is not correct
        *
        *  @param  boolean $valid
        *  @param  mixed   $value
        *  @param  array   $field
        *  @param  array   $input
        *  @return boolean
        */
        public function validate_value($valid, $value, $field, $input)
        {
            return true;
        }

        /**
         *  load_field()
         *
         *  This filter is applied to the $field after it is loaded from the database
         *
         *  @param  array $field
         *  @return array
         */
        public function load_field($field)
        {
            return $field;
        }

        /**
         *  update_field()
         *
         *  This filter is applied to the $field before it is saved to the database
         *
         *  @param  array $field
         *  @return array
         */
        public function update_field($field)
        {
            return $field;
        }

        /**
         *  delete_field()
         *
         *  This action is fired after a field is deleted from the database
         *
         *  @param  array $field
         *  @return void
         */
        public function delete_field($field)
        {
            return $field;
        }
    }

    new WPEditorField($this->settings);
}
