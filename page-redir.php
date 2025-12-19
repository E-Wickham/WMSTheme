<?php
/**
 * Recommendation Redirect 
 * 
 * Template Name: Recommendations Redirect
 * Template Post Type: page
 * Page for all the recommendations I've made
 *
 */
 get_header();
  include('header2.php');
  

    $postQueries = array();
    parse_str($_SERVER['QUERY_STRING'], $postQueries);
    $post_id = (int)$postQueries["post"];


    //get post information from ID 

    $post_info = get_post($post_id);
    $post_date = $post_info->post_date;

    $recFields = get_fields($post_id);
    $recAuth = $recFields["author"];
    $recURL = $recFields["url"];
    $recPub = $recFields["publication"];
    if ($recURL != NULL) { ?>
        <script>
            /*redirect function*/
                window.onload = function() {
                    setTimeout( function(){ window.location.replace(<?php  echo '"'.$recURL.'"'; ?>)},1000);          
                }
        </script>
    <?php } 


?>
<article>

    <!-- Post thumbnail -->


    <!-- Post Content --> 
        <div class="single-entry-content">
            <header class="entry-header">
                <?php
                    the_title(' <h1 class="entry-title">', '</h1>' );
                ?>
                <h4 class="entry-date">
                <?php
                    $post_date2 = date("F j, Y", strtotime($post_date));
                    echo $post_date2;
                ?>
                </h4>
            </header>
            <div class="single-entry-grid">
                <div>
                    <?php echo 'Redirecting to: <a href="'.$recURL.'">'.get_the_title($postQueries["post_id"]).'</a> <br>Published By: '.$recAuth. " in ".$recPub; ?>
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