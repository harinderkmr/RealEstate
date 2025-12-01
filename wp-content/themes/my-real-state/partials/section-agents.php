<section class="agents-section">
    <div class="container text-center">
        <h2 class="section-title"><?php the_field('agent_section_title', 'option'); ?></h2>
        <p class="section-subtitle">
            <?php the_field('agent_section_description', 'option'); ?>
        </p>

        <div class="row justify-content-center">
            <?php
            $select_agents_to_show = get_field('select_agents_to_show', 'option');
            if ($select_agents_to_show) :
                $count = 0;
                foreach ($select_agents_to_show as $post) :
                    setup_postdata($post);
                    $count++;
            ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="agent-card <?php echo ($count == 2) ? 'active' : ''; ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" class="agent-photo" />
                            <?php endif; ?>

                            <h5 class="agent-name"><?php the_title(); ?></h5>

                            <?php $designation = get_field('designation'); ?>
                            <p class="agent-role"><?php echo $designation ? esc_html($designation) : 'Agent'; ?></p>
                            
                            <!-- agent-social -->
                            <div class="agent-social">
                                <?php if (have_rows('social_links')) : ?>
                                    <?php while (have_rows('social_links')) : the_row();
                                        $icon = get_sub_field('icon');
                                        $url = get_sub_field('social_link');
                                        echo "$icon $url"; // Debug
                                    endwhile; ?>
                                <?php else : ?>
                                    <p>No social links found</p> <!-- Debug -->
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
            <?php
                endforeach;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <?php $agent_button = get_field('agent_button', 'option'); ?>
        <?php if ($agent_button) : ?>
            <a href="<?php echo esc_url($agent_button['url']); ?>" target="<?php echo esc_attr($agent_button['target']); ?>" class="btn btn-global  see-all-agents">
                <?php echo esc_html($agent_button['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</section>