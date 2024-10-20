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

<?php } else{
    echo "<p style='text-align:center; background-color: #ffc6c6; padding: 15px; border-radius: 15px;'>NO HAY EVENTOS</p>";
}

return ob_get_clean(); } ?>