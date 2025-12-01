
<?php get_template_part('templates/category-navbar'); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class=" content small-container pb-0">
            <div class="container container-sm container-xs">

                <div class="row justify-content-center">
                    
                    <?php
                        while (have_posts()) : the_post(); ?>
                            <?php $post_id = get_the_ID(); ?>
                            <?php 
                                global $categories; 
                                global $article_link;
                                $article_link = get_permalink();
                                $categories = get_the_category(); 
                            ?>

                            <div class="col-md-12 mb-5">
                                <div class="border ">
                                    <div class="main-article-view p-md-3 p-2">
                                        
                                        <div class="p-md-4 order-md-1">
                                            <div class="d-flex mb-3">
                                                <?php
                                        $author_id = get_the_author_meta('ID');
                                        $author_avatar_url = get_avatar_url($author_id); 
                                        esc_url($author_avatar_url); 
                                    ?>
                                                <div class="img rounded-5 border">
                                                    <img class="img-fluid rounded-5 border"
                                                        src="https://abilityclinic.ca/wp-content/uploads/2024/01/logo-icon.webp" alt="" 
                                                        style="height: 32px; width: 32px" />
                                                </div>
                                                <p class="px-4">
                                                    <small class="fw-light">
                                                        <?php echo get_the_author(); ?>
                                                    </small>
                                                    <span><span aria-label="Editor" data-hook="badge" class="s3LKPq"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                                viewBox="0 0 19 19" style="fill-rule: evenodd" class="">
                                                                <path
                                                                    d="M3.0299,4.05263158 C7.59702941,1.31578947 11.4029706,1.31578947 15.9701,4.05263158 C16.0788412,11 16.2419529,14.3157895 9.5,17 C2.75804706,14.3157895 2.92115882,11 3.0299,4.05263158 Z M9.39332888,11.2792808 C9.45851262,11.2381732 9.54151575,11.2381732 9.60669949,11.2792808 L11.6016734,12.5373957 C11.7030093,12.6013024 11.8276546,12.6164227 11.9413311,12.5785984 C12.1509459,12.508852 12.2643317,12.2823849 12.1945852,12.07277 L11.4749606,9.91002155 L13.4066196,8.57961581 C13.5127893,8.50649273 13.5772092,8.38668249 13.5796591,8.25779106 C13.5838574,8.03691706 13.408207,7.85445994 13.1873329,7.85026169 L10.7205982,7.80337534 L9.87345622,5.59604095 C9.83283079,5.4901863 9.74919031,5.40654582 9.64333566,5.36592038 C9.43708931,5.28676612 9.20572641,5.38979461 9.12657215,5.59604095 L8.27943019,7.80337534 L5.81269542,7.85026169 C5.68380399,7.85271159 5.56399375,7.91713145 5.49087067,8.02330121 C5.36556375,8.20523836 5.41147163,8.45430889 5.59340879,8.57961581 L7.52506779,9.91002155 L6.80544312,12.07277 C6.76761883,12.1864466 6.78273912,12.3110919 6.84664582,12.4124278 C6.96448715,12.599287 7.21149576,12.655237 7.39835499,12.5373957 L9.39332888,11.2792808 Z">
                                                                </path>
                                                            </svg></span></span>&nbsp;&nbsp;
                                                    <small><span class="fw-light">
                                                            <?php  get_the_date('M j'); ?>
                                                        </span></small>
                                                </p>
                                            </div>

                                            <div class="wrap-article clearfix mb-1" id="art-content-doc">
                                                <p class="fw-light" >
                                                    <?php $content =  the_content(); ?>
                                                </p>
                                            </div>
                                            

                                            <hr />
                                            <div class="article-link  d-flex justify-content-between">
                                                <div class="social-icons ">
                                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink());?>&amp;og_image=<?php echo urlencode('https://abilityclinic.ca/wp-content/uploads/2024/01/cropped-logo.webp') ?>"
                                                    
                                                        class="bg-transparent border-0 mx-1  text-decoration-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19"
                                                            role="img" class="cXULmD blog-icon-fill">
                                                            <path
                                                                d="M8.08865986,17 L8.08865986,10.2073504 L5.7890625,10.2073504 L5.7890625,7.42194226 L8.08865986,7.42194226 L8.08865986,5.08269399 C8.08865986,3.38142605 9.46779813,2.00228778 11.1690661,2.00228778 L13.5731201,2.00228778 L13.5731201,4.50700008 L11.8528988,4.50700008 C11.3123209,4.50700008 10.874068,4.94525303 10.874068,5.48583089 L10.874068,7.42198102 L13.5299033,7.42198102 L13.1628515,10.2073892 L10.874068,10.2073892 L10.874068,17 L8.08865986,17 Z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>"
                                                        class="bg-transparent border-0 mx-1 text-decoration-none"
                                                        target="_blank" rel="noopener noreferrer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19"
                                                            role="img" class="cXULmD blog-icon-fill">
                                                            <path
                                                                d="M18,4.65548179 C17.3664558,4.9413444 16.6940105,5.12876845 16.0053333,5.21143556 C16.7308774,4.76869949 17.2742158,4.07523994 17.5353333,3.25870539 C16.8519351,3.66952531 16.1046338,3.95967186 15.3253333,4.116758 C14.3449436,3.05903229 12.8270486,2.71461351 11.4952673,3.24769481 C10.1634861,3.78077611 9.28740204,5.08344943 9.28466667,6.53469742 C9.28603297,6.80525838 9.31643401,7.07486596 9.37533333,7.33876278 C6.57168283,7.1960128 3.95976248,5.85317869 2.19,3.64465676 C1.87608497,4.18262214 1.71160854,4.79663908 1.714,5.42164122 C1.61438697,6.56033644 2.09783469,7.6712643 2.99466667,8.36452045 C2.36720064,8.27274888 1.74900117,8.12475716 1.14733333,7.9222845 L1.14733333,7.96708243 C1.26738074,9.69877048 2.5327167,11.1265052 4.21866667,11.4326042 C3.96602896,11.5152522 3.7021383,11.5571156 3.43666667,11.55666 C3.23854288,11.557327 3.0409356,11.5361435 2.84733333,11.4934834 C3.31534048,12.9376046 4.63446966,13.9228162 6.134,13.9481801 C4.90488101,14.9328579 3.38271245,15.4661427 1.816,15.4609716 C1.5432586,15.4614617 1.27074516,15.4449665 1,15.411579 C4.05446938,17.394368 7.93290025,17.5303291 11.1152384,15.7661758 C14.2975765,14.0020226 16.2768505,10.6187983 16.2773333,6.94247342 C16.2773333,6.789701 16.266,6.63692858 16.266,6.4830075 C16.9469737,5.98359293 17.5342367,5.3646551 18,4.65548179 L18,4.65548179 Z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>"
                                                        class="bg-transparent border-0 mx-1 text-decoration-none"
                                                        target="_blank" rel="noopener noreferrer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19"
                                                            role="img" class="cXULmD blog-icon-fill">
                                                            <path
                                                                d="M17,17 L13.89343,17 L13.89343,12.1275733 C13.89343,10.9651251 13.87218,9.47069458 12.2781416,9.47069458 C10.660379,9.47069458 10.4126568,10.7365137 10.4126568,12.0434478 L10.4126568,17 L7.30623235,17 L7.30623235,6.98060885 L10.2883591,6.98060885 L10.2883591,8.3495072 L10.3296946,8.3495072 C10.7445056,7.56190587 11.7585364,6.7312941 13.2709225,6.7312941 C16.418828,6.7312941 17,8.80643844 17,11.5041407 L17,17 Z M3.80289931,5.61098151 C2.80647978,5.61098151 2,4.80165627 2,3.80498046 C2,2.80903365 2.80647978,2 3.80289931,2 C4.79669898,2 5.60434314,2.80903365 5.60434314,3.80498046 C5.60434314,4.80165627 4.79669898,5.61098151 3.80289931,5.61098151 Z M2.24786773,17 L2.24786773,6.98060885 L5.35662096,6.98060885 L5.35662096,17 L2.24786773,17 Z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <button class="bg-transparent border-0  text-decoration-none" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                            viewBox="0 0 19 19" role="img"
                                                            class="cXULmD blog-icon-fill blog-button-hover-fill">
                                                            <path
                                                                d="M10.6000004,11.7622375 L14.2108923,11.7622375 C15.4561791,11.7622375 16.4656836,10.7527331 16.4656836,9.50744629 L16.4656836,9.50744629 L16.4656836,9.50744629 C16.4656836,8.26215946 15.4561791,7.25265503 14.2108923,7.25265503 L10.6000004,7.25265503 L10.6000004,5.84470702 L10.6000004,5.84470702 C10.6000004,5.73425007 10.6895434,5.64470702 10.8000004,5.64470702 L14.3209766,5.64470702 C16.4501961,5.64470702 18.1762695,7.37078048 18.1762695,9.5 C18.1762695,11.6292195 16.4501961,13.355293 14.3209766,13.355293 L10.8000004,13.355293 L10.8000004,13.355293 C10.6895434,13.355293 10.6000004,13.2657499 10.6000004,13.155293 L10.6000004,11.7622375 Z M8.39999962,7.25265503 L4.82047474,7.25265503 C3.57518792,7.25265503 2.56568348,8.26215946 2.56568348,9.50744629 L2.56568348,9.50744629 L2.56568348,9.50744629 C2.56568348,10.7527331 3.57518792,11.7622375 4.82047474,11.7622375 L8.39999962,11.7622375 L8.39999962,13.1578418 C8.39999962,13.2682987 8.31045657,13.3578418 8.19999962,13.3578418 L4.60784179,13.3578418 C2.4772146,13.3578418 0.75,11.6306272 0.75,9.5 C0.75,7.36937281 2.4772146,5.64215821 4.60784179,5.64215821 L8.19999962,5.64215821 L8.19999962,5.64215821 C8.31045657,5.64215821 8.39999962,5.73170126 8.39999962,5.84215821 L8.39999962,7.25265503 Z M6.66568358,8.69999981 L12.2656836,8.69999981 C12.3761405,8.69999981 12.4656836,8.78954286 12.4656836,8.89999981 L12.4656836,10.1499998 C12.4656836,10.2604567 12.3761405,10.3499998 12.2656836,10.3499998 L6.66568358,10.3499998 C6.55522663,10.3499998 6.46568358,10.2604567 6.46568358,10.1499998 L6.46568358,8.89999981 C6.46568358,8.78954286 6.55522663,8.69999981 6.66568358,8.69999981 Z"
                                                                transform="rotate(-45 9.463 9.5)"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="mb-2" id="get_category_article">
                                                    <?php
                                                    if ($categories) {
                                                        $category_links = array();

                                                        foreach ($categories as $category) {
                                                            $category_links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="fw-light text-decoration-none" style="color: #F97224;">' . esc_html($category->name) . '</a>';
                                                        }
                                                        echo implode(' &nbsp; ', $category_links);

                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    ?>
                </div>
            </div>
        </section>

        <section class="content small-container">
            <div class="container-sm container-xs">
                <div class="row justify-content-center">
                    <div class="col-md-12 d-flex justify-content-between mb-4">
                        <!-- <div class="col-md-10 "> -->
                            <p class="fw-light"><a href="#">Recent Posts</a></p>
                            <p class="fw-light"><a href="https://abilityclinic.ca/articles/">See all</a></p>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div class="container container-sm container-xs d-flex overflow-x-auto mb-5 hide-scrollbar">
                <div class="row  justify-content-center align-items-center gx-3">
                    <div class="col-md-12 justify-content-center align-items-center">
                        <div class="d-flex overflow-x-auto justify-content-center align-items-center hide-scrollbar">
                            <!-- Your content goes here -->
                            <?php  
                                $args = array(
                                    'post_type' => 'post' ,
                                    'posts_per_page' => -1 ,
                                    'orderby' => 'rand',
                                    'category_name' => $categories[0]->name 
                                );
                                $the_query = new WP_Query($args);
                            ?>
                            <?php if($the_query->have_posts()):
                            while($the_query->have_posts()): $the_query->the_post(); ?>
                            <div class="more-post border mx-2 d-block" style="width: 17rem;">
                                <?php
                                    if (has_post_thumbnail()) {
                                        // Display the featured image with a specific size ('large' in this example)
                                        the_post_thumbnail('large', array('class' => 'featured-image img-fluid wrap-image-article '));
                                    } else {
                                        // If no featured image is set, you can display a default image or a placeholder
                                        echo '<img src="https://abilityclinic.ca/wp-content/uploads/2024/02/abilityclinic.jpg" alt="Default Image" class="img-fluid wrap-image-article p-1" />';
                                    }
                                ?>
                                <div class="card-body text-center px-2">
                                <p class="card-title"><a href="<?php echo get_permalink(get_the_ID()); ?>" class="fw-light fs-5"><?php echo get_the_title(); ?></a></p>
                                </div>
                            </div>
                            <?php endwhile; 
                            endif; ?>
                            <!-- Add more cards as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <?php
        $previous = get_previous_post();
        $next = get_next_post();
        ?>
        <div class="post-navigation">
            <?php if ($previous) : ?>
            <span class="blog_post_control_item blog_post_readmore prev" style="margin:0 14px 10px 0;"><a
                    href="<?php echo get_the_permalink($previous); ?>">« Previous</a></span>
            <?php endif;
            if ($next) : ?>
            <span class="blog_post_control_item blog_post_readmore next" style="margin:0 14px 10px 0;"><a
                    href="<?php echo get_the_permalink($next); ?>"> Next »</a></span>
            <?php endif; ?>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->



<!-- Image Art Modal -->
<div id="artImgModal" class="Img-modal">
<span class="close over-close">&times;</span>
<img class="Img-modal-content" id="img01">
<div id="caption"></div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title fs-5" class="" id="exampleModalLabel">Share link</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-5">
            <p class="fw-light" id="article-data-link"> <small>
                    <?php echo $article_link; ?>
                </small></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn bg-transparent fw-light rounded-1" style="color: #F97224;"
                data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="cta rounded-0 border-0 fw-light" onclick="CopyArticleLink()">Copy
                Link</button>
        </div>
    </div>
</div>
</div>
<script>
    console.log("Post Template");
</script>