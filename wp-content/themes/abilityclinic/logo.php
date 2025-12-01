<?php 
    /**
     * Template Name: Our Logo
     */
   get_header();
?>
<section class="sec content small-container services-page">
    <div class="container-sm container-xs">
                 <?= get_field('page_heading'); ?> 
                <?php echo get_field('content');  ?>
                <div class="logo-media-image mb-3 text-center">
                    <img src="<?php echo get_field('logo_image');?>" alt="Logo Media Image" class="img-fluid">
                </div>
                <div class="container">
                    <div class="row ">
                        <div class="col-9 text-xs container-xxl">
                            <?php echo get_field('logo_history_content');  ?> 
                            <?php echo get_field('logo_history_note');  ?> 
                             <?php echo get_field('logo_history_description') ?> 
                            <?php echo get_field('logo_history_author') ?>
                        </div>
                        <div class="col-3 container-xs">
                            <div class="row">
                                <img src="<?php echo get_field('logo_image_1');?>" alt="Logo Media Image"  class="img-fluid">
                            </div>
                            <div class="row" style="max-height: 230px;">
                                <img src="<?php echo get_field('logo_image_2');?>" alt="Logo Media Image"  class="img-fluid" style="max-height: 230px; object-fit:contain;">                               
                            </div>
                            <div class="text-tylo w-100 text-right fw-light">
                                    Taylor Hammer from circa 1904²
                               </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<?php get_footer();  ?>