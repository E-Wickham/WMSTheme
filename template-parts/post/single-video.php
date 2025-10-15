<?php
/**
 * Template part for displaying single video.
 */

$postID = get_the_ID();
$postUrl = get_the_title();


?>

<article id="post-<?php the_ID() ?>">

    <!-- Post thumbnail -->


    <!-- Post Content --> 
        <div class="single-entry-content">
            <header class="entry-header">
                <div class="date-and-link">
                    <h1 class="entry-date">
                        <?php
                            $post_date = get_the_date( 'D F j, Y' ); echo "TikTok published: ".$post_date;
                        ?>
                    </h1>
                </div>

            </header>
            <div class="single-entry-grid">
                <div class="single-grid-1">

                <?php 
                function tiktokGet($url) {

                    $url = "https://www.tiktok.com/oembed?url=".urlencode($url);
                    $response = file_get_contents($url);
                    if ($response !== false) {
                        $data = json_decode($response, true);
                        

                        echo '<h4>'.$data["title"].'</h4>'; 
                        echo '<div class="embed-wrapper-tiktok">'.$data['html'].'</div>';
                    } else {
                        echo "Failed to fetch TikTok embed data.";
                    }
                }     
                tiktokGet($postUrl);
                ?>
                </div>
                <?php 
                ?>
                <div class="single-grid-2">
                    <h4 style="text-align: center;">Other Videos</h4>
                    
                    <div class="vid-flex">
                        <?php 

                        $query = new WP_Query( [
                            'post_type'      => 'videos',
                            'posts_per_page' => 5,
                        ] ); 
                        $tiktokUrl = [];

                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) : $query->the_post();
                                $postlink = get_the_title();
                                $thumbnail = get_the_post_thumbnail_url();
                                //$post = the_post();
                                $custom = get_post_custom( get_the_ID() );
                                array_push($tiktokUrl, [$postlink, $thumbnail]);
                            endwhile;
                        }   
                        function tiktokGet2($vidArray) {
                            $vidUrl = $vidArray[0];
                            $vidThumb = $vidArray[1];
                            $url = "https://www.tiktok.com/oembed?url=".urlencode($vidUrl);
                            $response = file_get_contents($url);
                            if ($response !== false) {
                                $data = json_decode($response, true);
                                ?><a class="vid-link" href="<?php echo $vidUrl; ?>" target="_blank">
                                    <img src="<?php echo esc_url($vidThumb);?>" alt="<?php echo $data["title"];?>"><div class="vid-text">Watch on TikTok</div></a><?php }
                            else {
                                echo "Failed to fetch TikTok embed data.";
                            }

                        }     
                    foreach ($tiktokUrl as $x) {
                            tiktokGet2($x);
                            
                        }
                        wp_reset_query();
                        ?>
                    </div>
                        <?
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
<style>
.embed-wrapper-tiktok #embed-video-container, .css-g03djc, .single-entry-content body {
    background: #f7f8fd!important;
}
.css-1r2yhgy.evf3f5610 {
    background-color: #fff;
}

</style>

<script defer>
    let myiFrame = document.querySelector(".tiktok-embed")
    myIframe.addEventListener("load", function() {
        let box = document.querySelector("#embed-video-container")
        box.style.backgroundColor = "#f7f8fd";
    });


</script>