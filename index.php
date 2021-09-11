<?php get_header(); ?>
    <div class="container mx-auto">
        <div class="head-title w-full p-8">
            <h1><?php bloginfo('name'); ?></h1>
        </div>
        <div class="page-body w-full grid grid-cols-5">
            <div class="nav p-8 col-span-1">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container_class' => 'main-menu'
                    ));
                ?>
            </div>
            <div class="page-content p-8 col-span-4">
                <?php
                    if(have_posts()):
                    while (have_posts()):
                    the_post();
                ?>
                    <?php the_content() ?>
                <?php
                    endwhile; endif;
                ?>
            </div>
        </div>        
    </div>
<?php get_footer(); ?>