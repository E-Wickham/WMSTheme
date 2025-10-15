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
    function tiktokGet($vidArray) {
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
        tiktokGet($x);
        
    }
    wp_reset_query();
    ?>
</div>
<a class="login-link" href="https://www.tiktok.com/@e.wickham" target="_blank">
    <div class="loginBtn">More Videos</div>
</a>
