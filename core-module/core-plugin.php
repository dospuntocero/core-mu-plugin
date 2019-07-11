<?php

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );



    /**
     * Plugin Name: custom post types and taxonomies
     * Plugin URI:  https://dcclab.com
     * Description: plugin that contains all the post types and taxonomies required for the site
     * Version:     1
     * Author:      fran
     * Author URI:  https://dcclab.com
     * License:     GPL2
     * License URI: https://www.gnu.org/licenses/gpl-2.0.html
     * Text Domain: did
     */

    define( 'CPTDIR', plugin_dir_path( __FILE__ ) );



    //custom post type helper
    include_once(CPTDIR.'/lib/CTP.php');

    //custom better search
    include_once(CPTDIR.'/lib/acf-better-search.php');

    //acf saves acf-json to the plugin instead of the theme
    include_once(CPTDIR.'/lib/acf-plugin-config.php');


    //ACF BUILDER:::  lets you define acf stuff programatically
    include_once(CPTDIR.'/lib/acf-builder/autoload.php');


    //template parts extra lets you pass an array of variables to the partial
    include_once(CPTDIR . '/lib/template-part-extra.php');


    // Define directories for post types and taxonomies
    $directories = array(
        'post-type'   => CPTDIR . '/dataobjects/',
        'acf-hm'   => CPTDIR . '/acf-handcoded-stuff/'
    );

    foreach ( $directories as $key => $directory ) {
        $dir = new DirectoryIterator( $directory );

        foreach ( $dir as $fileinfo ) {
            if ( ! $fileinfo->isDot() && $fileinfo->getExtension() === 'php' ) {

                // File basename minus extension
                $basename = $fileinfo->getBasename('.php');

                // Check filename for prefix before loading
                if ( substr( $basename, 0, strlen($key) + 1 ) === $key . '-' )
                    require_once $directory . $fileinfo->getFilename();
            }
        }
    }

    //add image sizes here

    //add_image_size( 'homepage-slider' , 1170, 650, true);


//add google api key on the cms and pass it to acf maps field
// function my_acf_init()
// {
//     $thekey = get_field('google_api_key', 'option');

//     acf_update_setting('google_api_key', $thekey);
// }

// add_action('acf/init', 'my_acf_init');

//creating new menus on the admin bar
add_action('admin_bar_menu', 'add_toolbar_items', 100);

function add_toolbar_items($admin_bar)
{

    $admin_bar->add_menu(array(
        'id' => 'dev',
        'title' => 'dev',
        'href' => '#'
    ));

    $admin_bar->add_menu(array(
        'id' => 'myadmin',
        'title' => 'phpMyAdmin',
        'href' => '/phpMyAdmin',
        'parent' => 'dev'
    ));
//     $admin_bar->add_menu(array(
//         'id' => 'myadmin',
//         'title' => 'phpMyAdmin',
//         'href' => '/phpMyAdmin',
//         'parent' => 'dev'
//     ));

}



