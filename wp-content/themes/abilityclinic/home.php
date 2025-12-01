<?php /* Template Name: Home */
get_header();

$thesearch = isset($_GET['q']) ? sanitize_text_field($_GET['q']) : '';

if (empty($thesearch)) {
    get_template_part('templates/Landing-page');
} else {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        's' => $thesearch,
        'post_type' => array('post', 'page'),
        'posts_per_page' => 10,
        'paged' => $paged
    );
    $searchQuery = new WP_Query($args);
    ?>
    <style>
        .post-div .data-wrapper {
            width: 100%;
        }
        .post-div .img {
            width: 150px;
        }
    </style>

    <section class="sec content pb-2" style="padding-top: 30px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <ul class="list-unstyled">
                                <h5 class='fs-3 fw-text mb-4'>Search Result for : <?php echo $thesearch; ?></h5>
                                <?php
                                if ($searchQuery->have_posts()) {
                                    while ($searchQuery->have_posts()) : $searchQuery->the_post(); ?>
                                 <div class="post-div d-flex mt-3">
                                    <div class="img me-3 d-flex justify-content-center align-items-center" style="flex-shrink: 0;">
                                            <?php
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail('large', array('class' => 'featured-image img-fluid wrap-image-article ' , 'style' => 'width: 100%; height: 100%; object-fit: contain;'));
                                                } else {
                                                    echo '<img src="/wp-content/uploads/2024/01/cropped-logo-icon.webp" alt="Default Image" class="img-fluid wrap-image-article p-1" style="width: 100%; height: 100%; object-fit: contain;" />';
                                                }
                                                ?>

                                        </div>
                                        <div class="data-wrapper flex-grow-1">
                                            <h5 class="fw-text fs-5" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h5>
                                            <li class="fw-light mb-4">
                                                <a class="text-decoration-none"  href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></a>
                                            </li>
                                        </div>
                                    </div>
										
                                    <?php endwhile;
                                    
                                    // Pagination
                                    // echo '<div class="pagination justify-content-center">';
                                    // echo paginate_links(array(
                                    //     'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                                    //     'total'        => $searchQuery->max_num_pages,
                                    //     'current'      => max(1, $paged),
                                    //     'format'       => '?paged=%#%',
                                    //     'show_all'     => false,
                                    //     'type'         => 'plain',
                                    //     'end_size'     => 2,
                                    //     'mid_size'     => 1,
                                    //     'prev_next'    => true,
                                    //     'prev_text'    => __('&laquo; Previous'),
                                    //     'next_text'    => __('Next &raquo;'),
                                    // ));
                                    // echo '</div>';
                                } else {
                                    echo "No Result Found";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
    wp_reset_postdata();
}

get_footer('home');
?>