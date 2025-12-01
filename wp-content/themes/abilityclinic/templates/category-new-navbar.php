<section class="content  p-0 p-md-3 pb-3">
    <div class="py-2 text-left d-md-none p-0 m-0" style="background-color: #f97224;">
        <p class="px-4 mb-0 text-white fw-light">New Blog</p>
    </div>
    <div class="container-sm container-xs my-3">
        <div class="row justify-content-center ">
            <div class="col-md-10 col-lg-10 justify-content-lg-start m-0">
                <!-- Hide on md and above Sm MD Screen-->
                <div class="justify-content-md-around d-flex gap-md-4 flex-column flex-md-row  align-items-center list-unstyled articles-nav-menu-opt">
                    <div class="btn-scale mb-3 mb-md-0 w-100">
                        <?php
                        $menu_items = wp_get_nav_menu_items('article-menu');
                        if ($menu_items) {
                            echo '<select id="article-menu-dropdown" class="form-select w-100 fw-light border-0 rounded-0 focus:border-0 focus:box-shandow-none focus:outline-none" name="category_article_view" >';
                            echo '<option value="" class="fw-light">Sort by Category</option>';
                            foreach ($menu_items as $menu_item) {
                                echo '<option value="' . esc_attr($menu_item->url) . '" class="fw-light">' . esc_html($menu_item->title) . '</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>
                    <div class="art-nav w-100 btn-scale">
                    <div class="input-group flex-md-grow-1 border"> <!-- Use flex-md-grow-1 to allow the input group to grow -->
                        <input type="text" class="form-control fw-light border" id="query_article" placeholder="Looking For a Topic?" aria-label="Looking For a Topic?" aria-describedby="Search">
                        <button class="btn btn-outline-primary border btn-scale" type="button" id="articles_Search"><i class="fas fa-search" style="color: #f97224;"></i></button>
                    </div>
                    </div>
                </div>


                <!-- Show on md and above -->
                <!-- Another section to show on md and above LG Screen-->
                <!-- <div class="d-none d-md-block sitelinks align-items-end d-flex flex-column justify-content-between ">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'article-menu',
                        'menu_id'        => 'article-menu',
                        'menu_class'     => 'nav',
                        'container'      => 'nav',
                        'container_class' => 'navsite d-none d-xl-flex ms-auto align-items-center article-nav',
                    ));
                ?>
                </div> -->

            </div>
        </div>
    </div>
</section>