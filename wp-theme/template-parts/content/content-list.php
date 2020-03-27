<?php rewind_posts(); while (have_posts()) { ?>

    <?php
        the_post();

        $card_bg_class = "";
        $card_text_class = "";
        $card_subtitle_text_class = "text-muted";

        if (is_sticky()) {
            $card_bg_class = "bg-primary";
            $card_text_class = "text-white";

            $tags = get_the_tags();

            $tags = array_map(function ($tag) {
                return $tag->slug;
            }, $tags);

            if (is_array($tags)) {
                if (in_array('sticky-primary', $tags)) {
                    $card_bg_class = 'bg-primary';
                    $card_text_class = 'text-white';
                }

                else if (in_array('sticky-success', $tags)) {
                    $card_bg_class = 'bg-success';
                    $card_text_class = 'text-dark';
                }

                else if (in_array('sticky-danger', $tags)) {
                    $card_bg_class = 'bg-danger';
                    $card_text_class = 'text-white';
                }

                else if (in_array('sticky-warning', $tags)) {
                    $card_bg_class = 'bg-warning';
                    $card_text_class = 'text-dark';
                }

                else if (in_array('sticky-info', $tags)) {
                    $card_bg_class = 'bg-info';
                    $card_text_class = 'text-white';
                }
            }

            $card_subtitle_text_class = $card_text_class;
        }
    ?>


    <div class="card mb-2 <?= $card_bg_class ?> <?= $card_text_class ?>">
        <div class="card-body">
            <h5 class="card-title">
                <a href="<?php echo esc_url(get_permalink()); ?>" style="color:inherit;">
                    <?php the_title(); ?>
                </a>
            </h5>
            <h6 class="card-subtitle mb-2 <?= $card_subtitle_text_class ?>"><?php the_author(); ?></h6>
            <p class="card-text"><?php
                if (has_excerpt()) {
                    the_excerpt();
                }

                else {
                    the_content();
                }
            ?></p>
        </div>
    </div>

<?php } ?>