# ACF Move WP Editor
[![Packagist](https://img.shields.io/packagist/v/log1x/acf-move-wp-editor.svg?style=flat-square)](https://packagist.org/packages/log1x/acf-move-wp-editor)
[![Packagist Downloads](https://img.shields.io/packagist/dt/log1x/acf-move-wp-editor.svg?style=flat-square)](https://packagist.org/packages/log1x/acf-move-wp-editor)

This is a simple ACF Field that moves the WordPress content editor of a post or page to the location of this field.

This can be useful for cleaning up your Edit Post screen with something like ACF tabs:

![Example](https://log1x.com/screenshots/2017-09-13_17-16-47_QrdD0.png)

## Installation
Install ACF Move WP Editor using Composer:

```
$ composer require log1x/acf-move-wp-editor
```

## Recommended Filters
The filters below remove the TinyMCE editor feature that expands its container to the height of the content as well as removes the option from the Help menu.

```php
/**
 * Unregister the editor expand script.
 *
 * @return void
 */
add_action('admin_init', function () {
    wp_deregister_script('editor-expand');
});

/**
 * Disable TinyMCE's autoresize.
 *
 * @param  array $init
 * @return array
 */
add_filter('tiny_mce_before_init', function ($init) {
    unset($init['wp_autoresize_on']);
    return $init;
});
```
