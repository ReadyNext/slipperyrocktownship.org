<!DOCTYPE html>
<html class="h-100" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Josh Johnson dba ReadyNext">
    <meta charset="<?php bloginfo('charset'); ?>">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body class="bg-light h-100">
    <div class="d-flex flex-column h-100">
        <div data-area="masthead">
            <?php get_template_part('template-parts/masthead/jumbotron'); ?>
        </div>
        <div data-area="navigation">
            
            <?php get_template_part('template-parts/navigation/navbar'); ?>

        </div>
        <div class="flex-grow-1" data-area="content">
            <div class="container p-2">
                <div class="row">
                    <div class="col">
                        <?php
                        if (is_single() || is_page()) {
                            get_template_part('template-parts/content/content-single');
                        }

                        else {
                            get_template_part('template-parts/content/content-list');
                        }
                        ?>
                    </div>
                    <?php if ($has_sidebar_1) { ?>
                        <div class="col-12 col-md-2">
                            <?php dynamic_sidebar(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between" data-area="footer">
            <div class="bg-dark container-fluid pt-1 text-light">
                <div class="row">
                    <div class="col" style="font-size:0.7em;">
                        <p class="text-center">
                            &copy; 2020, Slippery Rock Township, Lawrence County, PA<br>
                            Site provided by <a href="https://readynext.io" target="_blank">Josh Johnson dba ReadyNext</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
        crossorigin="anonymous"></script>

    <?php wp_footer(); ?>
</body>

</html>