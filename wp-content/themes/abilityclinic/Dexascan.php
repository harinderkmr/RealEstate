
<?php
/**
 * Template Name: Dexascan
 */
 get_header(); 
?>
<section class="sec content section-blog-wrapper small-container services-page">
    <div class="container-sm container-xs">
        <div class="row justify-content-center">
            <?= get_field('heading'); ?> 
                    <?php if (have_rows('content')) : while (have_rows('content')) : the_row(); ?>
                        <?= get_field('sub_heading'); ?>
                        <?= get_field('_description_'); ?>        
                        <?php echo get_sub_field('content_description'); ?>   
                    <?php endwhile;
                    endif; ?>
                <?php
                    $img = get_field('dexaimage1');
                    if ( $img ) : ?>
                        <div class="image-placement text-center">
                            <img class="w-100 img-fluid " src="<?php echo $img; ?>" alt="Page Image">
                        </div>
                    <?php endif; ?> 
                    <?= get_field('description'); ?> 
                    <?php
                    $img = get_field('dexaimage2');
                    if ( $img ) : ?>
                        <div class="image-placement text-center mb-5">
                            <img class=" img-fluid" style="height: 400px ;"  src="<?php echo $img; ?>" alt="Page Image">
                        </div>
                    <?php endif; ?> 
                    <?= get_field('Vedio'); ?> 
                    <?php
                    $img = get_field('dexaimage3');
                    if ( $img ) : ?>
                        <div class="image-placement text-center mb-2 mt-5">
                            <img class="img-fluid" style="height: 500px;" src="<?php echo $img; ?>" alt="Page Image">
                        </div>
                    <?php endif; ?> 
                    <?= get_field('disclaimer_text'); ?> 
        </div>
    </div>
</section>

<?php get_footer( ); ?>
