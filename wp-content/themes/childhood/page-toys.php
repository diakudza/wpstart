<?php

/*
 * Template Name: игрушки
 */

get_header();
?>

    <div class="toys">
        <div class="container">
            <h2 class="subtitle"><?= the_title() ?></h2>
			<?php
			$category_filtered = [];
			foreach ( get_categories() as $category ) {
				if ( in_array( $category->category_nicename, [ 'edu_toys', 'soft_toys' ] ) ) {
					$category_filtered[] = $category;
				}
			} ?>

			<?php foreach ( $category_filtered as $category ) { ?>

                <a href="<?= '/' . $category->category_nicename ?>"><h3 class="subtitle"><?= $category->name ?></h3></a>
                <div class="toys__wrapper">

					<?php
					$posts = get_posts( [
						'numberposts'      => - 1,
						'category_name'    => $category->category_nicename,
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
			<?php } ?>

        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="toys__alert">
                    <span>Не нашли то, что искали?</span> Свяжитесь с нами - и мы с радостью создадим любую игрушку по
                    вашему желанию. Вы можете выбрать все: размер, материал, формы...!
                </div>
            </div>
        </div>
    </div>

<?=
get_footer();
?>