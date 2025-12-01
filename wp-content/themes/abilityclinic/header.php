<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&amp;family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&amp;display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link href="https://abilityclinic.ca/wp-content/uploads/2024/04/favicon.ico" rel="shortcut icon" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://abilityclinic.ca/wp-content/uploads/2024/04/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://abilityclinic.ca/wp-content/uploads/2024/04/favicon-32x32-1.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="https://abilityclinic.ca/wp-content/uploads/2024/04/favicon-16x16-1.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/manifest.json">
    <meta name="google-site-verification" content="_CpfaAJciV3C6r48H9zFS2Vo7jRArzUnVT9Nooand7A" />
    <?php $ID = get_the_ID();
        $thumbnail_image_url = !is_single() 
            ? (wp_get_attachment_image_src(get_post_thumbnail_id($ID), 'full')[0] ?? 'https://abilityclinic.ca/wp-content/uploads/2024/10/apple-touch-icon-1.jpg') 
            : 'https://abilityclinic.ca/wp-content/uploads/2024/10/apple-touch-icon-1.jpg';
    ?>
    <meta name="google-site-verification" content="t2M3yA-uPpnUtD8zMgKnDa4_gSLK_d77ZrKZVfJWzeg" />
    <meta name="Language" content="English" />
    <meta name=”robots” content=”noydir, noodp” />
    <meta name="Publisher" content="The Ability Clinic" />
    <meta name="Revisit-After" content="1 Days" />
    <meta name="distribution" content="LOCAL" />
    <meta name="page-topic" content="Physiotherapy and Massage Therapy in Mississauga">
    <meta name="YahooSeeker" content="INDEX, FOLLOW">
    <meta name="msnbot" content="INDEX, FOLLOW">
    <meta name="googlebot" content="index, follow" />
    <meta name="Rating" content="General" />
    <meta name="allow-search" content="yes">
    <meta name="expires" content="never">
    <meta name="msvalidate.01" content="B71750CED2950677E563A1112C217909" />
    <meta name="author" content="The Ability Clinic">
    <meta name="geo.region" content="CA-ON" />
    <meta name="geo.placename" content="Mississauga" />
    <meta name="geo.position" content="43.589623;-79.644388" />
    <meta name="ICBM" content="43.589623, -79.644388" />
    <meta property="og:image" content="<?= $thumbnail_image_url; ?>" />
    <meta property="og:title" content="Wellness Counselling and Physical Muscle Treatment in Mississauga" />
    <meta property="og:type" content="website" />
    <meta property="og:URL" content="https://abilityclinic.ca/" />
    <meta property="og:description"
        content="The Ability Clinic - Specialist Medical and Rehabilitation Clinic offering physiotherapy and massage services in Mississauga. Expert care for your health and wellness needs." />
    <meta name="thumbnail" content="https://abilityclinic.ca/wp-content/uploads/2024/10/apple-touch-icon-1.jpg" />
    <meta property="og:image" content="https://abilityclinic.ca/wp-content/uploads/2025/02/massage-1-1.webp" />

    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HNGNND7RSQ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-HNGNND7RSQ');
    </script>

    <?php wp_head(); ?>

</head>


<body>
    <div id="preloader">
        <div class="loader-border">
            <img src="/wp-content/themes/abilityclinic/images/preloader-logo.png" alt="Logo" class="loader-logo" />
        </div>
    </div>
    <script>
    window.addEventListener("load", function() {
        const preloader = document.getElementById("preloader");
        preloader.classList.add("hide");
        document.body.style.display = "block";
    });
    </script>
    <header class="header bg-white shadow px-xl-4 px-xxl-5" id="header">
        <div class="container-fluid d-flex justify-content-between">
            <div class="brand">
                <?php $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<a href="/"><img src="' . esc_url($logo[0]) . '" alt="The Ability Clinic Logo" height="80" width="385"></a>';
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                } ?>
            </div>
            <div class="sitelinks align-items-end d-flex flex-column justify-content-between">
                <form method="get" id="searchform" action="<?php bloginfo( 'url' ); ?>/"
                    class="search mt-2 d-none d-xl-flex">
                    <input type="search" class="flex-grow-1" value="<?php the_search_query(); ?>" name="q" id="q"
                        placeholder="search..">
                    <button type="submit" class="border-0 bg-white"><i class="bi bi-search"></i></button>
                </form>

                <!-- <?php  do_shortcode('[wpdreams_ajaxsearchlite]'); ?> -->
                <!-- <form role="search" method="get" class="search mt-2 d-none d-xl-flex" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" class="flex-grow-1 border-0" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="border-0 bg-white"><i class="bi bi-search"></i></button>
                </form> -->


                <nav class="navsite d-none d-xl-flex ms-auto align-items-center" id="navSite" aria-label="Navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'container'      => false,
                        'menu_class'     => 'nav',
                       
                    
                    ));
                    ?>
                </nav>

            </div>
            <div class="callnav d-xl-none" id="navCall"><span class="line"></span><span class="line"></span><span
                    class="line"></span></div>
        </div>
    </header>