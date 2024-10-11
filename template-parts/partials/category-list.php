<?php
/**
 * Responsive columns for second section
 */
?>

<div class="category-posts" x-intersect="$el.classList.add('showing')">
        <?php
        // Featured query - five most recent blog posts
        $fqueryArgs = array( 
                'posts_per_page' => 5, 
                'offset' => 0, 
                'cat' => 6);
        $blogposts = new WP_Query ( $fqueryArgs );
        while ( $blogposts->have_posts() ) :	
                $blogposts->the_post();
                echo "<div class='ft-story'>";
                get_template_part( 'template-parts/content-posts' );
                echo"</div>";
        endwhile; 
        wp_reset_query(); // End of the loop.					
        ?>				
</div>