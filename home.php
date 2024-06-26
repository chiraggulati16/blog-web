<?php get_header(); ?>
<div class="container">
<div class="row g-4">
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
        <div class="card bgImage card-overlay-bottom card-grid-lg card-bg-scale"
        style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'thumbnail' ); ?>);">
            <!-- Card Image overlay -->
            <div class="card-img-overlay d-flex align-items-center">
                <div class="w-100 mt-auto">
                    <!-- Card category -->
                    <a href="#" class="badge text-bg-danger mb-2">
                    <?php echo get_the_category()[0]->name; ?>
                    </a>
                    <!-- Card title -->
                    <h2 class="text-white h2"><a href="<?php the_permalink(); ?>" class="text-reset text-decoration-none">
                        <?php the_title(); ?></a></h2>
                    <p class="text-white"><?php echo wp_strip_all_tags(get_the_excerpt(), true);?></p>
                    <!-- Card info -->
                    <div>
                        <ul class="d-none d-sm-flex align-items-center m-0 p-0">
                            <li class="nav-item list-unstyled ">
                                <div class="nav-link">
                                    <div class="d-flex align-items-center text-white position-relative">
                                        <img class="userImage" src="<?php echo get_template_directory_uri() .'/assets/images/user1.png'?>" alt="avatar">
                                        <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">
                                            <?php echo get_author_name();?>
                                        </a></span>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item text-white mx-4"><?php echo get_the_date(); ?></li>
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
                <div class="card bgImgContainer2 card-overlay-bottom card-grid-lg card-bg-scale"
                style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail' ); ?>);">
                    <!-- Card Image overlay -->
                    <div class="card-img-overlay d-flex align-items-center">
                        <div class="mt-auto">
                            <!-- Card category -->
                            <a href="#" class="badge text-bg-warning mb-2"><?php echo get_the_category()[0]->name; ?></a>
                            <!-- Card title -->
                            <h2 class="text-white h4"><a href="<?php the_permalink(); ?>" class="text-reset text-decoration-none"><?php the_title(); ?></a></h2>
                            <!-- Card info -->
                            <div>
                                <ul class="d-none d-sm-flex align-items-center m-0 p-0">
                                    <li class="nav-item list-unstyled ">
                                        <div class="nav-link">
                                            <div class="d-flex align-items-center text-white position-relative">
                                                <img class="userImage" src="<?php echo get_template_directory_uri() .'/assets/images/user1.png'?>" alt="avatar">
                                                <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">
                                                <?php echo get_author_name();?>
                                                </a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item text-white mx-4"><?php echo get_the_date(); ?></li>
                                    <li class="nav-item text-white ml-1">5 min read</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else if($count == 3 || $count == 4) { ?>
            <div class="col-md-6">
                <div class="card bgImgContainer2 card-overlay-bottom card-grid-lg card-bg-scale"
                style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'thumbnail' ); ?>);">
                    <!-- Card Image overlay -->
                    <div class="card-img-overlay d-flex align-items-center">
                        <div class="mt-auto">
                            <!-- Card category -->
                            <a href="#" class="badge <?php 
                            if($count == 3) {
                                echo "text-bg-success";
                            }
                            else {
                                echo "text-bg-info";
                            } ?>
                             mb-2"><?php echo get_the_category()[0]->name; ?></a>
                            <!-- Card title -->
                            <h2 class="text-white h4"><a href="<?php the_permalink(); ?>" class="text-reset text-decoration-none"><?php the_title(); ?></a></h2>
                           
                        </div>
                    </div>
                </div>
            </div>
            <?php }     
            $count++;
    }
}
wp_reset_postdata(); 
?>
        </div>
    </div>

</div>

</div>
<section class="position-relative">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-9">
                <div class="mb-4">
                    <h2 class="m-0">Today's top highlights</h2>
                    <p>Latest breaking news, pictures, videos, and special reports</p>
                </div> 
               
                <div class="row gy-4">

                <?php if ( have_posts() ) : 
                    while ( have_posts() ) : 
                    the_post(); ?>
					<!-- Card item START -->
					<div class="col-lg-6">
						<div class="card cardStyle">
							<!-- Card img -->
							<div class="position-relative">
								<img class="card-img" src=<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'thumbnail' ); ?> alt="Card image">
								<div class="card-img-overlay d-flex align-items-start flex-column p-3">
									<!-- Card overlay bottom -->
									<div class="w-100 mt-auto">
										<!-- Card category -->
										<a href="#" class="badge text-bg-warning mb-2"><?php echo get_the_category()[0]->name; ?></a>
									</div>
								</div>
							</div>
							<div class="card-body px-0 pt-3">
								<h4 class="card-title mt-2 mx-2"><a href="<?php the_permalink(); ?>" class="btn-link text-reset fw-bold text-decoration-none">
                                <?php the_title(); ?>
                                </a></h4>
								<p class="card-text m-2"><?php echo substr(wp_strip_all_tags(get_the_excerpt(), true), 80);?></p>
								<!-- Card info -->
								<ul class="d-none d-sm-flex align-items-center m-0 ">
                                    <li class="nav-item list-unstyled ">
                                        <div class="nav-link">
                                            <div class="d-flex align-items-center position-relative">
                                                <img class="userImage" src="<?php echo get_template_directory_uri() .'/assets/images/user1.png'?>" alt="avatar">
                                                <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">
                                                <?php echo get_author_name();?>
                                                 </a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item mx-4"><?php echo get_the_date(); ?></li>
                                </ul>
							</div>
						</div>
					</div>
					
                    <?php endwhile;
                endif;
                 ?>

                    </div>
               
					<div class="col-12 text-center mt-5">
                        <?php next_posts_link("Load more post"); ?>
                        <?php previous_posts_link("Load previous post"); ?>
						<!-- <button type="button" class="btn btn-outline-primary">Load more post</button>
                        <button type="button" class="btn btn-outline-primary">Load more post</button> -->
					</div>
					<!-- Load more END -->
            </div>

            <div class="col-lg-3 mt-5 mt-lg-0">
				<div data-sticky="" data-margin-top="80" data-sticky-for="767">

					<!-- Social widget START -->
					<div class="row g-2">
						<div class="col-4">
							<a href="#" class="bg-facebook rounded text-center p-3 d-block text-decoration-none">
                            <img class="userImage" src="<?php echo get_template_directory_uri() .'/assets/images/facebook.png'?>" alt="facebook">
								<h6 class="m-0">1.5K</h6>
								<span class="small">Fans</span>
							</a>
						</div>
						<div class="col-4">
							<a href="#" class="bg-instagram-gradient rounded text-center text-white-force p-3 d-block
                            text-decoration-none">
                            <img class="userImage" src="<?php echo get_template_directory_uri() .'/assets/images/instagram.png'?>" alt="instagram">
								<h6 class="m-0">1.8M</h6>
								<span class="small">Followers</span>
							</a>
						</div>
						<div class="col-4">
							<a href="#" class="bg-youtube rounded text-center text-white-force p-3 d-block text-decoration-none">
                            <img class="userImage" src="<?php echo get_template_directory_uri() .'/assets/images/youtube.png'?>" alt="youtube">
								<h6 class="m-0">22K</h6>
								<span class="small">Subs</span>
							</a>
						</div>
					</div>
					<!-- Social widget END -->

					<!-- Trending topics widget START -->
                    <?php 
                    if(is_active_sidebar('wp-blog-1')) {
                        dynamic_sidebar('wp-blog-1');
                    }
                    ?>
				</div>
			</div>
        </div>
    </div>
</section>

<?php get_footer(); ?>    