<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
$current_category = isset($_GET['category']) && !empty($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

if ($current_category) {
    $paged = 1;
}

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

$query = new WP_Query($args);

// echo '<pre>';
// var_dump($query);
// echo '</pre>';

if ($query->have_posts()) :

    echo '<ul>';
    while ($query->have_posts()) : $query->the_post();
        ?>

<li>
    <h2><?php the_title(); ?></h2>
    <p><?php the_excerpt(); ?></p>
    <p><strong>Ubicación:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_event_location', true)); ?></p>
    <p><strong>Fecha:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_event_date', true)); ?></p>
    <p><strong>Hora:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_event_time', true)); ?></p>
    <p><strong>Precio:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_event_price', true)); ?> €</p>
    <p><strong>Entradas Restantes:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tickets_left', true)); ?>
    </p>
    <p><strong>Evento Principal:</strong>
        <?php echo (get_post_meta(get_the_ID(), '_main_event', true) === '1') ? 'Sí' : 'No'; ?></p>
    <p><a href="<?php echo esc_url(get_post_meta(get_the_ID(), '_event_url_tickets', true)); ?>" target="_blank">Comprar
            Entradas</a></p>
</li>
<?php
    endwhile;
    echo '</ul>';
    
    $pagination_args = [
        'total'        => $query->max_num_pages,
        'current'      => $paged,
        'prev_text'    => __('&laquo; Anterior', 'eventify-block-pack'),
        'next_text'    => __('Siguiente &raquo;', 'eventify-block-pack'),
        'type'         => 'list',
    ];

    if ($current_category) {
        $pagination_args['add_args'] = [
            'category' => $current_category,
        ];
    }
    
    echo '<div class="pagination">';
    echo paginate_links($pagination_args);
    echo '</div>'; 

else :
    echo '<p>No se encontraron eventos.</p>';
endif;

wp_reset_postdata();
?>


<h3>FILTROS</h3>
<form method="get" action="">
    <label for="category">Filtrar por Categoría:</label>
    <select name="category" id="category">
        <option value="">Todas las categorías</option>
        <?php 
        $categories = get_terms([
            'taxonomy' => 'category', 
            'hide_empty' => true,
        ]);
        foreach ($categories as $category) {
            $selected = ($current_category === $category->slug) ? 'selected' : '';
            echo '<option value="' . esc_attr($category->slug) . '" ' . esc_attr($selected) . '>' . esc_html($category->name) . '</option>';
        }
        ?>
    </select>
    <button type="submit">Filtrar</button>
</form>