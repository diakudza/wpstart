<?php

/*
 * Template Name: Категории Мягкие игрушки
 */

get_header();
?>

    <div class="toys">
    <div class="container">
    <h2 class="subtitle">Категория мягкие игрушки</h2>
    <div class="toys__wrapper">

		<?php
		$posts = get_posts( [
			'numberposts'      => - 1,
			'category_name'    => 'soft_toys',
			'orderby'          => 'date',
			'order'            => 'ASC',
			'post_type'        => 'post',
			'suppress_filters' => true,
		] );

		foreach ( $posts as $post ) {
			setup_postdata( $post );
			?>

            <div class="toys__item"
                 style="background-image: url('<?php if ( has_post_thumbnail() ) {
				     the_post_thumbnail_url();
			     } else {
				     echo get_template_directory_uri() . '/assets/img/not-found.jpg';
			     } ?>');">
                <div class="toys__item-info">
                    <div class="toys__item-title"><?= the_title() ?></div>
                    <div class="toys__item-descr">
						<?= the_field( 'toys_description' ) ?>
                    </div>
                    <a href="<?= get_permalink() ?>" class="minibutton toys__trigger">Подробнее</a>
                </div>
            </div>
		<?php };
		wp_reset_postdata();
		?>

    </div>

<?=
get_footer();
?>