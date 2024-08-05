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
        <!-- SECOND NEWS SECTION -->
        <div class="section-2">
            <h3 class="news-category">Blog</h3>
            <?php include('template-parts/partials/category-list.php');?>
        </div>
        <!-- WHAT WE DO-->
        <div class="section-3">
            <h3 class="wwd-category">What we do</h3>
            <!-- anchor links on the top to this part of the website
                    then build -->
            <div class="section-3-exp">
                <div class="left">
                    <div class="exp-img-plhr">
                        <h4>Podcasts</h4>
                    </div>
                </div>
                <div class="right">
                    <div>Full service podcast production. From idea development, implementation, to producing your first episode - we will be with you every step of the way.</div>
                </div>
            </div>
            <div class="section-3-exp">
                <div class="left">

                </div>
                <div class="right">
                    <div class="exp-img-plhr">
                        <h4>Web Development</h4>
                    </div>
                </div>
            </div>
            <div class="section-3-exp">
                <div class="left">
                    <div class="exp-img-plhr">
                        <h4>News Products</h4>
                    </div>
                </div>
                <div class="right">

                </div>
            </div>
        </div>
        <!--ABOUT -->
        <div class="about">
            <div class="aboutFlex">
                <div class="aboutImg"></div>
                <div class="aboutLogin">
                    <a href="/about-us">
                        <h3>About Us</h3>
                        <div class="loginBtn"> About </div>
                    </a>
                </div>
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

