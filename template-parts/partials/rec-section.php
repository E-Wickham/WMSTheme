<?php
/**
 * Recommendation Section
 */
?>


<div class="rec-section"  x-intersect="$el.classList.add('showing')">
        <?php
        // 10 recommendations most recent blog posts - turn into carousel
        $fqueryArgs = array( 
                'posts_per_page' => 10, 
                'offset' => 0, 
                'post_type' => "v2-reco");
        $blogposts = new WP_Query ( $fqueryArgs );
        while ( $blogposts->have_posts() ) :	
                $blogposts->the_post();
                echo "<div class='gallery-cell rec-story'>";
                get_template_part( 'template-parts/partials/rec-card' );
                echo"</div>";
        endwhile; 
        wp_reset_query(); // End of the loop.					
        ?>				
</div>



<style>
    .rec-section {
        display: flex;
        gap: 1rem;
        justify-content: center;
    }
</style>