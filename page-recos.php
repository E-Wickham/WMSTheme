<?php
/**
 * Recommendation Section
 * 
 * Template Name: Recommendations Page
 * Template Post Type: page
 * Page for all the recommendations I've made
 *
 */
 get_header();
  include('header2.php');
  
?>
<link href='https://cdn.boxicons.com/3.0.6/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>

<script> 

function copyFunction(elem) {
    console.log(elem)
    let storyURL = elem.dataset.url
    navigator.clipboard.writeText(storyURL).then(() => {
          elem.textContent = 'Copied!';
    });
}

</script>

<div class="rec-section"  x-intersect="$el.classList.add('showing')">
        <?php
        // 10 recommendations most recent blog posts - turn into carousel
        $fqueryArgs = array( 
                'posts_per_page' => 10, 
                'offset' => 0, 
                'post_type' => "v2-reco"
            );
        $blogposts = new WP_Query ( $fqueryArgs );
        while ( $blogposts->have_posts() ) :	
                $blogposts->the_post();
                echo "<div class='gallery-cell rec-story'>";
                get_template_part( 'template-parts/partials/rec-card' );
                echo "<div data-url='".esc_url(get_permalink())."' onclick='copyFunction(this)' class='share-btn-reco'>Share this Story</div>";
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
        flex-direction: column;
        padding-top: 2rem;
        max-width: 600px;
        margin: auto;
    }

    .rec-story {
        height: auto;
        flex: 0 1 auto;
    }

    .rec-story h2 {
        height: 60px;
    }
</style>