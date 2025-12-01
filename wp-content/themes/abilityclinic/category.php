<?php

/**
 * The template for displaying all posts on the references of  Category posts and attachments
 *
 *
 */

get_header(); ?>


<?php
    /**
     * Get the current category object 
     * Get Category
     *  */ 
    $current_category = get_queried_object(); 
    $category = $current_category->name;
?>


<!-- Top navBar  -->
<?php get_template_part('templates/category-new-navbar'); ?>


<!-- New Article Grid  -->
<section class="sec content art-content">
    <div class="container container-sm container-xs mb-4 article-container">
        <div class="row row-cols-1 row-cols-md-2 g-4" id="post_article">
            <script>
                load_posts('<?php echo $current_category->slug; ?>');
            </script>




    
            <!-- <?php $args = array('post_type' => 'post', 'category_name' => $category , 'posts_per_page' => -1);
            $the_query = new WP_Query($args); ?>

            <?php if($the_query->have_posts()):
                while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <div class="col-md-6">
                <div class="border ">

                    <div class="img d-md-flex justify-content-md-center align-items-md-center w-100 order-md-2"
                        style="height: 196px;">

                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('large', array('class' => 'featured-image img-fluid wrap-image-article w-100 h-100' , 'style' => 'object-fit: cover;'));
                                        } else {
                                            echo '<img src="https://static.wixstatic.com/media/2cb535_8eeca241…o/2cb535_8eeca2414ef74aa9ac4015f21725aba4~mv2.jpg" alt="Default Image" class="img-fluid wrap-image-article p-1" style="object-fit: cover;" />';
                                        }
                                        ?>

                    </div>

                    <div class="p-md-4 order-md-1 p-2 w-100 justify-content-between ">

                        <div class="post-content-article mb-md-0 mb-4 overflow-y-hidden">
                            <h2 class="fs-4 fw-bold"><a href="<?= the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a></h2>
                            <?php 
                                            $Content = get_the_content(); 
                                            $content = strip_tags($Content);
                                            $content = wp_trim_words($content , 15 , '...');
                                        ?>
                            <small class="fw-light d-flex align-items-center mb-3">
                                <?php echo $content; ?>
                            </small>
                            <small class="fw-bold d-flex align-items-center"><a class="text-decoration-none"
                                    style="color: #f97224;" href="<?= the_permalink(); ?>">
                                    Read More &nbsp;&nbsp;<i class="fa-solid fa-arrow-right-long"></i>
                                </a> </small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; 
                wp_reset_postdata();  
            endif; ?> -->





        </div>
        <div class="row mt-3 d-flex justify-content-center align-items-center">
            <button type="button" id="load-more" data-value="<?php echo $current_category->slug; ?>"  class="border-1 btn-scale">Load More</button>
        </div>
    </div>
</section>

<?php get_footer(); ?>