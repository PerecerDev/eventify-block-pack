<?php function filterCards() { ob_start(); 
$current_category = get_current_category();
    $categories = get_terms([
        'taxonomy'   => 'category',
        'hide_empty' => true,
    ]); ?>

<form class="filter-form" method="get" action="">
    <select name="category" id="category" class="filter-form__select">
        <option value="">Todas las categorías</option>
        <?php foreach ($categories as $category) {
                $selected = ($current_category === $category->slug) ? 'selected' : '';
                echo '<option value="' . esc_attr($category->slug) . '" ' . esc_attr($selected) . '>' . esc_html($category->name) . '</option>';
            } ?>
    </select>
    <input type="hidden" name="paged" value="1" />
    <button type="submit" class="btn btn--info filter-form__button">Filtrar</button>
</form>


<?php return ob_get_clean(); } ?>