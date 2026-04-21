<?php
/*
Template Name: Моя уникальная страница
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Уникальная страница</title>
    <style>
        /* Пишите здесь свой CSS код, чтобы страница выглядела как новая тема */
        body { font-family: sans-serif; background: #f0f0f0; margin: 0; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 40px; border-radius: 10px; }
        h1 { color: #333; }
    </style>
    <?php wp_head(); // Это нужно, чтобы работали скрипты и плагины ?>
</head>
<body>

<div class="container">
    <?php
    while ( have_posts() ) : the_post();
        echo '<h1>' . get_the_title() . '</h1>';
        the_content();
    endwhile;
    ?>
</div>

<?php wp_footer(); // Это нужно для корректной работы WP ?>
</body>
</html>
