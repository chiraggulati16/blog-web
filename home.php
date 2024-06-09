<?php get_header(); ?>
<div class="row g-4 mx-4">
<?php
$sticky = get_option('sticky_posts');

rsort($sticky);
$sticky = array_slice($sticky, 0, 4);
$query = new WP_Query(array('post_per_page' => 2,'post_status' => 'publish','post__in' => $sticky, 'ignore_sticky_posts' => 1));

if($query -> have_posts()) {
    $count=1;
    while($query->have_posts()) {
        $query->the_post();
        
?>
<?php if($count == 1) { ?>
    <!-- Left big card -->
    <div class="col-lg-6" >
        <div class="card bgImage card-overlay-bottom card-grid-lg card-bg-scale">
            <!-- Card Image overlay -->
            <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                <div class="w-100 mt-auto">
                    <!-- Card category -->
                    <a href="#" class="badge text-bg-danger mb-2">
                        <?php the_category(',','', false);?>
                    </a>
                    <!-- Card title -->
                    <h2 class="text-white h2"><a href="post-single-4.html" class="text-reset"><?php the_title(); ?></a></h2>
                    <p class="text-white"><?php the_excerpt();?></p>
                    <!-- Card info -->
                    <div>
                        <ul class="d-none d-sm-flex align-items-center m-0 p-0">
                            <li class="nav-item list-unstyled ">
                                <div class="nav-link">
                                    <div class="d-flex align-items-center text-white position-relative">
                                        <img class="userImage" src="<?php echo get_template_directory_uri() .'/assets/images/user1.png'?>" alt="avatar">
                                        <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Louis</a></span>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item text-white mx-4">Nov 15, 2022</li>
                            <li class="nav-item text-white ml-1">5 min read</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row g-4">
    <?php } else if($count == 2) {?>
    <!-- Right small cards -->

            <!-- Card item START -->
            <div class="col-12">
                <div class="card bgImgContainer2 card-overlay-bottom card-grid-lg card-bg-scale">
                    <!-- Card Image overlay -->
                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                        <div class="mt-auto">
                            <!-- Card category -->
                            <a href="#" class="badge text-bg-danger mb-2"><?php the_category(',','', false);?></a>
                            <!-- Card title -->
                            <h2 class="text-white h4"><a href="post-single-4.html" class="text-reset"><?php the_title(); ?></a></h2>
                            <!-- Card info -->
                            <div>
                                <ul class="d-none d-sm-flex align-items-center m-0 p-0">
                                    <li class="nav-item list-unstyled ">
                                        <div class="nav-link">
                                            <div class="d-flex align-items-center text-white position-relative">
                                                <img class="userImage" src="<?php echo get_template_directory_uri() .'/assets/images/user1.png'?>" alt="avatar">
                                                <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Louis</a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item text-white mx-4">Nov 15, 2022</li>
                                    <li class="nav-item text-white ml-1">5 min read</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-md-6">
                <div class="card bgImgContainer2 card-overlay-bottom card-grid-lg card-bg-scale"
                style="background-image: url(<?php the_post_thumbnail('post-thumbnail'); ?>);">
                    <!-- Card Image overlay -->
                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                        <div class="mt-auto">
                            <!-- Card category -->
                            <a href="#" class="badge text-bg-danger mb-2"><?php the_category(',','', false);?></a>
                            <!-- Card title -->
                            <h2 class="text-white h4"><a href="post-single-4.html" class="text-reset"><?php the_title(); ?></a></h2>
                           
                        </div>
                    </div>
                </div>
            </div>
            <?php }     
            $count++;
    }
} ?>
        </div>
    </div>


</div>

<?php get_footer(); ?>    