<section class="hero">
	<!-- Upper Text -->
	<div class="uppertext text-center">
		<?php if (get_field('_upper_text_')): ?>
		<?php the_field('_upper_text_'); ?>
		<?php endif; ?>
	</div>

	<!-- Hero Slider -->
	<?php if (have_rows('_hero_slider_')): ?>
	<div class="slider stick-dots">
		<?php while (have_rows('_hero_slider_')): the_row(); ?>
		<div class="slide">
				<?php if ($slide_image = get_sub_field('_slide_image_')): ?>
					<link rel="preload" href="<?php echo esc_url($slide_image['url']); ?>" as="image">
					<div class="slide__img">
						<img src="<?php echo esc_url($slide_image['url']); ?>" alt="<?php echo esc_attr($slide_image['alt']); ?>"loading="lazy"
						data-lazy="<?php echo esc_url($slide_image['url']); ?>" class="full-image animated"
						data-animation-in="zoomInImage" />
			        </div>
				<?php endif; ?>

			<div class="slide__content">
				<div class="slide__content--headings">
					<?php if (get_sub_field('_button_text_')): ?>
					<div class="animated slider-head" data-animation-in="fadeInRight" data-delay-in="0.3">
						<p class="animated-button">
							<span class="button-text">
								<?php the_sub_field('_button_text_'); ?>
							</span>
						</p>
					</div>
					<?php endif; ?>

					<?php if (get_sub_field('_heading_')): ?>
					<?php $color = get_sub_field('_color_') ? get_sub_field('_color_') : 'rgb(0,48,91)'; ?>
					<p class="animated slider-large-heading" data-animation-in="fadeInRight" data-delay-in="2" 
						style="color: <?php echo esc_attr($color); ?>; -webkit-text-stroke: 0.5px #fff;">
						<?php the_sub_field('_heading_'); ?>
					</p>
					<?php endif; ?>

					<?php $desc_= get_sub_field('_description_'); ?>
					<?php $color = get_sub_field('_color_') ? get_sub_field('_color_') : 'rgb(0,48,91)'; ?>
					<p class="animated " style="color: <?php echo esc_attr($color); ?>;" data-animation-in="fadeInUp"
						data-delay-in="4">
						<?php echo $desc_;?>
					</p>


					<?php if (get_sub_field('_button_link_')): ?>
					<a href="<?php the_sub_field('_button_link_'); ?>"
						class="btn btn-outline-light px-3 py-1 px-md-4 py-md-2  rounded-0 get-quote text-white"
						data-animation-in="fadeInUp" data-delay-in="4">
						Book Therapy
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>

	<!-- Text Bar -->
	<div class="text-bar text-center">
		<?php if (get_field('_text_bar_')): ?>
		<?php the_field('_text_bar_'); ?>
		<?php endif; ?>
	</div>
</section>


<section class="sec content">
	<?php if (have_rows('about_us_section')) : while (have_rows('about_us_section')) : the_row();
			$link = get_sub_field('section_button');
	?>
	<div class="container-xxl container">
		<div class="row align-items-md-center">
			<div class="col-md-6 text-center text-md-start">
				<?= get_sub_field('section_description'); ?>
				<a class="cta mt-3 d-inline-block mb-3" href="<?php echo $link['url']; ?>">
					<?php echo $link['title']; ?>
				</a>
				<button id="playButton" style="visibility: hidden;">&nbsp;</button>
			</div>
			<div class="col-md-6">
				<?php echo do_shortcode('[foogallery id="4285"]'); ?>
				
			</div>
		</div>
		<?= get_sub_field('counter_section'); ?>
	</div>
	<?php endwhile;
	endif; ?>
</section>

<!-- insurance slider -->

<section class="partners insurance">
	<div class="container-fluid">
		<div class="row partners-logo-sec justify-content-between align-items-center">
			<div class="owl-carousel insurance-icons align-items-center">
			<?php if( have_rows('_insurance_') ):
					while( have_rows('_insurance_') ): 
						the_row(); ?>
						<?php 
						$insurance_image = get_sub_field('insurance_icon');
						?>
						 <?php if (!empty($insurance_image['url'])): ?>
						<div class="member text-center " style="max-height: 100%;" >
							<img src="<?php echo $insurance_image['url']; ?>" alt="partners"   loading="lazy"/>
						</div>
					<?php endif; endwhile; 
				endif; ?>
			</div>
		</div>
	</div>
