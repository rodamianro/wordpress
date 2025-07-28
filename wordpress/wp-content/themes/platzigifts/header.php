<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>
    <header>
        <div class="flex flex-row justify-between items-center gap-4 p-4 bg-black text-white">
            <div> <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="PlatziGifts Logo"> </div>
            <div>
                <?php wp_nav_menu(array(
                    'theme_location' => 'top_menu',
                    'menu_class' => 'top-menu flex justify-center items-center gap-4 text-white',
                    'container_class' => 'contaner-top-menu',
                )) ?>
            </div>
        </div>
    </header>