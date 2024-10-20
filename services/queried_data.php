<?php

function get_current_category() {
    return isset($_GET['category']) && !empty($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
}

function get_current_page(){
    return (get_query_var('paged')) ? get_query_var('paged') : 1;
}

function get_current_args() {

    $current_category = get_current_category();
    $paged = get_current_page();

    $args = [
        'post_type'      => 'event',
        'post_status'    => 'publish',
        'posts_per_page' => 5,
        'paged'          => $paged,
    ];

    if ($current_category) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $current_category,
            ],
        ];
    }

    return $args;
}

function get_current_query(){
    return new WP_Query(get_current_args());
}

//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//$current_category = get_current_category();
//$args = get_current_args($current_category, $paged);

//$query = new WP_Query($args);