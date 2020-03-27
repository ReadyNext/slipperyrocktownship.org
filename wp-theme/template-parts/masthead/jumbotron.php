<?php
    $jumbotron_wrapper_style = "";

    if (has_header_image()) {
        $header_image_url = get_header_image();

        $caption = wp_get_attachment_caption(attachment_url_to_postid($header_image_url));
        $jumbotron_wrapper_style = 'style="background-image:url(' . $header_image_url .');background-position:center;"';
    }
?>

<div class="jumbotron-wrapper" <?= $jumbotron_wrapper_style ?>>

    <div class="jumbotron jumbotron-fluid" style="background:transparent;margin-bottom:0;">
        <div class="container text-center text-light" style="text-shadow:2px 2px #222222;">
            <h1 class="display-4">
                <?= get_bloginfo('name') ?>
            </h1>
            <p class="lead">
                <?= get_bloginfo('description') ?>
            </p>
        </div>
    </div>

    <?php if (!empty($caption)) { ?>
        <div class="pb-1 text-right" style="opacity:0.75;">
            <span class="badge badge-pill badge-dark">
                <?= $caption ?>
            </span>
        </div>
    <?php } ?>

</div>
