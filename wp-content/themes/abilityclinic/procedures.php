<?php

/**
 * Template Name: Procedures
 */

get_header();
?>

<section class="content section-blog-wrapper small-container services-page">
  <div class="container-sm container-xs">
        <div class="row justify-content-center">
        <h1 class="sport-med  "> <?= get_field('page_heading'); ?> </h1>

                <?php echo get_field('procedure_content'); ?>
                <!-- <ul class="list-unstyled">
                    <li class="fw-light"> This is a shared decision between you and your physician. Medical treatment for any issue falls on a continuum, from conservative (e.g. exercise) to invasive (e.g. surgery). Ultrasound-guided interventional procedures fall somewhere in the middle.</li>
                    <li class="fw-light"> It is the job of the physician to ensure that you have explored all conservative options first, before deciding on an interventional procedure.</li>
                    <li class="fw-light"> The level of evidence behind any procedure varies depending on the reason for it and the intended body structure. Again, it is the job of the physician to ensure that you understand each of your options, before deciding on an interventional procedure.
                    </li>
                </ul> -->
                <h2 class="font-bold fs-4 mt-4 mb-1">
                    Procedures Available
                </h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'category_name' => 'procedure',
                                'posts_per_page' => -1,
                                'order'          => 'ASC'
                            );
                            $the_query = new WP_Query($args); ?>
                            <ul>
                                <?php if ($the_query->have_posts()) : ?>
                                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                        <li class="fw-light"> <a href="<?= the_permalink(); ?>"><?php the_title(); ?> </a> </li>
                                    <?php endwhile;
                                    wp_reset_postdata();  ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                    </div>
                </div>

                <small><p class="fw-light"> The below is a general guide.</p></small>

                <h2 class="font-bold  mt-4 mb-1">
                   <?php echo get_field('procedure_content_title'); ?>
                </h2>
                

                <?php $Offcanvas_Toogle_Number = 1; if(have_rows('procedure_content_repeater')):
                    while(have_rows('procedure_content_repeater')): the_row(); ?>
                        <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                           <?php echo get_sub_field('procedure_content_heading'); ?>
                        </h2>
                        <ul>
                            <?php $Offcanvas_Toogle_Id = 1; if(have_rows('procedure_links_repeater')):
                                while(have_rows('procedure_links_repeater')): the_row(); ?>
                                    <?php
                                    $Link = get_sub_field('procedure_link');

                                    if ("offcanvasTop{$Offcanvas_Toogle_Id}{$Offcanvas_Toogle_Number}" === "offcanvasTop111" || "offcanvasTop{$Offcanvas_Toogle_Id}{$Offcanvas_Toogle_Number}" === "offcanvasTop211") {
                                        echo '<li class="fw-light ">' . esc_html($Link['title']) . '</li>';
                                    } else {
                                        echo '<li class="fw-light"> <a href="' . esc_url($Link['url']) . '" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop' . $Offcanvas_Toogle_Id . $Offcanvas_Toogle_Number . '" aria-controls="offcanvasTop' . $Offcanvas_Toogle_Id . $Offcanvas_Toogle_Number . '" >' . esc_html($Link['title']) . '</a></li>';
                                    }
                                    ?>

                                        <div class="offcanvas offcanvas-top bgblue text-center" style="height:auto!important; max-height: 50vh;!important;"  tabindex="-1" id="offcanvasTop<?php echo  $Offcanvas_Toogle_Id; ?><?php echo $Offcanvas_Toogle_Number; ?>" aria-labelledby="offcanvasTopLabel<?php echo  $Offcanvas_Toogle_Id; ?><?php echo $Offcanvas_Toogle_Number; ?>">
                                            <div class="offcanvas-header">
                                                <h5 id="offcanvasTopLabel<?php echo  $Offcanvas_Toogle_Id; ?><?php echo $Offcanvas_Toogle_Number; ?>"></h5>
                                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" ><i class="fa-solid fa-xmark" style="color: #ffffff;"></i></button>
                                            </div>
                                            <div class="offcanvas-body mb-5">
                                                <h2 class="fs-4 text-white" ><?php echo get_sub_field('procedure_sub_link_title_'); ?></h2>
                                                <ul class="list-unstyled articles-links-list">
                                                    <?php if(have_rows('procedure_sub_links_repeater')):
                                                        while(have_rows('procedure_sub_links_repeater')): the_row(); ?>
                                                        
                                                            <?php $SubLink = get_sub_field('procedure_sub_links'); ?>
                                                            <li class="fw-light text-white"> <a class="text-white" href="<?php echo esc_url($SubLink['url']); ?>"  ><?php echo esc_html($SubLink['title']); ?></a></li>
                                                    
                                                        <?php endwhile; 
                                                    endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php  $Offcanvas_Toogle_Id++; ?>
                                <?php endwhile;
                            endif; ?>
                        </ul>
                        <?php  $Offcanvas_Toogle_Number++; ?>
                        <?php endwhile; 
                endif; ?> 



                <!-- <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Shoulder
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Suprascapular nerve</a></li>
                    <li class="fw-light"> <a href="">Acromioclavicular joint (AC joint)</a></li>
                    <li class="fw-light"> <a href="">Glenohumeral joint (true shoulder joint)</a></li>
                    <li class="fw-light"> <a href="">Long head biceps brachii tendon (bicipital tendinosis)</a></li>
                    <li class="fw-light"> <a href="">Subacromial subdeltoid bursa (impingement syndrome)</a></li>
                    <li class="fw-light"> <a href="">Rotator cuff </a></li>
                </ul>

                <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Elbow
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Medial epicondyle (golfer’s elbow)</a></li>
                    <li class="fw-light"> <a href="">Lateral epicondyle(tennis elbow)</a></li>
                    <li class="fw-light"> <a href="">Ulnar nerve</a></li>
                    <li class="fw-light"> <a href="">Posterior interosseus nerve</a></li>
                    <li class="fw-light"> <a href="">Olecranon bursa</a></li>
                </ul>

                <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Wrist
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Carpal metacarpal joint (CMC joint)</a></li>
                    <li class="fw-light"> <a href="">Distal radial ulnar joint (DRUJ)</a></li>
                    <li class="fw-light"> <a href="">Scaphotrapezial trapezoid joint (STTJ)</a></li>
                    <li class="fw-light"> <a href="">First extensor compartment (De Quervain’s tenosynovitis)</a></li>
                    <li class="fw-light"> <a href="">Median nerve (carpal tunnel syndrome)</a></li>
                    <li class="fw-light"> <a href="">Ganglia </a></li>
                </ul>

                <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Hand
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Finger flexor tendons (trigger finger)</a></li>
                </ul>

                <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Lower Back
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Sacroiliac joint</a></li>
                    <li class="fw-light"> <a href="">Piriformis (Piriformis syndrome)</a></li>
                </ul>

                <p class="fw-light"> Presently, we do not offer any neuroaxial procedures, such as epidural or facet joint injections.
                </p>

                <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Hip
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Femoroacetabular joint (true hip joint)</a></li>
                    <li class="fw-light"> <a href="">Greater trochanteric region </a></li>
                    <li class="fw-light"> <a href="">Lateral cutaneous nerve of the thigh (“meralgia paresthetica”) </a></li>
                    <li class="fw-light"> <a href="">Iliopsoas bursa </a></li>
                </ul>

                <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Knee
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Patellofemoral joint (Runner's knee)</a></li>
                    <li class="fw-light"> <a href="">Tibiofemoral joint (true knee joint) </a></li>
                    <li class="fw-light"> <a href="">Pes anserine bursa </a></li>
                    <li class="fw-light"> <a href="">Iliotibial band (IT band syndrome) </a></li>
                    <li class="fw-light"> <a href="">Popliteal cyst (Baker’s cyst) </a></li>
                </ul>

                <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Ankle
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Tibiotalar joint (true ankle joint)</a></li>
                    <li class="fw-light"> <a href="">Talocalcaneal joint (subtalar joint) </a></li>
                    <li class="fw-light"> <a href="">Lateral collateral ligament of ankle joint (lateral ankle sprain) </a></li>
                    <li class="fw-light"> <a href="">Medial collateral ligament of ankle joint (deltoid ligament) </a></li>
                    <li class="fw-light"> <a href="">Achilles tendon </a></li>
                    <li class="fw-light"> <a href="">Tibial nerve (tarsal tunnel syndrome) </a></li>
                </ul>

                <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Foot
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Plantar fascia</a></li>
                    <li class="fw-light"> <a href="">First metatarsal phalangeal joint </a></li>
                    <li class="fw-light"> <a href="">First metatarsal phalangeal ligament </a></li>
                    <li class="fw-light"> <a href="">Intermetatarsal neuroma (Morton’s neuroma) </a></li>
                </ul>

                <h2 class="font-bold fs-4 mt-4 mb-1 fw-light">
                    Muscle
                </h2>
                <ul>
                    <li class="fw-light"> <a href="">Most structures can be accessed without an ultrasound</a></li>
                    <li class="fw-light"> <a href="">Deeper structures can benefit from image guidance e.g. Rhomboids as they lie deep near lung pleura, Quadratus Lumborum
                        </a></li>
                </ul> -->

           
        </div>
    </div>
</section>



<?php get_footer(); ?>

