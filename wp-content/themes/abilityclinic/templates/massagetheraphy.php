<?php
// Template Name:MassageTheraphy
get_header();
?>
    <section class="sec content section-blog-wrapper small-container services-page">
        <div class="container-sm container-xs">
                <?php echo the_content(); ?>
            <?php $APPOINTEMENT  = get_field('book_appointment');?>
            <?php if($APPOINTEMENT){ ?>
                <div class="book-now text-center">
                    <a href="https://abilityclinic.janeapp.com/" target="_blank">Book Now</a>
               <!-- <a href="<?php echo $APPOINTEMENT['url']; ?>" class="btn btn-outline-primary appoint text-uppercase" ><img src="https://abilityclinic.ca/wp-content/uploads/2024/01/logo-icon.webp" class="img-fluid" > <?php echo $APPOINTEMENT['title']; ?> </a>  -->
                </div>
            <?php } ?>    
        </div>
    </section>
<?php
get_footer();
?>