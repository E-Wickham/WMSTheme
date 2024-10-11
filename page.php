<?php 
/**
 * Default Template for Page on website
 */
get_header();
include('header2.php');

?>
 <div id="primary" class="single_page content-area">
    <main id="main" class="single_page site-main">
        <div class="single_page">
            <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/page/content', 'page'); // content-page.php
            
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            endwhile;
            ?>
        </div>

    </main>
</div>
