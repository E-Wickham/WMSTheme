<div class="vid-flex">
    <?php 

    //thumbnail_url
    //html
    //echo '<img src="'.$url.'">';

    $query = new WP_Query( [
        'post_type'      => 'videos',
        'nopaging'       => true,
        'posts_per_page' => '3',
    ] ); 
    $tiktokUrl = [];

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) : $query->the_post();
            $custom = get_post_custom( get_the_ID() );
            array_push($tiktokUrl, $custom["tiktok_url"][0]);
        endwhile;
    }   
    
    
    
    //$tiktokUrl = ["https://www.tiktok.com/@e.wickham/video/7543663669457014023","https://www.tiktok.com/@e.wickham/video/7542546508239899922"];
    
    function tiktokGet($vidUrl) {
        $url = "https://www.tiktok.com/oembed?url=".$vidUrl;

        $response = file_get_contents($url);

        if ($response !== false) {
            $data = json_decode($response, true);
            //print_r($data);
            ?><a class="vid-link" href="<? echo $vidUrl ?>" target="_blank"><img src="<?echo $data["thumbnail_url"];?>" alt="<?php $data["title"]?>"><div class="vid-text">Watch on TikTok</div></a><?
        } else {
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
