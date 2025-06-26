<?php
    $args = array(
        'post_type'      => 'publications',
        'posts_per_page' => 15,
    );
    $loop = new WP_Query($args);
?>

<div class="ticker-wrap">
    <div class="ticker">
        <?php while ( $loop->have_posts() ) {
        $loop->the_post();
        $fimg = get_the_post_thumbnail_url();
        ?>
            <?php
                    if(has_post_thumbnail()){
                        ?>
                        <a class="floating_thumb" href="" target="_blank">
                            <div class="floating_thumb-img">
                                <img src="<?php echo $fimg ?>" alt="<?php the_title()?>">
                            </div>
                            <div>
                                <? the_title(); ?>
                            </div>
                        </a>
                        <?
                    }
            ?>
        <?php
    }
    wp_reset_query(); // End of the loop.					

    
    ?>
    </div>
</div>

<style>

@-webkit-keyframes ticker {
  0% {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    visibility: visible;
  }

  100% {
    -webkit-transform: translate3d(-3500px, 0, 0);
    transform: translate3d(-3500px, 0, 0);
  }
}

@keyframes ticker {
        0% {
            transform: translate3d(0, 0, 0);
        }

        100% {
            transform: translate3d(-3500px, 0, 0);
            /* The image width */
        }
    }

.ticker-wrap {
  position: relative;
  bottom: 0;
  width: inherit;
  overflow: hidden;
  height: 80px;
  padding-left: 100%;
  box-sizing: content-box;
}

.ticker img {
    height:60px;
}


.ticker:hover {
 -webkit-animation-play-state: paused;
  -moz-animation-play-state: paused;
  -ms-animation-play-state: paused;
  -o-animation-play-state: paused;  
  animation-play-state: paused;
  }

.ticker {
    display: inline-block;
    white-space: nowrap;
    padding-right: 100%;
    box-sizing: content-box;
    -webkit-animation-iteration-count: infinite; 
            animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
    -webkit-animation-name: ticker;
            animation-name: ticker;
    -webkit-animation-duration: 30s;
            animation-duration: 30s;
    
}
.floating_thumb {
    display: inline-grid;
}

</style>