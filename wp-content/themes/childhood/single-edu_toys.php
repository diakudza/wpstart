<?php
/*
* Template Name: Шаблон для развивающих игрушек
* Template Post Type: post, edu_toys
*/
?>

<?php
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		}
		?>
	</main>
</div>

<div class="container toys">
	<h2 class="subtitle">Новые товары:</h2>
	<div class="toys__wrapper">

		<?php
		$posts = get_posts( [
			'numberposts'      => 3,
			'category_name'    => 'edu_toys',
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




</div>
<?php
get_footer();
?>
