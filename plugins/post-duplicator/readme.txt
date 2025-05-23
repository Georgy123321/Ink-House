=== Post Duplicator ===
Contributors: metaphorcreations
Tags: posts, post, duplicate, duplication
Requires at least: 5.0
Requires PHP: 7.4
Tested up to: 6.7.2
Stable tag: 2.45
License: GPL2

Creates functionality to duplicate any and all post types, including taxonomies & custom fields.

== Description ==

This plugin was created to make an exact duplicate of a selected post. Custom post types are supported, along with custom taxonomies and custom fields.

*Note: Comments are not passed to the new post.

This plugin is simply meant to quickly and easily duplicate a post. Just hover over a post in the edit screen and select 'Duplicate {post_type}' to create a duplicate post.

I created this plugin mainly for myself when I'm develping WordPress sites. I always need dummy content to fill out the look of a website and wanted a very quick and easy way to create multiple posts.

== Installation ==

1. Upload `m4c-postduplicator` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress 

== Frequently Asked Questions ==

= Are there any settings I need to configure? =

No, but there are a couple settings you can adjust if you choose to do so.
View the settings by going to 'Tools > Post Duplicator'.

= How do I install the plugin? =

Check out the 'Installation' tab.

== Screenshots ==

1. Sample view of the duplicate post link
2. View of the settings page

== Changelog ==

= 2.45 [2025-03-04] =
* Moved settings page to settings menu
* Added settings link to plugins screen

= 2.44 [2025-02-25] =
* Minor bug cleanup

= 2.43 [2025-02-23] =
* Default setting updates
* Default permission updates

= 2.42 [2025-02-16] =
* Added custom permissions and settings

= 2.41 [2025-02-16] =
* Added custom permissions and settings

= 2.40 [2025-02-11] =
* Added code to store current version for future updates
* Added code to resolve potential critical error for post types

= 2.39 [2025-02-10] =
* Bug fix

= 2.38 [2025-02-10] =
* Setting updates
* Removed ajax functionality
* Added WP API functionality
* Additional security updates

= 2.37 [2025-01-08] =
* Security update. Disabled duplicate post ability of non-published posts by non-authors.

= 2.36 [2024-09-02] =
* Security update. Fixed bug that allowed non-author to duplicate post.

= 2.35 [2024-05-14] =
* Allowed for center tag to be duplicated

= 2.34 [2024-04-27] =
* Added mtphr_post_duplicator_meta_{$key}_enabled filter to disable meta from duplicating
* Added mtphr_post_duplicator_meta_value filter to modify meta values before saving
* Disabled WooCommerce review count meta from duplicating

= 2.33 [2024-03-12] =
* Resolved special characters issue in duplicated title

= 2.32 =
* Ensured users without publish_post permissions can not publish posts on duplication

= 2.31 =
* Disabled Polylang post_translations taxonomy from attaching to duplicated posts

= 2.30 =
* Additional fix to issue with unicode characters in Gutenberg blocks

= 2.29 =
* Resolved issue with unicode characters in Gutenberg blocks

= 2.28 =
* Bug fix from last update

= 2.27 =
* Sanitization and validation updates
* Settings page optimization

= 2.26 =
* Removed duplicate functionality from post trash pages
* Database sanitization updates
* Asset loading path updates

= 2.25 =
* Multiple data sanitization updates

= 2.24 =
* Settings sanitization updates

= 2.23 =
* Added setting to limit post duplication to current user
* Added setting to setup duplicated post author to current user
* Set the default setting of duplicated post author to current user

= 2.22 =
* Fixed Gutenburg escaping in returns for ACF blocks

= 2.21 =
* Javascript update for WP 5.5

= 2.20 =
* Added "do_action( 'mtphr_post_duplicator_created', $original_id, $duplicate_id, $settings )" action for custom actions on duplicated post
* Added "mtphr_post_duplicator_action_row_link( $post )" function for custom post action rows
* Separated post duplicated function outsite of ajax call for custom uses
* Removed limitations of backend script to load only on specific pages

= 2.19 =
* Added Duplicate button to published post edit pages

= 2.18 =
* Modified javascript for allow duplication of duplicated page before page reload

= 2.17 =
* XSS vulnerability fix
* Language file updates

= 2.16 =
* Modified how post meta is saved to database
* Modified duplicate slug implementation
* Added file duplication support for the WP Customer Area plugin

= 2.15 =
* Added default value for duplicate post slug
* New setting to append a custom string to the duplicate post title

= 2.14 =
* New setting to append a custom string to the duplicate post slug

= 2.13 =
* Fixed bug due to "wp_old_slug_redirect" function in core

= 2.12 =
* Fixed page reload bug after duplication

= 2.11 =
* Added ability to duplicate posts to other post types

= 2.10 =
* Added page duplication support for the WP Customer Area plugin

= 2.9 =
* Now supports multiple values of a single custom field during duplication

= 2.8 =
* Added German language files
* Added Japanese language files
* Updated settings file for localization

= 2.7 =
* Modified duplicated posts data: post_date_gmt, post_modified, post_modified_gmt

= 2.6 =
* Changed the default published status to Draft

= 2.5 =
* Changed the default post date of duplicated posts to be the current time.

= 2.4 =
* Cleaned up some code.
* Updated localization code and files.

= 2.2 =
* Updated metaboxer code.

= 2.0 =
* Added a settings page to set 'post status' and 'date' of duplicated posts.

= 1.1 =
* Updated filenames and paths so the plugin works.

== Upgrade Notice ==

= 2.2 =
Code updates.

= 2.0 =
Upgrade Post Duplicator to add 'post status' and 'date' options to your duplicated posts.

= 1.1 =
Must upgrade in order for the plugin to work. The file paths where initially wrong as the plugin upload created a different directory name.

== Upgrade Notice ==

Settings location update