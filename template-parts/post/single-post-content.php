<?php
/**
 * Template part for displaying single post.
 */

$postID = get_the_ID();

$proj_url = get_field('project_link');


?>

<article id="post-<?php the_ID() ?>">

    <!-- Post thumbnail -->


    <!-- Post Content --> 
        <div class="single-entry-content">
            <header class="entry-header">
                <?php
                    the_title(' <h1 class="entry-title">', '</h1>' );
                ?>
                <div class="date-and-link">
                    <h4 class="entry-date">
                        <?php
                            $post_date = get_the_date( 'D F j, Y' ); echo $post_date;
                        ?>
                    </h4>
                    <?php 
                    if ($proj_url) { ?>
                        <a class="project-link" href=<?php echo $proj_url;?> target="_blank">See project</a>
                    <?php } ?>
                </div>

            </header>
            <div class="single-entry-grid">
                <div class="single-grid-1">

                <?php 
                if ( has_post_thumbnail() ) :
                    the_post_thumbnail();
                endif;
                ?>

                    <?php the_content(); ?>
                </div>
                <?php 
                ?>
                <div class="single-grid-2">
                    <h4>Featured Work</h4>
                    <?php
                    
                        // The Query.
                        $the_query = new WP_Query( array( 'posts_per_page' => 3, 'offset' => 0) );

                        // The Loop.
                        if ( $the_query->have_posts() ) {
                            echo '<div class="sidebar-posts">';
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                //add redirect as string query
                                echo '<a href="'.esc_html( get_permalink() ).'?type=redir"><div class="sidebar-post">';
                                if( has_post_thumbnail() ) :
                                    the_post_thumbnail();
                                endif;
                                echo '<h5>' . esc_html( get_the_title() ) . '</h5></div></a>';
                            }
                            echo '</div>';
                        } else {
                            esc_html_e( 'Sorry, no posts matched your criteria.' );
                        }
                        // Restore original Post Data.
                        get_template_part( 'template-parts/post/sidebar-event' );

                        ?>
                </div>
            </div>
            <div class="unrigged-embed"></div>
            <!--Function to fetch last five Unrigged stories-->
            <script src="https://external.unrigged.ca/js/unrigged_widget.js"></script>
        </div>
</article>

