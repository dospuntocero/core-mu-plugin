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



    //custom post type helper **NEW**
    include_once(CPTDIR.'/lib/CTP.php');

    //custom better search **NEW**
    include_once(CPTDIR.'/lib/acf-better-search.php');

    //acf saves acf-json to the plugin instead of the theme
    include_once(CPTDIR.'/lib/acf-plugin-config.php');



    // Define directories for post types and taxonomies
    $directories = array(
        'post-type'   => CPTDIR . '/dataobjects/'
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

    add_image_size( 'homepage-slider' , 1170, 650, true);
