=== Starter Theme ===

Contributors: iTanvir
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready

Requires at least: 4.5
Tested up to: 6.0.3
Requires PHP: 5.6
Stable tag: 1.0.0
License: GNU General Public License v2 or later
License URI: LICENSE

A lightweight, plain-vanilla theme for Elementor page builder.

== Description ==

A basic, plain-vanilla, lightweight theme, best suited for building your site using Elementor page builder.

This theme resets the WordPress environment and prepares it for smooth operation of Elementor.

Screenshot's images & icons are licensed under: Creative Commons (CC0), https://creativecommons.org/publicdomain/zero/1.0/legalcode

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file.
3. Click `Install Now` and then `Activate` to start using the theme.
4. A notice box may appear, recommending you to install Elementor Page Builder Plugin. You can either use it or any other editor.
5. Create a new page, click `Edit with Elementor`.
6. Once the Elementor Editor is launched, click on the library icon, pick one of the many ready-made templates and click `Insert`.
7. Edit the page content as you wish, you can add, remove and manipulate any of the elements.
8. Enjoy :)

== Customizations ==

Most users will not need to edit the files for customizing this theme.
To customize your site's appearance, simply use ***Elementor***.

However, if you have a particular need to adapt this theme, please read on.

= Style & Stylesheets =

All of your site's styles should be handled directly inside ***Elementor***.
You should not need to edit the SCSS files in this theme in ordinary circumstances.

However, if for some reason there is still a need to add or change the site's CSS, please use a child theme.

= Hooks =

To prevent the loading of any of the these settings, use the following as boilerplate and add the code to your child-theme `functions.php`:
```php
add_filter( 'choose-from-the-list-below', '__return_false' );
```

* `starter_theme_page_title`                    show\hide page title (default: show)
* `starter_theme_viewport_content`              modify `content` of `viewport` meta in header