<?php

/**
 * Template Name: Home Page Tempalte
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package myRealState
 */

get_header();
?>
<div class="home-page-container">


    <?php
    $bg_img = "";
    $hero_background = get_field('hero_background'); ?>
    <?php if ($hero_background) { ?>
        <?php $bg_img = esc_url($hero_background['url']); ?>
    <?php } ?>
    <section class="hero-section text-white d-flex align-items-center justify-content-center"
        style="background:linear-gradient(rgba(16, 14, 15, 0.35), rgba(16, 14, 15, 0.35)), url('<?php echo $bg_img; ?>'); background-size: cover; background-position: center; height: 90vh;">

        <div class="container text-center">
            <h1 class="hero-title mb-3"><?php the_field('hero_title'); ?></h1>
            <p class="hero-subtitle mb-5"><?php the_field('her_tagline'); ?></p>

            <form class="hero-search-form row g-3 justify-content-center" method="get" action="<?php echo home_url(); ?>/property"> <!-- echo esc_url(home_url('/')); -->
                <!-- Property Type -->
                <div class="col-md-3">
                    <select class="form-control" name="property_type">
                        <?php
                        $property_types = get_terms(array(
                            'taxonomy'   => 'property_type',
                            'hide_empty' => false,
                        ));
                        foreach ($property_types as $property_type) {
                        ?>
                            <option value="<?php echo $property_type->slug; ?>"><?php echo $property_type->name; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <!-- Property Size -->
                <div class="col-md-3">
                    <select class="form-control" name="property_size">
                        <?php
                        $args = array(
                            'post_type' => 'property',
                            'post_status' => 'publish'
                        );
                        // The Query.
                        $the_query = new WP_Query($args);

                        // The Loop.
                        if ($the_query->have_posts()) {
                            echo '<ul>';
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                                $id = get_the_ID();
                        ?>
                                <option value="<?php the_field('property_size', $id); ?>"><?php the_field('property_size', $id); ?></option>
                        <?php }
                        } else {
                        }
                        // Restore original Post Data.
                        wp_reset_postdata();
                        ?>
                    </select>
                </div>

                <!-- Property Location -->
                <div class="col-md-3">
                    <select class="form-control" name="property_location">
                        <?php
                        $locations = get_terms(array(
                            'taxonomy'   => 'location',
                            'hide_empty' => false,
                        ));
                        foreach ($locations as $location) {
                        ?>
                            <option value="<?php echo $location->slug; ?>"><?php echo $location->name; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-green  w-100">Search</button>
                </div>
            </form>
        </div>
    </section>
</div>

<!-- Feature Section-->
 <section class="feature-properties py-5">
    <div class="container text-center">
        <h2 class="section-title mb-3">Our Feature Property</h2>
        <p class="section-subtitle mb-5">
            There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form.
        </p>

        <div class="row">
            <?php
            $featured_properties = get_field( 'our_feature_property_section', 'option' ); // ACF Relationship field
            if ( $featured_properties ) :
                foreach ( $featured_properties as $post ) :
                    setup_postdata( $post );

                    // Custom Fields
                    $bedrooms      = get_field( 'bedrooms' );
                    $bath          = get_field( 'bath' );
                    $property_size = get_field( 'property_size' );
                    $price         = get_field( 'price' );
                    $address       = get_field( 'address' );

                    // Gallery Image
                    $gallery = get_field( 'gallery' ); // Adjust if your field is named differently
                    if ( $gallery && is_array( $gallery ) ) {
                        $image = esc_url( $gallery[0]['url'] );
                    } elseif ( has_post_thumbnail() ) {
                        $image = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                    } else {
                        $image = get_template_directory_uri() . '/assets/images/placeholder.jpg';
                    }

                    // Meta info line
                    $meta = "{$bedrooms} Bed • {$bath} Bath • {$property_size}";
            ?>
                <div class="col-md-6 mb-4">
                    <div class="card property-card h-100">
                        <img src="<?php echo esc_url( $image ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                        <div class="card-body text-start">
                            <p class="property-meta text-muted small mb-2"><?php echo esc_html( $meta ); ?></p>
                            <h5 class="property-title"><?php the_title(); ?></h5>
                            <p class="property-address small text-muted mb-1">
                                <i class="bi bi-geo-alt-fill"></i> <?php echo esc_html( $address ); ?>
                            </p>
                            <h6 class="property-price text-primary fw-bold"><?php echo esc_html( $price ); ?></h6>
                        </div>
                    </div>
                </div>
            <?php
                endforeach;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="mt-4">
            <a href="<?php echo get_post_type_archive_link( 'property' ); ?>" class="btn btn-green">See More Property</a>
        </div>
    </div>
</section>
<?php get_template_part( 'partials/subscribe-form-section' ); ?>
<?php get_template_part( 'partials/section-agents' ); ?>
<?php get_template_part( 'partials/latest-property-news' ); ?>






<?php
get_sidebar();
get_footer();
