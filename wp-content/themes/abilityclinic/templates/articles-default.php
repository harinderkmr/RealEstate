<?php
/**
 * Template Name: Article Default
 */
get_header();
?>

<?php get_template_part('templates/category-new-navbar'); ?>

<section class="sec content art-content">
    <div class="container container-sm container-xs mb-4 article-container">
        <div class="row row-cols-1 row-cols-md-2 g-4" id="post_article">
            <!-- Load Post Js -->
            <script>
                load_posts('articles');
            </script>
            
            <!-- End Load POst JS -->
        </div>
        <div class="row mt-3 d-flex justify-content-center align-items-center">
            <button type="button" id="load-more" data-value="articles"  class="border-1 btn-scale">Load More</button>
        </div>
    </div>
</section>

<?php get_footer(); ?>