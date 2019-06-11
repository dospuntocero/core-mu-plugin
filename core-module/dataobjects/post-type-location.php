<?php
    
    $locations = new CPT(
        [
            'post_type_name' => 'location',
            'singular' => 'location',
            'plural' => 'locations',
            'slug' => 'location'
        ],
        [
            'supports' => array( 'title' ),
            'menu_postion'        => 1
        ]
    );
    $locations->menu_icon("dashicons-admin-site");
    
    $locations->columns([
                            'title' => 'Title',
                            'address' => 'Address',
                            'country' => 'Country'
                        ]);
    
    
    $locations->populate_column('address', function($column, $post) {
        while ( have_rows( 'location' ) ) : the_row();
            echo get_sub_field('address');
        endwhile;
        
    });
    

    $locations->register_taxonomy([
          'taxonomy_name' => 'country',
          'singular' => 'country',
          'plural' => 'countries',
          'slug' => 'country'

      ]);
