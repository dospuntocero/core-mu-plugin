<?php

$locations = new CPT(
    [
        'post_type_name' => 'product-series',
        'singular' => 'product series',
        'plural' => 'product series',
        'slug' => 'product-series'
    ],
    [
        'supports' => array( 'title' ),
        'menu_postion'        => 1,
        'has_archive' => 'product-series'
    ]
);
$locations->menu_icon("dashicons-dashboard");

$locations->columns([
    'title' => 'Title',
    'product_category' => 'Category',
    'product_type' => 'Product Type',
]);

$locations->register_taxonomy('product_type');
$locations->register_taxonomy([
        'taxonomy_name' => 'product_category',
        'singular' => 'Product Category',
        'plural' => 'Product Categories',
        'slug' => 'product-category'
]);
