<?php

/*
 * Template Name: Наша команда
 */

get_header();
?>

<div class="specialists">
        <div class="container">
            <div class="title"><?= the_title() ?></div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <img class="specialists__img" src="<?= bloginfo( 'template_url' ); ?>/assets/img/team.jpg"
                         alt="наша команда">
                </div>
            </div>
        </div>
    </div>

<?=
get_footer();
?>