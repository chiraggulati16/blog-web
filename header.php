<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset=<?php bloginfo( "charset"); ?>>
    <title>Document</title>
    <?php wp_head();?>
</head>
<body>
    <header>
        <nav class="navbar-custom py-4 px-4">
            <img class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/logo.svg' ?>"/> 
            <div class="d-flex flex-row align-items-center">
                <ul class="d-flex list-unstyled m-0">
                    <?php 
                    
                    $categories = get_categories();

                    
                    foreach($categories as $cat): 
                    ?>
                    <li class="categories">
                        <a class="text-decoration-none" href="<?php 
                         get_category_link($cat)?>"><?php echo $cat->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>    
            </div>

            <div class="d-flex flex-row align-items-center">
                <a class="mx-2 button">Subscribe!</a>
                <div class="nav-item dropdown">
                    <button class="btn btn_search">
                        <img class="icons" src="<?php echo get_template_directory_uri() . '/assets/images/search.png' ?>"/> 
                    </button>
                    <?php get_search_form(); ?>
                </div>
                <img class="icons mx-2" src="<?php echo get_template_directory_uri() . '/assets/images/menu.png' ?>"/> 
            <div> 
        </nav>    
    </header>