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
        <div class="what-we-do">
            <?php include('template-parts/partials/we-do.php');?>   

        </div>
        <div class="site-content">
            <!-- SECOND NEWS SECTION -->
            <!--<div class="section-2">
                <h3 class="news-category">Featured Work</h3>--
                <?php //include('template-parts/partials/category-list.php');?>
            <!--</div>-->
            <!-- Featured Work-->
            <div class="section-3">
                <h3 class="news-category">Videos</h3>
                <?php include('template-parts/partials/video.php'); ?>

                <?php //include('template-parts/partials/ticker.php');?>

            </div>
            <!-- What I'm reading-->
            <!--<div class="section-4">
                <h3 class="news-category">What I'm Reading</h3>-->
                <?php //include('template-parts/partials/category-list.php');?>

            <!--</div>-->
            <!-- TESTIMONIAL SECTION -->
            <h3 class="section-test-heading">Testimonials</h3>
            <div class="section-test">
                <!-- Testimonial ID 20 -->
                <!-- -->
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

    function scrollTo(domElem) {
        const elem = document.querySelector(domElem)
        elem.scrollIntoView()
        elem.click()
    }



    </script>
    <?php

 get_footer();

