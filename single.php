<?php get_header(); ?>
<?php
if(have_posts()):
    while(have_posts()):
        the_post();
?>
        <div class="row g-4 mx-4">
            <div class="d-flex col-lg-12 single-page-bgImage rounded-3 align-items-center text-center"
            style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'thumbnail' ); ?>);">
                <div class="w-100 my-auto">
                    <a href="#" class="badge text-bg-danger mb-2 text-decoration-none">
                        <?php echo get_the_category()[0]->name; ?>
                    </a>
                    <h2 class="text-white mx-4 text-center"><?php the_title(); ?></h2>
                    <ul class="d-none d-sm-flex align-items-center m-0 p-0 justify-content-center">
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

            <div class="row mt-5">
                <div class="col-lg-9 ">
                    <?php the_content(); 
                    if(comments_open()):?>
                    <div class="comment-area">
                        <?php comments_template(); ?>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="col-lg-3">
                <?php 
                    if(is_active_sidebar('wp-blog-1')) {
                        dynamic_sidebar('wp-blog-1');
                    }
                    ?>
                </div>
            </div>
        </div>
        
<?php       
    endwhile;
endif;
?>
<?php get_footer(); ?>