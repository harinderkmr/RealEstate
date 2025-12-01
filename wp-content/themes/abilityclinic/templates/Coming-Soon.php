<?php
/**
 * Template Name: Coming Soon
 */
 get_header();
?>
<!-- Page Title -->
<title>
    <?php wp_title(''); ?>
</title>

<section class="content">

<?php the_content(); ?>

</section>


<style>
.content{
    display:flex;
    justify-content:center;
    align-items:center;
    padding: 70px 0px;
    /* font-weight: 1000; */
    min-height:50vh;
}

</style>
<?php get_footer(); ?>