</section>

<!-- <section class="fluid-sec">
	<?php if (have_rows('clinic_video_section')) : while (have_rows('clinic_video_section')) : the_row(); ?>
	<video class="w-100 p-0 mob-vid-img-height video-cover" src="" data-src="<?php  get_sub_field('clinic_video'); ?>"
		autoplay controls loop poster="<?php  get_sub_field('clinic_image'); ?>"></video>
	<?php endwhile;
	endif; ?>
</section> -->

<section id="services-home" class="sec services-home home-heading bgblue pt-4 pb-4">
	<div class="container-xxl sticky-heading">
		<div class="heading mb-4 line-through d-flex justify-content-center ">
		<h2 class="text-white mb-0" ><?php echo get_field('services_heading'); ?></h2>

		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php if (have_rows('services_section')) : while (have_rows('services_section')) : the_row();
					$service_link = get_sub_field('services_link');
			?>
			<div class="col-md box text-center p-4 d-flex flex-column">
				<div class="img d-flex mx-auto mb-4 pt-3"><img class="img-fluid"
						src="<?php echo get_sub_field('services_image'); ?>" alt="Medical Specialties"  loading="lazy"/></div>
				<h2 class="text-uppercase fw-bold mb-4 d-flex justify-content-center align-items-center"><a
						class="text-decoration-none" href="<?= $service_link['url']; ?>">
						<?= get_sub_field('services'); ?>
					</a></h2>
				<div class="d-flex flex-column justify-content-between flex-grow-1">
					<p class="fsm-p">
						<?= get_sub_field('services_in_brief'); ?>
					</p>
					<a class="text-decoration-none cta mt-4 d-inline-block mx-auto" href="<?= $service_link['url']; ?>">
						<?= $service_link['title']; ?>
					</a>
				</div>
			</div>
			<?php endwhile;
			endif; ?>
		</div>
	</div>
</section>


<section id="recovery-&-wellness" class="sec services-home home-heading bgblue pb-0 pt-0">
	<div class="container-xxl sticky-heading">
		<div class="heading mb-4 line-through d-flex justify-content-center">
			<h2 class="text-white mb-0" ><?php echo get_field('rw_section_heading'); ?></h2>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php if (have_rows('rw_services_section')) : while (have_rows('rw_services_section')) : the_row();
					$service_link = get_sub_field('rw_services_link');
			?>
			<div class="col-md box text-center p-4 d-flex flex-column">
				<div class="img d-flex mx-auto mb-4 pt-3"><img class="img-fluid"
						src="<?php echo get_sub_field('rw_services_image'); ?>" alt="Recovery & Wellness" loading="lazy" /></div>
				<h2 class="text-uppercase fw-bold mb-4 d-flex justify-content-center align-items-center"><a
						class="text-decoration-none" href="<?= $service_link['url']; ?>">
						<?= get_sub_field('rw_services'); ?>
					</a></h2>
				<div class="d-flex flex-column justify-content-between flex-grow-1">
					<p class="fsm-p">
						<?= get_sub_field('rw_services_in_brief'); ?>
					</p>
					<a class="text-decoration-none cta mt-4 d-inline-block mx-auto" href="<?= $service_link['url']; ?>">
						<?= $service_link['title']; ?>
					</a>
				</div>
			</div>
			<?php endwhile;
			endif; ?>
		</div>
	</div>
</section>

<section class="fluid-sec" id="video_care_sec">
	<video class="w-100 p-0 mob-vid-img-height video-cover" src="" data-src="<?php echo get_field('doctor_video'); ?>" autoplay muted controls  loop poster id="video_clinic_cover"></video>

</section>

<?php $i = 1;
	if (have_rows('care_section')) : while (have_rows('care_section')) : the_row(); ?>
