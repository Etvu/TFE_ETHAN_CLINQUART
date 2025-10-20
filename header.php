<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/htmx.org@1.9.12" defer></script>
    <title><?php bloginfo( 'name' ); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> hx-boost="true">
  <?php wp_body_open(); ?>
    <header>

        <nav>
            <div class="container_nav">
                <span>CinéPixel</span>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'main-menu', // le nom de l'emplacement du menu
                        'container' => false, // pas de <div> autour du menu
                        'menu_class' => 'main-menu', // classe CSS du menu
                    ) );
                ?>
            </div>
        </nav>

    </header>
    <main id="content"
     hx-target="this"
        hx-select="main#content"
        hx-swap="innerHTML transition:true scroll:window:top">