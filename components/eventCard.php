<?php function eventCard() { ob_start(); ?>
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
<?php return ob_get_clean(); } ?>