<section class="care-sec bgblue">
	<div class="container-xxl container overflow-hidden">
		<div class="row align-items-md-center d-md-0 <?php echo $i % 2 == 0 ? " flex-md-row-reverse" : "" ; ?>">
			<div class="col-md-6 d-flex justify-content-center text-center py-4">
				<div class="text">
					<h3 class="home-care-sec text-white fw-bold">
						<?= get_sub_field('care_title'); ?>
					</h3>
					<hr class="mx-auto" />
					<div class="px-md-5" data-aos="<?php echo $i % 2 == 0 ? " fade-left" : "fade-right" ; ?>">
						<h3 class="text-white lh-base fw-light mb-0">
							<?= get_sub_field('care_description'); ?>
						</h3>
						<p class="fs-6 fw-light fst-italic text-white">
							<?= get_sub_field('care_extra_field'); ?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md px-0">
				<div class="img"><img class="w-100" src="<?= get_sub_field('care_image'); ?>" alt="care section" loading="lazy" /></div>
			</div>
		</div>
	</div>
</section>
<?php $i++;
		endwhile;

	endif; 
?>

<section class="sec certification bgblue">
	<?php if (have_rows('certification_section')) : while (have_rows('certification_section')) : the_row();
			$certification_link = get_sub_field('certification_link'); ?>
	<?php $link = get_sub_field('certificate_link'); ?>
	<div class="container text-center" style="max-width: 420px">
		<div class="img mb-4"><a href="<?php echo esc_url($link['url']); ?>"><img
					src="<?= get_sub_field('certification_image'); ?>" alt="certification"  loading="lazy"/></a></div>
		<div class="text">
			<p class="text-white fw-light fst-italic lh-sm">
				<?= get_sub_field('certification_description'); ?> <a class="text-white"
					href="<?= $certification_link['url']; ?>">
					<?= $certification_link['title']; ?>
				</a>.
			</p>
		</div>
	</div>
	<?php endwhile;
	endif; ?>
</section>


<section class="parallax-bg para-desktop"
	style="background-image: url(<?= get_field('parallex_image'); ?>); background-position: center;">
	<div class="img"><img class="" src="<?= get_field('parallex_image'); ?>" alt="parallax" loading="lazy" /></div>
</section>

<!-- Media section -->
<section class=" services-home bgblue" >
	<div class="container-xxl sticky-heading-media">
		<div class="heading p-4 line-through d-flex justify-content-center">
			<h4 class="home-heading-sec text-white mb-0">Media</h4>
		</div>
	</div>
	<div class="container overflow-hidden">
		<div class="social text-center">
			<div class="img-fluid">
				<div class="media-section-carousel">
					<?php if (have_rows('media_section')) : while (have_rows('media_section')) : the_row(); ?>
					<div class="item ">
						<video class="w-100" src="" data-src="<?php echo get_sub_field('media'); ?>" muted autoplay loop
							poster=""></video>
					</div>
					<?php endwhile;
					    endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- testimonaial -->
<section class=" services-home bgblue pb-5" style="border-bottom: 0.5px solid #fff;">
	<div class="container-xxl sticky-heading-media">
		<div class="heading p-4 line-through d-flex justify-content-center">
			<h4 class="home-heading-sec text-white mb-0"><?php echo get_field('test_heading'); ?></h4>
		</div>
	</div>
	<div class="container">
		<div class="testimonial-block testimonial-section-carousel">
			<?php if (have_rows('testimonial')) : while (have_rows('testimonial')) : the_row();?>
				<div class="card d-flex flex-column">
					<div class="mt-2">
						<?php
							$rating = get_sub_field('rating');
							for ($i = 0; $i < $rating; $i++) { ?>
									<span class="fas fa-star active-star"></span>
						<?php } ?>
					</div>
					<div class="testimonial">
						<i class="fa fa-quote-left fa-2x"></i>
						<p><?= get_sub_field('comment'); ?></p>
					</div>
					<div class="d-flex flex-row profile pt-2 mt-auto">
						<div class="d-flex flex-column pl-2">
							<div class="name"><b style="font-size: 18px;"><?= get_sub_field('author'); ?></b></div>
							<p class="text-muted designation"><?php get_sub_field('time'); ?></p>
						</div>
					</div>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div >	
</section>
<p > </p>
<section class="map pt-0 pb-5 home-heading" id="map" >
	<div class="container-xxl sticky-heading-contact">
		<div class="heading mb-4 line-through white d-flex justify-content-center">
			<h4 class="home-heading-sec bg-white mb-0" >Contact Us</h4>
		</div>
	</div>
	<div class="gmap" >
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.7890850569333!2d-79.5939083245275!3d43.590109356510126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b47b1aa955555%3A0xd2d769ff0bfe232c!2s755%20Queensway%20E%20Suite%20304%2C%20Mississauga%2C%20ON%20L4Y%204C5%2C%20Canada!5e0!3m2!1sen!2sin!4v1704795404337!5m2!1sen!2sin"
			width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"></iframe>
	
	</div>
