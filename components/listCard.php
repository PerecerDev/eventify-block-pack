<?php function listCard() { ob_start();

    $query = get_current_query();

    if ($query->have_posts()) { ?>

<div class="list-card">
    <ul>
        <?php while ($query->have_posts()) { $query->the_post(); ?>

        <?php ele('eventCard');
        } ?>

    </ul>
</div>

<?php }

return ob_get_clean(); } ?>