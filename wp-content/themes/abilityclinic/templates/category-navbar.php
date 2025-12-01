<!-- Top navBar  -->
<section class="content  p-0 p-md-3 pb-3 article-section-container">
    <div class="py-2 text-left d-md-none p-0 m-0" style="background-color: #f97224;">
        <p class="px-4 mb-0 text-white fw-light">Blog</p>
    </div>
    <div class="container-sm container-xs">
        <div class="row justify-content-center ">
            <div class="col-md-10 col-lg-10 justify-content-lg-start p-0 m-0">
                <!-- Hide on md and above Sm MD Screen-->
                <div class="d-md-none justify-content-md-center list-unstyled articles-nav-menu-opt">
                    <?php
                    // Get the menu items for the 'article-menu' location
                    $menu_items = wp_get_nav_menu_items('article-menu');

                    // Check if there are menu items
                    if ($menu_items) {
                        echo '<select id="article-menu-dropdown" class="form-select fw-light border-0 rounded-0 focus:border-0 focus:box-shandow-none focus:outline-none" name="category_article_view" >';
                        foreach ($menu_items as $menu_item) {
                            echo '<option value="' . esc_attr($menu_item->url) . '" class="fw-light">' . esc_html($menu_item->title) . '</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                </div>


                <!-- Show on md and above -->
                <!-- Another section to show on md and above LG Screen-->
                <div class="d-none d-md-block sitelinks align-items-end d-flex flex-column justify-content-between ">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'article-menu',
                        'menu_id'        => 'article-menu',
                        'menu_class'     => 'nav',
                        'container'      => 'nav',
                        'container_class' => 'navsite d-none d-xl-flex ms-auto align-items-center article-nav',
                    ));
                ?>
                </div>

            </div>
        </div>
    </div>
</section>