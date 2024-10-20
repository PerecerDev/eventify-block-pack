<?php function listCard() { ob_start();
$query = get_current_query();

if ($query->have_posts()) {
    echo '<ul>';
    while ($query->have_posts()) {
        $query->the_post();
        ele('eventCard');
    }
    echo '</ul>';
}

return ob_get_clean();

} ?>