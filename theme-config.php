<?php

namespace BaseTheme;

/**
* Loads the base theme class.  The base_theme_class is extended here.
* Please see wiki documentation for full set of features and helpers available in the base_theme_class.
*/
include_once( 'core/base-theme-class.php' );  

class Theme extends base_theme_class {


    /*
    
    Allows you to disable WordPress from including jQuery by default.

    You should only set this to value if your theme.js file includes jQuery.

    */
    var $include_jquery = true;


    /*
    
    Loads an options panel in wp-admin.
    If this is enabled, you create custom fields and target them to this option panel.

    */
    var $load_options_panel = true;


    /*

    if you want to force disable to WP theme editor, set this to true.
    Since we keep our WP themes in version control, we set this to true by default.

    */
    var $disabled_theme_editor = true;


    /*

    toggle featured image support on your posts and pages

    */
    var $load_thumbnail_support = true;


    /*

    this allows you to edit the default text that appears with post excerpts.
    If you set this to null, a simple "..." will output at the end of each excerpt.

    */
    var $excerpt_text = 'Read More';


    /*

    by default, the theme will disable the ACF Options menu in wp-admin, unless WP_DEBUG is set to true.
    If you want to force enable to ACF options panel to display, you can set this variable as true
    
    */
    var $force_enable_acf_option_panel = true;


    public function __construct()
    {

        parent::__construct(); 

        $this->theme_name = defined('THEME_NAME') ? THEME_NAME : 'base-theme';
        $this->version = getenv('VERSION') ? getenv('VERSION') : '1.0';

    }


    /* Load more custom post types here */
    public function load_custom_post_types()
    {


        $this->custom_post_types['member'] = array(

            'label' => 'Members',            
            'description' => 'This is the member custom post type',
            'public' => false,
            'exclude_from_search' => true,
            'show_ui' => true,
            'supports' => array('title'),
            'has_archive' => false,
            'rewrite' => false,
            'menu_icon' => 'dashicons-admin-users'

        ); 

        $this->custom_post_types['alumni'] = array(

            'label' => 'Alumnis',            
            'description' => 'This is the alumnis custom post type',
            'public' => false,
            'exclude_from_search' => true,
            'show_ui' => true,
            'supports' => array('title'),
            'has_archive' => false,
            'rewrite' => false,
            'menu_icon' => 'dashicons-admin-users'
        );

        $this->custom_post_types['job'] = array(

            'label' => 'Jobs',            
            'description' => 'This is the jobs custom post type',
            'public' => false,
            'exclude_from_search' => true,
            'show_ui' => true,
            'supports' => array('title', 'editor', 'excerpt'),
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'jobs',
                'with_front' => false
            ),
            'menu_icon' => 'dashicons-admin-users'
        );

        $this->custom_post_types['faq'] = array(

            'label' => 'FAQ',            
            'description' => 'This is the FAQ custom post type',
            'public' => false,
            'exclude_from_search' => true,
            'show_ui' => true,
            'supports' => array('title'),
            'has_archive' => false,
            'rewrite' => false,
            'menu_icon' => 'dashicons-welcome-write-blog'
        );



    }


    public function load_custom_taxonomies()
    {


        $this->custom_taxonomies['member-category'] = array(

            'belongs_to_post_type' => 'member',
            'label' => 'Member Categories',
            'description' => 'These are the Member Categories used to sort the members',
            'public' => false,
            'hierarchical' => true,
            'show_ui' => true,
            'has_archive' => false,
            'show_admin_column' => true
        );
    }

    public function load_shortcodes()
    {

        //This is a sample shortcode.  Please see full shortcode documentation. 
        
        /* */

        /*add_shortcode( 'contact_form', function($atts) {

            return view('forms/contact-form')->with(array(

                'form_title' => 'Contact Us',
                'atts' => $atts

            ));

        });*/

       

    }



    public function load_sidebars()
    {

        /*register_sidebar(array(
            'name'          => 'Primary',
            'id'            => 'sidebar-primary',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ));*/

        
    }

    public function load_options_panel()
    {

        acf_add_options_page(array(
            'page_title'    => 'Theme Options',
            'menu_title'    => 'Options',
            'menu_slug'     => 'theme-options-settings',
            'capability'    => 'edit_posts',
            'redirect'      => true
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Header & Footer Options',
            'menu_title'    => 'Header / Footer',
            'parent_slug'   => 'theme-options-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'JavaScript & CSS Options',
            'menu_title'    => 'Javascript / CSS',
            'parent_slug'   => 'theme-options-settings',
        ));

        

    }

    public function set_menus()
    {

        $this->menus = array(
            'main_nav' => 'Main Navigation', 
            'footer_nav' => 'Footer Navigation'
        );
        
    }

    /**
    * Set the image size array.
    *
    * $image_sizes[] = array('name' => 'image-size-name', 'width' => 600, 'height' => 400, 'crop' => true)  
    * set width/height to 9999 to not force that size.
    * set crop to false to not force the size.
    */
    public function set_image_sizes()
    {

        $this->image_sizes[] = array(
            'name' => 'medium-size',
            'width' => 600,
            'height' => 400,
            'crop' =>true
        );
    }

}

$theme = new \BaseTheme\Theme;

