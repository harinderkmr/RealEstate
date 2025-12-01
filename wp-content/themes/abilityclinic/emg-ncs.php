<?php
/**
 * Template Name: EMG and nerve conduction studies
 */
get_header();
?>
<section class="sec content section-blog-wrapper small-container services-page">
    <div class="container-sm container-xs">
        <div class="row justify-content-center">
                    <?= get_field('page_heading'); ?>
                    <?php echo get_field('page_content') ?>
                    <?php echo get_field('page_content_link_heading'); ?>
                <ul style="padding-left:40px;">
                    <?php if (have_rows('page_content_link_repeater')) :
                        while (have_rows('page_content_link_repeater')) : the_row(); ?>
                    <?php $button = get_sub_field('page_content_link'); ?>
                    <li class="fw-light  pb-0 mb-0"><a href="<?php echo esc_url($button['url']); ?>" class="selected-links"  >
                            <?php echo esc_html($button['title']); ?>
                        </a> </li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
                <div class="image-placement text-center">
                    <img class="w-100" src="<?php echo get_field('page_image'); ?>" alt="Page Image">
                </div>
           
        </div>
    </div>
</section>
<p id="electrodiagnostics" class="p-0">&nbsp;</p>
<section class="pad-scroll mt-0 pt-0 small-container pb-0 emg-ncs-page">
    <div class="container-sm container-xs">
        <div class="text-left">
                <?= get_field('page_questions');?>
        </div>
        <div class="row justify-content-center">
            <?php if (have_rows('page_questions_repeater')) :
                while (have_rows('page_questions_repeater')) : the_row(); ?>
            <p class="fw-light fs-5 mb-2 mt-2">
                <?php echo get_sub_field('page_question_content') ?>
            </p>
            <?php if (have_rows('page_question_info_repeater')) :
                    while (have_rows('page_question_info_repeater')) : the_row(); ?>
            <div class="col-md-4 align-items-center d-flex flex-column mb-3">
                <?php $button = get_sub_field('page_question_link'); ?>
                <a href="<?php echo esc_url($button['url']); ?>" class="fw-bold w-100  text-decoration-none">
                    <div class="card p-3 text-center rounded-0">
                        <h2 class="fw-light fs-5">
                            <?php echo esc_html($button['title']); ?>
                        </h2>
                        <p class="fw-light text-decoration-none">
                            <?php echo get_sub_field('page_question_description'); ?>
                        </p>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="content section-blog-wrapper small-container">
    <div class="container-sm container-xs">
        <div class="row justify-content-center">
                    <p id="common-symptoms" class="p-0 emg-ncs-page-ms">&nbsp;</p>
                        
                        <?= get_field('symptoms_heading'); ?>

                    <?php if (have_rows('symptoms_group_')) : while (have_rows('symptoms_group_')) : the_row(); ?>
                        <table class="table" style="border: 3px solid #00305b; box-shadow: 2px 2px 0px #00305b">
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th class="blue-text fs-5 fw-bold h3">
                                        <?php echo esc_html(get_sub_field('negative_symptoms')); ?>
                                    </th>
                                    <th class="blue-text fs-5 fw-bold h3">
                                        <?php echo esc_html(get_sub_field('positive_symptoms')); ?>
                                    </th>
                                </tr>
                                <?php if (have_rows('symptoms_repeater')) : while (have_rows('symptoms_repeater')) : the_row(); ?>
                                <tr>
                                    <?php $titleField = get_sub_field('symptom_title'); ?>
                                    <th class="blue-text fs-5 fw-bold h3">
                                        <?php echo esc_html($titleField); ?>
                                    </th>
                                    <?php if (have_rows('symptoms_list_repeater')) : while (have_rows('symptoms_list_repeater')) : the_row(); ?>
                                    <td>
                                        <ul class="list-unstyled mb-0">
                                            <?php if (have_rows('symptoms_value_repeaters_')) : while (have_rows('symptoms_value_repeaters_')) : the_row(); ?>
                                                <li class="fw-light nav">
                                                    <?php echo esc_html(get_sub_field('actual_symptoms')); ?>
                                                </li>
                                            <?php endwhile;
                                            endif; ?>
                                        </ul>
                                    </td>
                                    <?php endwhile;
                                    endif; ?>
                                </tr>
                                <?php endwhile;
                                endif; ?>
                            </tbody>
                        </table>
                    <?php endwhile;
                    endif; ?>
                <div class="emg-ncs-page">
                    <p id="advantages_and_disadvantages" class="p-0" >&nbsp;</p>
             
                    <?= get_field('section_heading'); ?>
                    <ul>
                        <?php if (have_rows('section_type_repeater')) :
                            while (have_rows('section_type_repeater')) : the_row(); ?>
                            <?php echo get_sub_field('section_type_heading'); ?>
                        <ul>
                            <?php if (have_rows('section_value_repeater')) :
                                        while (have_rows('section_value_repeater')) : the_row(); ?>
                            <li class="fw-light">
                                <?php echo get_sub_field('section_values'); ?>
                            </li>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                    <?= get_field('information_link_heading'); ?>
                    <ul>
                        <?php if (have_rows('information_link_repeater')) :
                            while (have_rows('information_link_repeater')) : the_row(); ?>
                        <?php $button = get_sub_field('information_link'); ?>
                        <li class="fw-light"><a href="<?php echo esc_url($button['url']); ?>">
                                <?php echo esc_html($button['title']); ?>
                            </a> </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
             </div>
       
    </div>
</section>
<?php get_footer(); ?>