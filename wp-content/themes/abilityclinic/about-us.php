<?php /* Template Name: About Us */
get_header();
?>

<section class="hero py-md-5">
	<div class="container-xxl">
		<video class="w-100 video-about" src="<?= get_field('about_video'); ?>" muted autoplay loop controls></video>
	</div>
</section>

<?php $i = 1;
if (have_rows('about_details')) : while (have_rows('about_details')) : the_row(); ?>
<?php if( $i == 2 ){ ?>
	<p id="our_commitments" >&nbsp;</p>
<?php } ?>
		<section class="content pb-4">
			<div class="container-xxl container">
				<div class="row <?php echo $i % 2 == 0 ? "flex-md-row-reverse" : ""; ?>">
					<?= get_sub_field('details_section'); ?>
					<div class="col-md">
						<?php $details_doctor_image =  get_sub_field('details_doctor_image'); ?>
						<div class="img"><img class="img-fluid" src="<?php echo $details_doctor_image['url'] ?>" title="<?= $details_doctor_image['name']; ?>" alt="<?= $details_doctor_image['alt']; ?>" /></div>
					</div>
				</div>
			</div>
		</section>
<?php $i++;
	endwhile;
endif; ?>
<p id="team_doctors">&nbsp;</p>
<section class="sec staff pt-0 pb-0">
	<?php if (have_rows('meet_doctor_section')) : while (have_rows('meet_doctor_section')) : the_row(); ?>
			<div class="container-xxl">
				<div class="heading mb-5 line-through white d-flex justify-content-center ">
					<?= get_sub_field('section_title'); ?>
				</div>
				<p class="fst-italic fs-6 text-center fw-light"><?= get_sub_field('section_note'); ?></p>
				<div class="justify-content-center row">
					<div class="col-xl-9 mb-4">
						<div class="gx-xl-3 row">
							<?php if (have_rows('doctors_detail')) : while (have_rows('doctors_detail')) : the_row(); ?>
									<div class="col-md-4 mb-4">
										<div class="box text-center">
											<?php $doctor_image = get_sub_field('doctor_image'); ?>
											<div class="img"><img src="<?php echo $doctor_image['url']; ?>" alt="<?php echo $doctor_image['alt']; ?>"title="<?php echo $doctor_image['name']; ?>" height="313px" weight="313px" class="img-fluid" /></div>
											<div class="text p-3">
												<h2 class="text-uppercase fw-bold fs-5 mb-1"><?= get_sub_field('doctor_name'); ?></h2>
												<p class="mb-0 fs-6"><?= get_sub_field('doctor_speciality'); ?></p>
												<p class="mb-0 fs-6"><?= get_sub_field('doctor_availability'); ?></p>
											</div>
										</div>
									</div>
							<?php endwhile;
							endif; ?>
						</div>
					</div>
				</div>
			</div>
	<?php endwhile;
	endif; ?>
</section>
<p id="our_therapists">&nbsp;</p>
<section class="sec staff pb-0 pt-0">
	<?php if (have_rows('allied_health_practitioners')) : while (have_rows('allied_health_practitioners')) : the_row(); ?>
			<div class="container-xxl">
				<div class="heading mb-5 line-through white d-flex justify-content-center ">
					<?= get_sub_field('section_title'); ?>
				</div>
				<p class="fst-italic fs-6 text-center fw-light"><?= get_sub_field('section_note'); ?></p>
				<div class="justify-content-center row">
					<div class="col-xl-9 mb-4">
						<div class="gx-xl-3 row">
							<?php if (have_rows('doctors_detail')) : while (have_rows('doctors_detail')) : the_row(); ?>
									<div class="col-md-4 mb-4">
										<div class="box text-center">
											<div class="img"><img src="<?= get_sub_field('doctor_image')['url']; ?>" alt="<?= get_sub_field('doctor_image')['alt']; ?>" title="<?= get_sub_field('doctor_image')['name']; ?>" class="img-fluid" style="height: 313px !important; width: 313px !important;"  /></div>
											<div class="text p-3">
												<h2 class="text-uppercase fw-bold fs-5 mb-1"><?= get_sub_field('doctor_name'); ?></h2>
												<p class="mb-0 fs-6"><?= get_sub_field('doctor_speciality'); ?></p>
												<p class="mb-0 fs-6"><?= get_sub_field('doctor_availability'); ?></p>
											</div>
										</div>
									</div>
							<?php endwhile;
							endif; ?>
						</div>
					</div>
				</div>
			</div>
	<?php endwhile;
	endif; ?>
</section>

<p class="mb-0 mt-0 pb-0 pt-0" id="team_staff">&nbsp;</p>
<section class="sec staff pt-0">
	<?php if (have_rows('meet_staff_section')) : while (have_rows('meet_staff_section')) : the_row(); ?>
			<div class="container-xxl">
				<div class="heading mb-5 line-through white d-flex justify-content-center">
					<?= get_sub_field('section_title'); ?>
				</div>
				<p class="fst-italic fs-6 text-center fw-light"><?= get_sub_field('section_note'); ?></p>
				<div class="justify-content-center row">
					<div class="col-xl-9 mb-4">
						<div class="gx-xl-3 row">
							<?php if (have_rows('staff_detail')) : while (have_rows('staff_detail')) : the_row(); ?>
									<div class="col-md-4 mb-4">
										<div class="box text-center">
											<div class="img"><img src="<?= get_sub_field('staff_image')['url']; ?>" alt="<?= get_sub_field('staff_image')['alt']; ?>" title="<?= get_sub_field('staff_image')['name']; ?>" class="img-fluid" style="height: 313px !important; width: 313px !important;"  /></div>
											<div class="text p-3">
												<h2 class="text-uppercase fw-bold fs-5 mb-1"><?= get_sub_field('staff_name'); ?></h2>
												<p class="mb-0 fs-6"><?= get_sub_field('staff_speciality'); ?></p>
												<p class="mb-0 fs-6"><?= get_sub_field('staff_availability'); ?></p>
											</div>
										</div>
									</div>
							<?php endwhile;
							endif; ?>
						</div>
					</div>
				</div>
			</div>
	<?php endwhile;
	endif; ?>
</section>

<?php get_footer('all'); ?>