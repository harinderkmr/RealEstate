<?php /* Template Name: Recovery and Wellness */
get_header();
?>

<script>
    console.log("Recovery and Wellness");
</script>
<?php if (have_rows('rehabilitation')) : while (have_rows('rehabilitation')) : the_row(); ?>
        <section class="sec content container-block text-block services-page">
            <div class="container-sm container-xs">
                <h2 class="font-bold mb-3 text-center"> <?php echo get_sub_field('rehabilitation_heading'); ?> </h2>
                <?php echo get_sub_field('rehabilitation_description'); ?>
                <div class="box-block-main mt-5">
                    <div class="row">
                        <?php if (have_rows('organ')) : while (have_rows('organ')) : the_row(); ?>
                                <div class="col-md-4">
                                    <div class="box-block">
                                        <h3><?php echo get_sub_field('organ_name'); ?></h3>
                                        <?php echo get_sub_field('organ_issues'); ?>
                                    </div>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>
                </div>
                <div class="massage-therapy mt-5 text-center" class="img">
                    <img class="img-fluid" src="<?= get_sub_field('you_image'); ?>" alt="massage-therapy"  >
                </div>
            </div>
        </section>
        <section class="sec content bgblue">
            <div class="container-sm container-xs container-block">
                <div class="benefits d-flex justify-content-center">
                    <?= get_sub_field('benefits_of_therapy'); ?>
                </div>
            </div>
        </section>
        <section class="sec content exercises-block">
            <div class="container-sm container-xs">
                <div class="row">
                    <?php if (have_rows('organ_two')) : while (have_rows('organ_two')) : the_row(); ?>
                            <div class="col-md-4">
                                <div class="exercises-box">
                                    <img src="<?= get_sub_field('body_organ_image'); ?>" alt="otto norin">
                                    <div class="hover-block">
                                        <p><?= get_sub_field('body_organ_name'); ?></p>
                                        <?= get_sub_field('body_organ_details'); ?>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile;
                    endif; ?>

                </div>
            </div>
        </section>


<?php endwhile;
endif; ?>

<?php get_footer(); ?>



