<?php

/*
 * Template Name: Наша история
 */

get_header();
?>

    <div class="aboutus">
        <div class="container">
            <h1 class="title"><?= the_title() ?></h1>
			<?php
			$posts = get_posts( [
				'numberposts'      => - 1,
				'category_name'    => 'history',
				'orderby'          => 'date',
				'order'            => 'ASC',
				'post_type'        => 'post',
				'suppress_filters' => true,
			] );

			foreach ( $posts as $key => $post ) {
				setup_postdata( $post );

				?>
                <div class="row" <?php if ( $key % 2 !== 0 ) { ?> style="flex-direction: row-reverse;" <?php } ?> >
                    <div class="col-lg-6">
                        <div class="subtitle">
							<?= the_title() ?>
                        </div>
                        <div class="aboutus__text">
							<?= the_field( 'history_description' ) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="aboutus__img" src="<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail_url();
						} else {
							echo get_template_directory_uri() . '/assets/img/not-found.jpg';
						} ?>" alt="мир детства">
                    </div>
                </div>

			<?php };
			wp_reset_postdata();
			?>

        </div>
    </div>

<?=
get_footer();
?>