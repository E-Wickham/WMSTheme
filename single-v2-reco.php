<?php 
/**
 * Template for single recommendation posts.
 * Handles redirects to the stories
 */

$postID = $post->ID;
$recFields = get_fields($postID);
$recAuth = $recFields["author"];
$recURL = $recFields["url"];
$recPub = $recFields["publication"];
// Get the Post Thumbnail and save it as $recImg
$recImg = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'post');
 get_header();
 include('header2.php');

?>
<article id="post-<?php $postID ?>">

    <!-- Post thumbnail -->


    <!-- Post Content --> 
        <div class="single-entry-content">
            <header class="entry-header">
                <?php
                    the_title(' <h1 class="entry-title redir">', '</h1>' );
                    echo '<div class="publisher">'.$recPub.'</div>';                              
                    echo '<div class="author">'.$recAuth.'</div>';        
                ?>

                <h4 class="entry-date">
                <?php
                    $post_date = get_the_date( 'D F j, Y' ); 
                    echo $post_date;
                ?>
                </h4>
            </header>
            <div class="single-entry-grid redir">
                    <!-- Put Rec Card in here for now --> 
                                
                    <a class="story-redir-btn" href="<?php echo home_url().'/recommendation-redirection/?post='.$postID; ?>" target="_blank">
                                    <?php
                                        echo '<h4>Click here to read the story</h4>';                      
                                        ?>

                    </a>
                    <div class="redir-img">
                        <img src="<?php echo esc_url($recImg[0]);?>">
                    </div>
            </div>
        </div>
</article>

<style>
    .single-entry-grid {
        padding: 1rem;
        text-wrap: wrap;
    }

    html {
            width: 100%;
            overflow:hidden;
        }

</style>