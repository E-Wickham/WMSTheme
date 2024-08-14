<?php /* 
Template Name: Portfolio Page 
Template Post Type: post, page

*/ 
get_header();
include('header2.php');

?>
<div class="portfolio-page-content">
<article id="post-<?php the_ID() ?>">

    <!-- Post thumbnail -->


    <!-- Post Content --> 
        <div class="single-entry-content">
            <header class="entry-header">
                <?php
                    the_title(' <h1 class="entry-title">', '</h1>' );
                ?>

            </header>
            <div class="single-entry-grid-port">
                <div class="single-grid-1">

                <?php 
                if ( has_post_thumbnail() ) :
                    the_post_thumbnail();
                endif;
                ?>

                    <?php the_content(); ?>
                </div>
            </div>
            <div class="unrigged-embed"></div>
            <!--Function to fetch last five Unrigged stories-->
            <script src="https://external.unrigged.ca/js/unrigged_widget.js"></script>
        </div>
</article>
<?php
// TO SHOW THE PAGE CONTENTS
wp_reset_query(); //resetting the page query
    ?>
</div>
<script>
        // simple vanilla js fix to the nav menu
        const menuList = document.querySelector('.sidepage .menuList');
        const menuListReg = document.querySelector('.sidepage .menuList-reg');

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