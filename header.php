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
            <div class="d-lg-flex flex-row align-items-center ">
                <ul class="d-none d-sm-flex list-unstyled m-0">
                    <?php 
                    
                    $categories = get_categories();

                    
                    foreach($categories as $cat): 
                    ?>
                    <li class="categories">
                        <a class="text-decoration-none" href="<?php 
                         echo get_category_link($cat);?>"><?php echo $cat->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>    
            </div>

            <div class="d-flex flex-row align-items-center">
                <a class="mx-2 button"><?php echo get_option('option1', "Subscribe"); ?></a>
                <div class="nav-item dropdown">
                    <button class="btn btn_search">
                        <img class="icons" src="<?php echo get_template_directory_uri() . '/assets/images/search.png' ?>"/> 
                    </button>
                    <?php get_search_form(); ?>
                </div>
                <button class="btn btn_menu d-md-none d-sm-inline-block">
                <img class="icons " src="<?php echo get_template_directory_uri() . '/assets/images/menu.png' ?>"/> 
                </button>
            <div> 
        </nav>    
         <div class="navbar-collapse collapse sm_menu hide" id="navbarCollapse" style="">
				<ul class="navbar-nav navbar-nav-scroll mx-auto">
                <?php 
                    
                    $categories = get_categories();
                    foreach($categories as $cat): 
                    ?>
                    <li class="nav-item dropdown bottom-line">
						<a class="nav-link active my-1  mx-3" href="<?php echo
                         get_category_link($cat); ?>" id="homeMenu" >
                            <?php echo $cat->name; ?>
                        </a>
					</li>
                    <?php endforeach; ?>

				</ul>
			</div>
    </header>