</section>



<!-- <p id="contact_information">&nbsp;</p> -->
<section class="contact-text bgblue py-4 pt-1">
	<?php if (have_rows('home_footer_section')) : while (have_rows('home_footer_section')) : the_row();
			$fee_button = get_sub_field('fee_button'); ?>
	<div class="container-xxl text-center mt-4" style="max-width: 600px">
		<?= get_sub_field('footer_description'); ?>
		<div class="social mt-2 mb-4">
			<ul class="nav justify-content-center">
				<?php if (have_rows('social_icons')) : while (have_rows('social_icons')) : the_row();
						?>
				<li class="mx-1">
					<a href="<?= get_sub_field('icon_link'); ?>"><img src="<?= get_sub_field('icon_image'); ?>"
							alt="social media icon"  loading="lazy"/></a>
				</li>
				<?php endwhile;
						endif; ?>
			</ul>
		</div>
		<a class="cta" href="<?= $fee_button['url']; ?>" style="font-size: 19px; ">
			<?= $fee_button['title']; ?>
		</a>
	</div>
	<?php endwhile;
	endif; ?>
</section>

<section class="partners">
	<div class="container-fluid">
		<div class="row partners-logo-sec justify-content-between align-items-center">
			<div class="owl-carousel partner-icons align-items-center">
				<?php if (have_rows('partner_section')) : while (have_rows('partner_section')) : the_row(); ?>
				<?php $sectionLink = get_sub_field('partner_link'); ?>
				<div class="member text-center py-4" style="max-height: 100px; filter: grayscale(1);"><a
						href="<?php echo esc_url($sectionLink['url']); ?>"><img class="img-fluid h-100 w-auto d-inline"
							src="<?= get_sub_field('partner_icon'); ?>" alt="partners"loading="lazy" /></a></div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>




<script>
	$(document).ready(function () {
	// Variable to track play/pause state
	let isPaused = false;
	let sliderInterval;
	let slideTimeout;

	// Initialize the slider
	$('.slider').slick({
		autoplay: true,
		speed: 2500,
		autoplaySpeed: 10000,
		lazyLoad: 'progressive',
		arrows: true,
		dots: true,
		prevArrow: '<button class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button class="slick-next"><i class="fa fa-chevron-right"></i></button>'
	}).slickAnimation();

	// Slide change handler for button animations
	$('.slider').on('afterChange', function (event, slick, currentSlide) {
		let pbtnb = $('.animated-button');
		pbtnb.each(function () {
			this.classList.remove('loaded');
		});

		let currentslide = $('[data-slick-index="' + currentSlide + '"]');
		setTimeout(function () {
			currentslide.find('.animated-button').each(function () {
				this.classList.add('loaded');
			});
		}, 500);
	});

	// Initially animate buttons in the first slide
	let initial = $('[data-slick-index="0"]');
	setTimeout(function () {
		initial.find('.animated-button').each(function () {
			this.classList.add('loaded');
		});
	}, 500);

	// Auto navigation with setInterval
	function startSliderInterval() {
		clearInterval(sliderInterval);
		sliderInterval = setInterval(() => {
			if (!isPaused) {
				$('.slick-next').click();
			}
		}, 10000);
	}
	startSliderInterval();

	// Pause and Reset Timer on Manual Navigation
	function resetSliderTimer() {
		clearTimeout(slideTimeout);
		clearInterval(sliderInterval);
		isPaused = true; // Pause slider during manual navigation

		slideTimeout = setTimeout(() => {
			isPaused = false; // Resume autoplay
			startSliderInterval();
		}, 5000); // Wait 5 seconds after manual navigation
	}

	// Handle Next and Previous Button Clicks
	$('.slick-next, .slick-prev').on('click', function () {
		resetSliderTimer();
	});

	// Toggle play/pause functionality on slider click (excluding navigation buttons)
	$('.slider').on('click', function (e) {
		if ($(e.target).closest('.slick-prev, .slick-next').length === 0) {
			isPaused = !isPaused;
			if (!isPaused) {
				startSliderInterval();
			} else {
				clearInterval(sliderInterval);
			}
		}
	});
});
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
