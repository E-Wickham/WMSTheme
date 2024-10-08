<?php
/**
 * 
 */

 get_header();

    ?>
    <main> 
        <div class="home-page">
            <?php include('template-parts/partials/hero-type.php');?>
        </div>
        <div class="site-content">
            <!-- SECOND NEWS SECTION -->
            <div class="section-2">
                <?php include('template-parts/partials/we-do.php');?>
            </div>
            <!-- TESTIMONIAL SECTION -->
            <h3 class="section-test-heading">Testimonials</h3>
            <div class="section-test">
                <!-- Testimonial ID 20 -->
                <?php echo do_shortcode("[sp_testimonial id='20']"); ?>

            </div>
            <!-- Blog-->
            <div class="section-3">
                <h3 class="news-category">Blog</h3>
                <?php include('template-parts/partials/category-list.php');?>
            </div>
        </div>
        
         
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

