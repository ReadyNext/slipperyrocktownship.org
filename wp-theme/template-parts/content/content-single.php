<?php

the_post();

if (!is_front_page()) {?>

    <h1><?= get_the_title(); ?></h1>

    <?php if (!is_page()) { ?>
        <h6 class="mb-0 text-muted"><?= get_the_author(); ?></h6>
        <p class="mb-4 text-muted"><?= get_the_date(); ?> at <?= get_the_time(); ?></p>
    <?php } ?>

    <?php if (get_post_meta(get_the_ID(), 'show_date_modified', true) == 'true') { ?>
        <p class="mb-4 text-muted">
            <span class="font-weight-bold">Updated:</span> <?= get_the_modified_date(); ?> at <?= get_the_modified_time(); ?>
        </p>
    <?php } ?>

<?php }

the_content();