<footer class="bg-dark pt-5 mt-4">
    <div class="container">
        <div class="row pt-3 pb-4">
            <div class="col-md-3">
                <img class="footer_logo" src="<?php echo get_template_directory_uri() . '/assets/images/footer_logo.svg' ?>"/> 
            </div>
            <div class="col-md-5">
				<p class="text-white">The next-generation blog, news, and magazine theme for you to start sharing your stories today! This Bootstrap 5 based theme is ideal for all types of sites that deliver the news.</p>
			</div>

            <div class="col-md-4">
				<!-- Form -->
				<form class="row row-cols-lg-auto g-2 align-items-center justify-content-end">
					<div class="col-12">
						<input type="email" class="form-control" placeholder="Enter your email address">
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary m-0">Subscribe</button>
					</div>
				</form>
			</div>
        </div>

        <div class="container">
			<div class="row align-items-center justify-content-md-between py-4">
				<div class="col-md-12">
					<!-- Copyright -->
					<div class="text-center text-white">
                        <?php echo get_theme_mod('footer_copyrights','Blog Sample Template'); ?>
					</div>
				</div>
			</div>
		</div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

