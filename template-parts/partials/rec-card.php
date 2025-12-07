<?php 

// Custom post display
?>

<a href="<?php echo esc_url(get_permalink()); ?>" target="_blank">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 

        // get perma link
        $postID = $post->ID;

        //keep post id for specific queries
        $post_id = $post->ID;

        $curryear = date('Y');
        $postyr = get_the_date('Y');
        if ($curryear == $postyr) {
            $poststamp = get_the_date('M j, Y');
        } else {
            $poststamp = get_the_date('m j, Y');
        }
        //Custom Fields
        $recFields = get_fields($postID);
        $recAuth = $recFields["author"];
        $recImg = $recFields["screenshot"];
        $recPub = $recFields["rec_pub"];
        ?>

            <div class="entry-content-holder" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.3) 100%),url('<?php echo esc_url($recImg);?>')">
                <header class="entry-header">		
                    <div class="entry-meta">
                        <span class="cat-links">
                            <?php
                                $post_categories = wp_get_post_categories( $post_id );
                                echo '<span class="date">'.$poststamp.'</span>';                              
                                echo '<div class="publisher">'.$recPub.'</div>';                              
                                echo '<div class="author">'.$recAuth.'</div>';                              
                                ?>
                        </span>
                    </div>
            <?php the_title('<h2 class="entry-title">', '</h2>');
            ?>
                </header>
                    <div class="entry-footer"></div>
            </div>          
    </article>
</a> 

<style>
    .entry-content-holder {
        object-fit: cover;
        
    }

    .rec-story {
        flex: 0 1 500px;
    }

    .rec-story a {
        text-decoration: none;
    }

    .rec-story h2 {
        height: 120px;
    }

    a article.recommendations {
        color: var(--font-light);
    }

    .entry-content-holder {
        transition: 0.4s;
        border-radius: 0.25rem;
    }

    .entry-content-holder:hover {
        transform: scale(1.05);
        transition: 0.4s;
    }


</style>