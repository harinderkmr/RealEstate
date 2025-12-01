<?php

/**
 * Template Name: articles
 */
get_header();
?>


<?php get_template_part('templates/category-navbar'); ?>


<!-- New Article Grid  -->
<section class=" content" >
    <div class="container container-sm container-xs">
        <div class="row justify-content-center " id="post_article">

        <?php $args = array('post_type' => 'post', 'orderby'  => 'rand', 'category__not_in' => array( get_cat_ID('procedure'), get_cat_ID('articles') , get_cat_ID('uncategorized')  )  , 'posts_per_page' => -1);
            $the_query = new WP_Query($args); ?>

            <?php if($the_query->have_posts()):
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="col-md-10 mb-5 p-0">
                        <div class="d-md-flex flex-md-row-reverse border" >
                    
                            <!-- Image Section (Order 2 on md and above) -->
                            <div class="img d-md-flex justify-content-md-center align-items-md-center w-100 order-md-2" style="height: 300px;">

                                <?php
                                if (has_post_thumbnail()) {
                                    // Display the featured image with a specific size ('large' in this example)
                                    the_post_thumbnail('large', array('class' => 'featured-image img-fluid wrap-image-article w-100 h-100'));
                                } else {
                                    // If no featured image is set, you can display a default image or a placeholder
                                    echo '<img src="	https://static.wixstatic.com/media/2cb535_8eeca241…o/2cb535_8eeca2414ef74aa9ac4015f21725aba4~mv2.jpg" alt="Default Image" class="img-fluid wrap-image-article p-1" />';
                                }
                                ?>

                            </div>
                    
                            <!-- Text Content Section (Order 1 on md and above) -->
                            <div class="p-md-4 order-md-1 p-2  w-100 justify-content-between">
                                <div class="d-flex mb-3">
                                    <img class="img-fluid rounded" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" style="height: 32px; width: 32px;" />
                                    <small  class="fw-light px-2 pt-1 text-decoration-none" ><span><?php  the_author(); ?></span></small> <span class="pt-1"><span aria-label="Editor" data-hook="badge" class="s3LKPq"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" style="fill-rule:evenodd" class=""><path d="M3.0299,4.05263158 C7.59702941,1.31578947 11.4029706,1.31578947 15.9701,4.05263158 C16.0788412,11 16.2419529,14.3157895 9.5,17 C2.75804706,14.3157895 2.92115882,11 3.0299,4.05263158 Z M9.39332888,11.2792808 C9.45851262,11.2381732 9.54151575,11.2381732 9.60669949,11.2792808 L11.6016734,12.5373957 C11.7030093,12.6013024 11.8276546,12.6164227 11.9413311,12.5785984 C12.1509459,12.508852 12.2643317,12.2823849 12.1945852,12.07277 L11.4749606,9.91002155 L13.4066196,8.57961581 C13.5127893,8.50649273 13.5772092,8.38668249 13.5796591,8.25779106 C13.5838574,8.03691706 13.408207,7.85445994 13.1873329,7.85026169 L10.7205982,7.80337534 L9.87345622,5.59604095 C9.83283079,5.4901863 9.74919031,5.40654582 9.64333566,5.36592038 C9.43708931,5.28676612 9.20572641,5.38979461 9.12657215,5.59604095 L8.27943019,7.80337534 L5.81269542,7.85026169 C5.68380399,7.85271159 5.56399375,7.91713145 5.49087067,8.02330121 C5.36556375,8.20523836 5.41147163,8.45430889 5.59340879,8.57961581 L7.52506779,9.91002155 L6.80544312,12.07277 C6.76761883,12.1864466 6.78273912,12.3110919 6.84664582,12.4124278 C6.96448715,12.599287 7.21149576,12.655237 7.39835499,12.5373957 L9.39332888,11.2792808 Z"></path></svg></span></span>
                                </div>
                                <div class="mb-2">
                                    <small class="fw-light text-decoration-none"><span class="text-decoration-none" style="color: #f97224;"><?php echo the_category(', '); ?></span></small>
                                </div>
                                <div class="post-content-article mb-md-0 mb-4">
                                    <h2 class="fs-4 fw-bold"><a href="<?= the_permalink(); ?>"><?php the_title(); ?> </a></h2>
                                    <?php $Content = get_the_content(); 
                                        $content = strip_tags($Content);
                                        $content = wp_trim_words($content , 30 , '...');
                                    ?>

                                    <small class="fw-light text-left"><a class="text-decoration-none" href="<?= the_permalink(); ?>"><?php echo $content ?> </a>  </small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; 
                wp_reset_postdata();  
            endif; ?>
        </div>
    </div>
</section>





<?php get_footer(); ?>