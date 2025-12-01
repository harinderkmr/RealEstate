<?php 
/**
 * Template Name: Keeping Fit
 */

 get_header();
 ?>




<section class="content section-blog-wrapper small-container services-page">
  <div class="container-sm container-xs">
        <div class="row justify-content-center">
        <h1 class="sport-med "><?php echo get_field('page_heading'); ?></h1>
				<div class="row">
					<div class="col-md">
						<ul>
						<?php if (have_rows('section_link_repeater')) :
							while (have_rows('section_link_repeater')) : the_row(); ?>
								<?php $link = get_sub_field('section_link'); ?>
								<li class="fs-4 fw-light"><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
							<?php endwhile;
						endif; ?>

						</ul>
						<h3 class="mt-5 mb-3"><?php echo get_field('page_content_heading'); ?></h3>
						<p> <?php echo get_field('page__content'); ?> </p>
					</div>
				</div>
			
		</div>
	</div>
</section>
<section >
	<div class="container-xxl">
		<div class="slider-keep mt-3">
			<div class="owl-carousel slider">
				<?php if( have_rows('exercise_image_repeater') ):
					while( have_rows('exercise_image_repeater') ): the_row(); ?>
						<div class="item">
							<div class="img"><img src=" <?php echo get_sub_field('exercise_image')['url']; ?> " alt="<?php echo get_sub_field('exercise_image')['url']; ?>" /></div>
						</div>
					<?php endwhile; 
				endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="pad-scroll  pb-0">
<?php $section_id = 1;
	if (have_rows('page_content_repeater')) :
		while (have_rows('page_content_repeater')) : the_row(); ?>
			<div class="bgblue py-4 text-center mb-3" id="e<?php echo $section_id; ?>">
				<h2 class="fs-2 lh-1 mb-0 text-white"> <?php echo get_sub_field('page_content_title'); ?> </h2>
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10 col-xl-8">
						<p> <?php echo get_sub_field('page_content'); ?> </p>
					</div>
				</div>
			</div>
			<?php
			$section_id++;
		endwhile;
	endif;
	?>
</section>

<section class="pad-scroll content small-container pb-o">
	<div class="container-sm container-xs  align-items-start">
		<div class="row justify-content-center text-center">
			<?php if( have_rows( 'fit_user_images_repeater' ) ):
				while( have_rows( 'fit_user_images_repeater' ) ): the_row(); ?>
					<div class="col-md-4 mb-2" >
						<div class="wrapper" style="box-shadow: rgba(0, 0, 0, 0.33) 0px 1px 3px 0px;">
							<img src="<?php echo get_sub_field('user_image'); ?>" class="img-fluid" alt="Mach">
							<p class="py-3" ><?php echo get_sub_field('user_name_'); ?></p>
						</div>
					</div>
				<?php endwhile; 
			endif; ?>
		</div>
	</div>
</section>

		


<?php get_footer();
?>















