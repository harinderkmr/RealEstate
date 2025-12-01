<?php /* Template Name: Services */
get_header();
?>
<section class="sec content small-container services-page">
	<?php if (have_rows('services_section')) : while (have_rows('services_section')) : the_row(); ?>
			<div class="container-sm container-xs">
				<h1 class="mb-3 sport-med"><?= get_sub_field('general_heading'); ?></h1>
				<div class="row">
					<div class="col-md">
						<?= get_sub_field('general_description'); ?>
					</div>
					<div class="col-md-auto">
						<?php $ImageLink = get_sub_field('general_image_link_url'); ?>
						<div class="img"><a href="<?php echo esc_url($ImageLink['url']); ?>"><img src="<?= get_sub_field('general_image'); ?>" alt="choose-wisely-logo" /></a></div>
					</div>
					<div class="col-12">
						<h2 class="mb-2">Services</h2>
						<?php if (have_rows('services')) : while (have_rows('services')) : the_row();
								$service_link = get_sub_field('service_link'); ?>
								<h3 class="mt-5 mb-3"><a class="text-decoration-none" href="<?= $service_link['url']; ?>"><?= $service_link['title']; ?></a></h3>
								<?= get_sub_field('each_service_details'); ?>
						<?php endwhile;
						endif; ?>
						<h2 class="mt-3 mb-3"><?= get_sub_field('secvice_do_not_provide'); ?></h2>
						<?= get_sub_field('secvice_do_not_provide_des'); ?>
					</div>
				</div>
			</div>
	<?php endwhile;
	endif; ?>
</section>
<?php get_footer(); ?>