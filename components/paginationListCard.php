<?php function paginationListCard($params) { ob_start(); 
$query = get_current_query();
$paged = get_current_page();
 $current_category = get_current_category();

$pagination_args = [
        'total'        => $query->max_num_pages,
        'current'      => $paged,
        'prev_text'    => __('&laquo; Anterior', 'eventify-block-pack'),
        'next_text'    => __('Siguiente &raquo;', 'eventify-block-pack'),
        'type'         => 'list',
        'format'       => '?paged=%#%',
    ];


    if ($current_category) {
        $pagination_args['add_args'] = ['category' => $current_category];
    }
    ?>

<div class="pagination">
    <h1>pagination</h1>
    <?php echo paginate_links($pagination_args); ?>
</div>

<?php return ob_get_clean(); } ?>