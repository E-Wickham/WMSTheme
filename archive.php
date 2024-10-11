<?php 
/**
 * Template for all Pages on Farma website
 */
get_header();
include('header2.php');

?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="archive-wrapper">
            <?php
            if ( have_posts() ) : ?>
                <header class="archive-page-header">
                    <?php
                    the_archive_title('<h1 class="archive-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header>
                <div class="archive-posts">
                    <?php
                        //open loop
                        while( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content-posts'); 
                        endwhile;  
                    ?>
                </div>
                <?php
                    echo paginate_links( [
                        'prev_text' => esc_html__( 'Prev', 'herobiz'),
                        'next_text' => esc_html__( 'Next', 'herobiz'),
                    ] );  
            else : 
                get_template_part('template-parts/page/content', 'none');
            endif;    
            ?>
                    
        </div>
    </main>
</div>
<style>
    .archive-wrapper {
        max-width: 1200px;
        margin: auto;
    }
    .entry-header {
        border: 1px solid #cacaca;
        background-color: #fff;
    }
    .entry-header:hover {
        backdrop-filter: brightness(0.8);
    }

</style>
<script>
    let titleOrig = document.querySelector(".archive-title").innerHTML
    let titleElem = document.querySelector(".archive-title")
    let titleNew = titleOrig.replace("Category: ",'')
    titleElem.innerHTML = titleNew
</script>