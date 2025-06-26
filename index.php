<?php
/**
 * 
 */

 get_header();

    ?>
    <main> 
        <div class="home-page">
            <?php include('template-parts/partials/hero-type.php');?>
            <?php include('template-parts/partials/floating-elems.php');?>
        </div>
        <div class="site-content">
            <!-- SECOND NEWS SECTION -->
            <div class="section-2">
                <h3 class="news-category">Featured Work</h3>
                <?php //include('template-parts/partials/category-list.php');
                // 
    ?>
            </div>
            <!-- Featured Work-->
            <div class="section-3">
                <h3 class="news-category">Bylines</h3>
                <?php include('template-parts/partials/ticker.php');?>

            </div>
            <!-- What I'm reading-->
            <div class="section-4">
                <h3 class="news-category">What I'm Reading</h3>
                <?php include('template-parts/partials/category-list.php');?>

            </div>
                        <!-- TESTIMONIAL SECTION -->
                        <h3 class="section-test-heading">Testimonials</h3>
            <div class="section-test">
                <!-- Testimonial ID 20 -->
                <!-- -->
            </div>

        </div>
     <?php               
    $args = array(
        'post_type'      => 'Published_Work',
        'posts_per_page' => 4,
    );
    $loop = new WP_Query($args);

    $posts = $loop->posts;
    foreach($posts as $post){
        var_dump($post);
    }
    while ( $loop->have_posts() ) {
        echo("true");
        $loop->the_post();
                        ?>
                        <a class="floating_thumb" href="" target="_blank">
                            <div class="floating_thumb-img">
                            </div>
                            <div>
                                <? the_title(); 

                                ?>
                            </div>
                        </a>
                        <?
                    
    }
    wp_reset_query(); // End of the loop.					

                ?>
         
    </main>

    <script>
        // simple vanilla js fix to the nav menu
        const menuList = document.querySelector('.menuList');
        const menuListReg = document.querySelector('.menuList-reg');

        // Function to handle the resize event
        function handleResize() {
        if (window.innerWidth > 768) {
            menuList.style.display = 'none';
            menuListReg.style.display = 'flex';
        } else {
            //menuList.style.display = 'flex';
            menuListReg.style.display = 'none';
        }
        }

        // resize event listener
        window.addEventListener('resize', handleResize);

    </script>
    <?php

 get_footer();

