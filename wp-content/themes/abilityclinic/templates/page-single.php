<?php 
$post_id = get_the_ID(); // Get the current post ID.

if ( $post_id === 2010 ) {
    // Load the custom template part for post ID 2010.
    get_template_part( 'templates/physiotherapy' );
} 
else if( $post_id === 2018 ){
    get_template_part( 'templates/massagetheraphy' );
}
else { ?>
    <!-- Default content section -->
    <section class="content section-blog-wrapper small-container">
        <div class="container-sm container-xs mb-4" style="position: relative;">
            <div class="row justify-content-center" style="text-align: justify;">    
                <div>
                    <?php 
                    $appointment = get_field( 'book_appointment' ); // Retrieve ACF field.
                    if ( $appointment ) { ?>
                        <a href="<?php echo esc_url( $appointment['url'] ); ?>" class="btn btn-outline-primary appoint text-uppercase">
                            <img src="https://abilityclinic.ca/wp-content/uploads/2024/01/logo-icon.webp" class="img-fluid">
                            <?php echo esc_html( $appointment['title'] ); ?>
                        </a>
                    <?php } ?>
                    
                    <p class="fw-light">
                        <?php the_content(); // Output the post content. ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

