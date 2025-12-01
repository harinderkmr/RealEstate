<section class="subscribe-section">
    <div class="subscribe-overlay">
        <div class="container subscribe-box d-flex flex-column flex-lg-row align-items-center justify-content-between gap-5 px-4 py-5">
            
            <div class="subscribe-content text-content text-start text-lg-start">
                <h2 class="subscribe-title mb-2">
                    <?php the_field('subscribe_heading'); ?>
                </h2>
                <h2 class="subscribe-subtitle mb-0">
                    <?php the_field('subscribe_subheading'); ?>
                </h2>
            </div>

            <form class="subscribe-form d-flex flex-column flex-md-row align-items-center gap-3" method="post" action="#">
                <input type="email" name="subscriber_email" class="form-control form-control-lg px-4 shadow-sm" placeholder="Type your email address" required>
                <button type="submit"><i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
</section>
