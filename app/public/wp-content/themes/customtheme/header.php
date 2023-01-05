<!DOCTYPE html>
<html lang=<?php language_attributes($doctype = "html") ?>>

<head>
    <meta charset=<?php bloginfo('charset') ?>>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="blog-masthead">
        <div class="container-nav">
            <div class="container-flex">
                <a href="#">
                    <h1 class="blog-title-nav">
                        <?php bloginfo('name') ?>
                    </h1>
                </a>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container' => 'nav',
                        'menu-class' => 'blog-nav',
                        // (custom arguments) add a and li classes
                        'add_a_class' => 'blog-nav-item-a',
                        'add_li_class' => 'blog-nav-item'

                    )
                );
                get_search_form();
                ?>
            </div>
        </div>
    </div>