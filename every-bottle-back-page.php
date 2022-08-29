<?php /* Template Name: Every Bottle Back */
get_header();
//get_header('every-bottle-back');
?>


<!-- Slider main container -->
<div class="swiper-container swiper-non-border">
	<!-- Additional required wrapper -->
	<div class="swiper-wrapper">
		<div class="swiper-slide slide slide-1">
			<div class="circle"></div>	
			<div class="content">
				<?php if( get_field('icon_slide_1') ): ?>
					<img class="img-fluid img-every-bottle-back" src="<?php the_field('icon_slide_1'); ?>"  alt="every-bottle-back"/>
				<?php endif; ?>

				<div class="row">
					<div class="col-desc">
						<?php if( have_rows('title_slide_1') ) : ?>
							<h3 class="h3">
								<?php while ( have_rows('title_slide_1') ) : the_row(); ?>
									<?php
										$title_slide = get_sub_field('title_item_slide_1');
									?>

									<strong><span><?php echo $title_slide ?></span></strong>
								<?php endwhile; ?>
							</h3>
						<?php endif; ?>

						<?php if( get_field('text_slider_1') ): ?>
							<div class="description">
								<?php the_field('text_slider_1'); ?>
							</div>
						<?php endif; ?>
					</div>
					
					<div class="col-lg-6 offset-lg-1">
						<div class="consultant-with-bottle">
							<?php $vimeoID = get_field('vimeo_video_id');
							$vimeoThumb = get_field('vimeo_video_thumbnail');
							$imgConsultant = get_field('img_consultant_slider_1');

							if ( $vimeoID && $vimeoThumb ): ?>
                                <a data-fancybox href="https://player.vimeo.com/video/<?php echo $vimeoID; ?>">
                                    <img class="card-img-top img-fluid" src="<?php echo $vimeoThumb; ?>">
                                </a>
							<?php endif;

                            if( !$vimeoID || !$vimeoThumb && $imgConsultant ): ?>
								<img class="img-consultant-with-bottle" src="<?php the_field('img_consultant_slider_1'); ?>"  alt="consultant-with-bottle"/>
							<?php endif; ?>

							<?php if( have_rows('logo_repeater') ) : ?>
								<div class="column-logo">
									<?php while ( have_rows('logo_repeater') ) : the_row(); ?>
										<div class="logo-item">
											<?php
											$image_logo = get_sub_field('logo');
											$brand_url = get_sub_field('link');
											?>

											<a href="<?php echo $brand_url; ?>" target="_blank" class="brand"><img class="brand-img" src="<?php echo $image_logo ?>" /></a>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>	
				
				<?php if( get_field('svg_slider_1') ): ?>
					<?php the_field('svg_slider_1'); ?>
				<?php endif; ?>
				
				<?php if( get_field('bottle_slide_1') ): ?>
					<img class="img-fluid img-bottle" src="<?php the_field('bottle_slide_1'); ?>"  alt="bottle"/>
				<?php endif; ?>	
			</div>
		</div>
		<div class="swiper-slide slide slide-2">
			<div class="circle"></div>	
			<div class="content">
				<?php if( get_field('icon_slide_2') ): ?>
					<div class="block-icon">
						<img class="img-fluid img-icon" src="<?php the_field('icon_slide_2'); ?>"  alt="icon"/>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-desc">
						<?php if( have_rows('title_slide_2') ) : ?>
							<h3 class="h3">
								<?php while ( have_rows('title_slide_2') ) : the_row(); ?>
									<?php
										$title_slide = get_sub_field('title_item_slide_2');
									?>

									<strong><span><?php echo $title_slide ?></span></strong>
								<?php endwhile; ?>
							</h3>
						<?php endif; ?>

						
						<?php if( get_field('text_slider_2') ): ?>
							<div class="description">
								<?php the_field('text_slider_2'); ?>
							</div>
						<?php endif; ?>
					
					</div>
				</div>
				<div class="row-img">
					<div class="col">
						<?php if( get_field('img_top_slide_2') ): ?>
							<div class="img-top-right border-left-g"> 
								<img class="img-fluid img-info" src="<?php the_field('img_top_slide_2'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
					<div class="col">
						<?php if( get_field('img_bottom_slide_2') ): ?>
							<div class="img-bottom-right border-right-y"> 
								<img class="img-fluid img-info" src="<?php the_field('img_bottom_slide_2'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
				</div>
				
				<?php if( get_field('svg_slider_2') ): ?>
					<?php the_field('svg_slider_2'); ?>
				<?php endif; ?>

				<?php if( get_field('bottle_slide_2') ): ?>
					<img class="img-fluid img-bottle" src="<?php the_field('bottle_slide_2'); ?>"  alt="bottle"/>
				<?php endif; ?>
			</div>
		</div>
		<div class="swiper-slide slide slide-3">
			<div class="circle"></div>	
			<div class="content">
				<?php if( get_field('icon_slide_3') ): ?>
					<div class="block-icon">
						<img class="img-fluid img-icon" src="<?php the_field('icon_slide_3'); ?>"  alt="icon"/>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-desc">
						<?php if( have_rows('title_slide_3') ) : ?>
							<h3 class="h3">
								<?php while ( have_rows('title_slide_3') ) : the_row(); ?>
									<?php
										$title_slide = get_sub_field('title_item_slide_3');
									?>

									<strong><span><?php echo $title_slide ?></span></strong>
								<?php endwhile; ?>
							</h3>
						<?php endif; ?>

						
						<?php if( get_field('text_slider_3') ): ?>
							<div class="description">
								<?php the_field('text_slider_3'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="row-img">
					<div class="col">
						<?php if( get_field('img_top_slide_3') ): ?>
							<div class="img-top-right border-left-y"> 
								<img class="img-fluid img-info" src="<?php the_field('img_top_slide_3'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
					<div class="col">
						<?php if( get_field('img_bottom_slide_3') ): ?>
							<div class="img-bottom-right border-right-g"> 
								<img class="img-fluid img-info" src="<?php the_field('img_bottom_slide_3'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<?php if( get_field('svg_slider_3') ): ?>
					<?php the_field('svg_slider_3'); ?>
				<?php endif; ?>

				<?php if( get_field('bottle_slide_3') ): ?>
					<img class="img-fluid img-bottle" src="<?php the_field('bottle_slide_3'); ?>"  alt="bottle"/>
				<?php endif; ?>
			</div>	
		</div>
		<div class="swiper-slide slide slide-4">
			<div class="circle"></div>	
			<div class="content">
				<?php if( get_field('icon_slide_4') ): ?>
					<div class="block-icon">
						<img class="img-fluid img-icon" src="<?php the_field('icon_slide_4'); ?>"  alt="icon"/>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-desc">
						<?php if( have_rows('title_slide_4') ) : ?>
							<h3 class="h3">
								<?php while ( have_rows('title_slide_4') ) : the_row(); ?>
									<?php
										$title_slide = get_sub_field('title_item_slide_4');
									?>

									<strong><span><?php echo $title_slide ?></span></strong>
								<?php endwhile; ?>
							</h3>
						<?php endif; ?>

						<?php if( get_field('text_slider_4') ): ?>
							<div class="description">
								<?php the_field('text_slider_4'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="row-img">
					<div class="col">
						<?php if( get_field('img_top_slide_4') ): ?>
							<div class="img-top-right border-right-y"> 
								<img class="img-fluid img-info" src="<?php the_field('img_top_slide_4'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
					<div class="col">
						<?php if( get_field('img_bottom_slide_4') ): ?>
							<div class="img-bottom-right border-left-b"> 
								<img class="img-fluid img-info" src="<?php the_field('img_bottom_slide_4'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<?php if( get_field('svg_slider_4') ): ?>
					<?php the_field('svg_slider_4'); ?>
				<?php endif; ?>

				<?php if( get_field('bottle_slide_4') ): ?>
					<img class="img-fluid img-bottle" src="<?php the_field('bottle_slide_4'); ?>"  alt="bottle"/>
				<?php endif; ?>
			</div>
		</div>
		<div class="swiper-slide slide slide-5">
			<div class="circle"></div>	
			<div class="content">
				<?php if( get_field('icon_slide_5') ): ?>
					<div class="block-icon">
						<img class="img-fluid img-icon" src="<?php the_field('icon_slide_5'); ?>"  alt="icon"/>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-desc">	
						<?php if( have_rows('title_slide_5') ) : ?>
							<h3 class="h3">
								<?php while ( have_rows('title_slide_5') ) : the_row(); ?>
									<?php
										$title_slide = get_sub_field('title_item_slide_5');
									?>

									<strong><span><?php echo $title_slide ?></span></strong>
								<?php endwhile; ?>
							</h3>
						<?php endif; ?>

						<?php if( get_field('text_slider_5') ): ?>
							<div class="description">
								<?php the_field('text_slider_5'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="row-img">
					<div class="col">
						<?php if( get_field('img_top_slide_5') ): ?>
							<div class="img-top-right border-right-y"> 
								<img class="img-fluid img-info" src="<?php the_field('img_top_slide_5'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
					<div class="col">
						<?php if( get_field('img_bottom_slide_5') ): ?>
							<div class="img-bottom-right border-left-b"> 
								<img class="img-fluid img-info" src="<?php the_field('img_bottom_slide_5'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
				</div>
				
				<?php if( get_field('svg_slider_5') ): ?>
					<?php the_field('svg_slider_5'); ?>
				<?php endif; ?>

				<?php if( get_field('bottle_slide_5') ): ?>
					<img class="img-fluid img-bottle" src="<?php the_field('bottle_slide_5'); ?>"  alt="bottle"/>
				<?php endif; ?>
			</div>	
		</div>
		<div class="swiper-slide slide slide-6">
			<div class="circle"></div>	
			<div class="content">
				<?php if( get_field('icon_slide_6') ): ?>
					<div class="block-icon">
						<img class="img-fluid img-icon" src="<?php the_field('icon_slide_6'); ?>"  alt="icon"/>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-desc">
						<?php if( have_rows('title_slide_6') ) : ?>
							<h3 class="h3">
								<?php while ( have_rows('title_slide_6') ) : the_row(); ?>
									<?php
										$title_slide = get_sub_field('title_item_slide_6');
									?>

									<strong><span><?php echo $title_slide ?></span></strong>
								<?php endwhile; ?>
							</h3>
						<?php endif; ?>

						
						<?php if( get_field('text_slider_6') ): ?>
							<div class="description">
								<?php the_field('text_slider_6'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="row-img">
					<div class="col">
						<?php if( get_field('img_top_slide_6') ): ?>
							<div class="img-top-right border-right-g"> 
								<img class="img-fluid img-info" src="<?php the_field('img_top_slide_6'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
					<div class="col">
						<?php if( get_field('img_bottom_slide_6') ): ?>
							<div class="img-bottom-right border-left-b"> 
								<img class="img-fluid img-info" src="<?php the_field('img_bottom_slide_6'); ?>"/>
							</div>
						<?php endif; ?>
					</div>
				</div>
				

				<?php if( get_field('svg_slider_6') ): ?>
					<?php the_field('svg_slider_6'); ?>
				<?php endif; ?>

				<?php if( get_field('bottle_slide_6') ): ?>
					<img class="img-fluid img-bottle" src="<?php the_field('bottle_slide_6'); ?>"  alt="bottle"/>
				<?php endif; ?>
			</div>	
		</div>
		<div class="swiper-slide slide slide-7">
			<div class="content content-last">
				<div class="top-info">
					<?php if( have_rows('title_slide_7') ) : ?>
						<h3 class="h5">
							<?php while ( have_rows('title_slide_7') ) : the_row(); ?>
                                <?php $title_slide = get_sub_field('title_item_slide_7'); ?>
                                <strong><span><?php echo $title_slide ?></span></strong>
							<?php endwhile; ?>
						</h3>
					<?php endif; ?>

					

					<?php if( get_field('text_slider_7') ): ?>
						<div class="desc">
							<?php the_field('text_slider_7'); ?>
						</div>
					<?php endif; ?>

					<?php if( get_field('img_consultant_slider_7') ): ?>
							<img class="img-consultant-with-bottle-last" src="<?php the_field('img_consultant_slider_7'); ?>"  alt="consultant-with-bottle"/>
					<?php endif; ?>
				</div>
			
				<div class="bottom-info">
					<?php if( get_field('img_consultant_slider_7') ): ?>
						<div class="img-consultant">
							<img class="img-consultant-with-bottle-last-safari" src="<?php the_field('img_consultant_slider_7'); ?>"  alt="consultant-with-bottle"/>
						</div>
					<?php endif; ?>

					<div class="footer">
						<div class="container">
							<div class="col-3 col-logo">
								<?php //the_custom_logo(); ?>

								<?php if( get_field('copyrights_slider_7') ): ?>
                                    <span><?php the_field('copyrights_slider_7'); ?></span>
                                <?php endif; ?>
							</div>

							<div class="col-9 col-footer">
								<div class="row">
									<div class="col-address">
										<h6>Address:</h6>
										<?php if( get_field('address_slider_7') ): ?>
											<span><?php the_field('address_slider_7'); ?></span>
										<?php endif; ?>
									</div>

									<div class="col-contact">
									<div class="col-email">
										<h6>Email:</h6>
										<?php if( get_field('email_slider_7') ): ?>
											<a href="mailto:<?php the_field('email_slider_7'); ?>"><?php the_field('email_slider_7'); ?></a>
										<?php endif; ?>
									</div>

									<div class="col-phone">
										<h6>Phone:</h6>
										<?php if( get_field('phone_slider_7') ): ?>
											<a href="tel:<?php the_field('phone_slider_7'); ?>"><?php the_field('phone_slider_7'); ?></a>
										<?php endif; ?>
									</div>
                                        <div class="col-links">
                                            <?php if( get_field('link_1_slider_7') ): ?>
                                                <a class="menu-item" href="<?php the_field('link_url_1_slider_7'); ?>"><?php the_field('link_1_slider_7'); ?></a>
                                            <?php endif; ?>
                                            |
                                            <?php if( get_field('link_2_slider_7') ): ?>
                                                <a class="menu-item" href="<?php the_field('link_url_2_slider_7'); ?>"><?php the_field('link_2_slider_7'); ?></a>
                                            <?php endif; ?>
                                        </div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- If we need pagination -->
		<div class="swiper-pagination"></div>
		<svg class="svg-circle" width="844" height="844" viewBox="0 0 844 844" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle class="circle-animate" r="415" transform="matrix(-0.999949 0.0101227 0.0101227 0.999949 422 422)" stroke="url(#paint1_linear)" stroke-width="4" stroke-linecap="round" stroke-dasharray="0.1 30"/>
			<defs>
				<linearGradient id="paint0_linear" x1="21.8568" y1="409.619" x2="634.947" y2="409.619" gradientUnits="userSpaceOnUse">
				<stop stop-color="#EEEEEE" stop-opacity="0"/>
				<stop offset="1" stop-color="#EEEEEE"/>
				</linearGradient>
				<linearGradient id="paint1_linear" x1="1.66176e-06" y1="379.1" x2="647.757" y2="381.325" gradientUnits="userSpaceOnUse">
				<stop offset="0.0260417" stop-color="#0A6535"/>
				<stop offset="0.385417" stop-color="#67BD26" stop-opacity="0"/>
				<stop offset="1" stop-color="#FFDC39" stop-opacity="0"/>
				</linearGradient>
			</defs>
		</svg>
	</div>
</div>	

<?php get_footer('every-bottle-back');
