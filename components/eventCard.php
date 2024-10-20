<?php function eventCard() { ob_start(); ?>
<li class="event-card">
    <picture>
        <img src="<?php echo esc_html(get_post_meta(get_the_ID(), '_event_thumbnail', true)); ?>" alt="placeholder">
        <div class="categories">
            <?php 
            $categories = get_the_terms(get_the_ID(), 'category'); // Obtener las categorías del evento
            if ($categories && !is_wp_error($categories)) : ?>
            <?php foreach ($categories as $category) : ?>
            <span class="category-tag"><?php echo esc_html($category->name); ?></span>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="details">
            <span><i class="fas fa-map-marker-alt"></i>
                <?php echo esc_html(get_post_meta(get_the_ID(), '_event_location', true)); ?>
            </span>

            <span><i class="fas fa-calendar-alt"></i>
                <?php echo esc_html(get_post_meta(get_the_ID(), '_event_date', true)); ?>
            </span>
            <span><i class="fas fa-clock"></i>
                <?php echo esc_html(get_post_meta(get_the_ID(), '_event_time', true)); ?>
            </span>

        </div>
    </picture>
    <aside>
        <div>
            <h3><?php the_title(); ?></h3>
            <span><?php the_excerpt(); ?></span>
        </div>

        <div>

            <div>

                <span>
                    <?php echo esc_html(get_post_meta(get_the_ID(), '_event_price', true)); ?> €
                </span>
                <span><i class="fas fa-ticket-alt"></i>
                    <?php echo esc_html(get_post_meta(get_the_ID(), '_tickets_left', true)); ?> Libres
                </span>

            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn--info">Más información</a>
            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), '_event_url_tickets', true)); ?>" target="_blank"
                class="btn btn--primary">Comprar Entradas</a>
        </div>
    </aside>
</li>
<?php return ob_get_clean(); } ?>