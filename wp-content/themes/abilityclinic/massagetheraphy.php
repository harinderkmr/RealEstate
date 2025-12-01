<?php
// Template Name: Massage Theraphy
get_header();
?>
<meta name="description" content="Discover top massage therapists in Mississauga at The Ability Clinic. Enjoy affordable massage therapy for relaxation and rejuvenation." />

<section class="content section-blog-wrapper small-container services-page" >
            <div class="container-sm container-xs">  
                 <div class="row justify-content-center ">
                    <h1><?= get_field('heading'); ?></h1>
                    <?= get_field('description'); ?>
                </div>
                <?php if (have_rows('keyaspects')) : while (have_rows('keyaspects')) : the_row(); ?>
                    <div class="row justify-content-center  pt-3">
                            <?=  get_sub_field('sub_heading'); ?>
                         <div class=" mb-3">
                             <?php echo get_sub_field('sub_description'); ?>
                        </div>
                        <div class="foo-gallery">
                            <?php echo do_shortcode('[foogallery id="4888"]'); ?>
                        </div>
                        <?php if (have_rows('images')) : ?>
                            <div class="card-stack-wrapper">
                                <div class="card-stack">
                                    <?php $i = 0; while (have_rows('images')) : the_row(); 
                                        $image = get_sub_field('image');
                                        if (!$image) continue; 
                                    ?>
                                        <div class="card <?php echo $i === 0 ? 'active' : ''; ?>">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        </div>
                                    <?php $i++; endwhile; ?>
                                </div>
                                <div class="navigation">
                                    <?php $i = 0; while (have_rows('images')) : the_row(); 
                                        $image = get_sub_field('image');
                                        if (!$image) continue; 
                                    ?>
                                        <div class="nav-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        </div>
                                    <?php $i++; endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                 endif; ?>
                 <?php if (have_rows('benefits')) : while (have_rows('benefits')) : the_row(); ?>
                    <div class="row justify-content-center">
                            <?=  get_sub_field('sub_heading'); ?>
                         <div class=" mb-3">
                             <?php echo get_sub_field('sub_description'); ?>
                        </div>
                        
                    </div>
                <?php endwhile;
                 endif; ?>
                 <?php if (have_rows('evidence')) : while (have_rows('evidence')) : the_row(); ?>
                    <div class="row justify-content-center  p-0">
                           <?=  get_sub_field('head'); ?>
                        <div class=" mb-5">
                             <?php echo get_sub_field('evidence_parts'); ?>
                        </div>
                    </div>
                <?php endwhile;
                 endif; ?>
                    <div class="book-now text-center">
                        <a href="https://abilityclinic.janeapp.com/" target="_blank">Book Now</a>
                    </div>
            </div>
</section>
<style>
/* For mobile screens (max-width 768px) */
@media only screen and (max-width: 768px) {
  .card-stack-wrapper {
    display: block;  /* Show card-stack-wrapper on mobile */
  }
  .foo-gallery {
    display: none;   /* Hide foo-gallery on mobile */
  }
}

/* For devices larger than mobile (min-width 768px) */
@media only screen and (min-width: 769px) {
  .card-stack-wrapper {
    display: none !important;   /* Hide card-stack-wrapper on larger screens */
  }
  .foo-gallery {
    display: block;  /* Show foo-gallery on larger screens */
  }
}

.fbx-caption-title{
    display: none;
}
.card-stack-wrapper {
    height: 500px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    perspective: 1000px;
    background: white;
    overflow: hidden;
    padding: 20px;
}

.card-stack {
    position: relative;
    width: 350px;
    height: 350px;
    transform-style: preserve-3d;
}

.card {
    position: absolute;
    width: 100%;
    height: 100%;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    overflow: hidden;
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card.active {
    transform: translateX(0) scale(1) !important;
    opacity: 1;
    z-index: 5;
}

.card:not(.active) {
    opacity: 0.7;
    pointer-events: none;
}

.navigation {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 12px;
}

.nav-dot {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    overflow: hidden;
    opacity: 0.6;
}

.nav-dot img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.nav-dot.active {
    opacity: 1;
    transform: scale(1.1);
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    const dots = document.querySelectorAll('.nav-dot');
    let currentIndex = 0;

    function updateCards() {
        cards.forEach((card, index) => {
            const offset = index - currentIndex;
            card.classList.toggle('active', index === currentIndex);
            
            if (offset === 0) {
                card.style.transform = `translateX(0) scale(1)`;
                card.style.zIndex = 5;
            } else if (offset > 0) {
                card.style.transform = `translateX(${offset * 30}px) scale(${1 - offset * 0.1}) rotate(${offset * 3}deg)`;
                card.style.zIndex = 4 - offset;
            } else {
                card.style.transform = `translateX(${offset * 30}px) scale(${1 + offset * 0.1}) rotate(${offset * 3}deg)`;
                card.style.zIndex = 4 + offset;
            }
        });

        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    // Initialize cards
    updateCards();

    // Add click handlers to cards
    cards.forEach((card, index) => {
        card.addEventListener('click', () => {
            currentIndex = index;
            updateCards();
        });
    });

    // Add click handlers to navigation dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            updateCards();
        });
    });

    // Add swipe functionality
    let touchStartX = 0;
    const wrapper = document.querySelector('.card-stack-wrapper');

    wrapper.addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].clientX;
    });

    wrapper.addEventListener('touchend', (e) => {
        const touchEndX = e.changedTouches[0].clientX;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > 50) { // minimum swipe distance
            if (diff > 0 && currentIndex < cards.length - 1) {
                currentIndex++;
            } else if (diff < 0 && currentIndex > 0) {
                currentIndex--;
            }
            updateCards();
        }
    });
});
</script>
<?php
get_footer();
?>