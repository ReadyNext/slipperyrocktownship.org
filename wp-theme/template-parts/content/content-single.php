<?php

the_post();

if (!is_front_page()) {
    the_title('<h1 class="mb-2">', '</h1>');
}

the_content();