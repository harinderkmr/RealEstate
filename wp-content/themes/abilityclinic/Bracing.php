
<?php

// Template Name:Bracing

get_header();
?>

<section class="sec content section-blog-wrapper small-container services-page" >   
            <div class="container-sm container-xs">  
                 <div class="row justify-content-center">
                       <?= get_field('heading'); ?>
                            <?= get_field('description'); ?>
                            <?= get_field('examples'); ?>
                        <div class="tabledata " style="overflow-x: scroll;">
                            <?php if (have_rows('stock')) :  ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Images</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Conditions</th>
                                    <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while (have_rows('stock')) : the_row();?>
                                    <tr>
                                    <td class="d-flex justify-content-center align-items-center"> 
                                        <?php if (have_rows('img_repeater')) :  ?>
                                        <?php while (have_rows('img_repeater')) : the_row();?>
                                        <?php $stock_image = get_sub_field('stock_image');?>
                                        <?php echo '<img src="' . esc_url($stock_image['url']) . '" alt="' . esc_attr($stock_image['alt']) . '" style="height: 100px;" />';?>
                                        <?php endwhile;?>
                                        <?php endif;?>
                                    </td>
                                    <td><?php echo get_sub_field('description'); ?></td>
                                    <td><?php echo get_sub_field('conditions'); ?></td>
                                    <td><?php echo get_sub_field('price'); ?></td>
                                    </tr>
                                <?php endwhile;?>
                                </tbody>
                                </table>
                            <?php endif;?>  
                        </div>
                        <div class=" py-4 ">
                            <p><?= get_field('last_description'); ?></p>
                        </div> 
                        <?php if (have_rows('custom_knee_brace')) : while (have_rows('custom_knee_brace')) : the_row(); ?>
                            <div class="row ">
                                <?php echo '<img src="' . esc_url(get_sub_field('custom_knee_brace_image')) . '" alt="Knee Brace Image" style="margin-bottom: 15px; width: 350px; height: 350px;" />';?> 
                                <video class="w-100 mob-vid-img-height video-cover" src="<?php echo esc_url(get_sub_field('custom_knee_brace_vedio')); ?>" muted autoplay controls loop poster="<?php echo esc_url(get_sub_field('vedioimage')); ?>" style="margin-bottom: 15px; width: 350px; height: 350px;"></video>
                            </div>
                        <?php endwhile;
                        endif; ?>
                        <div class="lastimages">
                            <?php echo '<img src="' . esc_url(get_field('coleenimage')) . '" alt="coleenimage" style="margin-right: 20px; margin-bottom: 15px; width: 355px; height: 350px;" />'; ?>
                            <?php echo '<img src="' . esc_url(get_field('lastimage')) . '"alt="coleenimage-2" style="margin-bottom: 15px;" width="355" height="350" />'; ?>
                        </div>
                    
                </div>
            </div>
               
    
</section>

<?php
get_footer();
?>