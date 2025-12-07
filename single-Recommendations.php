<?php 
/**
 * Template for single recommendation posts.
 * Handles redirects to the stories
 */

$postID = $post->ID;
$recFields = get_fields($postID);
$recAuth = $recFields["author"];
$recURL = $recFields["rec_url"];
$recImg = $recFields["screenshot"];
$recPub = $recFields["rec_pub"];

    if ($recURL != NULL) { ?>
        <script>
            /*redirect function*/
                window.onload = function() {
                    setTimeout( function(){ window.location.replace(<?php  echo '"'.$recURL.'"'; ?>)},500);          
                }
        </script>
    <?php } 

 get_header();
 include('header2.php');

?>
<article id="post-<?php the_ID() ?>">

    <!-- Post thumbnail -->


    <!-- Post Content --> 
        <div class="single-entry-content">
            <header class="entry-header">
                <?php
                    the_title(' <h1 class="entry-title">', '</h1>' );
                ?>
                <h4 class="entry-date">
                <?php
                    $post_date = get_the_date( 'D F j, Y' ); 
                    echo $post_date;
                ?>
                </h4>
            </header>
            <div class="single-entry-grid">
                <div>
                    <?php echo 'Redirecting to: <a href="'.$recURL.'">'.get_the_title().'</a> <br>Published By: '.$recAuth. " in ".$recPub; ?>
                </div>
                <div class="err-msg">
                    If this redirect link is failing in your browser, please let me (Eric) know.
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