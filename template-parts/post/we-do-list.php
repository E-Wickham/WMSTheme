<?php 
/*list item for what we do section*/
?>

<a href="<?php echo esc_url(get_permalink()); ?>" target="_blank">
    <div class="we-do-post">                   
        <?php 
        // finding the featured image in a very heavy-handed way
        $args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'post_parent'    => get_the_ID(),
            'posts_per_page' => 1,
            'order'          => 'ASC',
        );
        $attachments = get_posts($args);
        $thumbnail_url = "";
        if ($attachments) {
            $thumbnail_url = wp_get_attachment_url($attachments[0]->ID, 'news-thumb');
        } else{
            $thumbnail_url = get_the_post_thumbnail_url();
        }
        ?>        
        <div class="we-do-thumbnail">
                <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } 
                    else if ($thumbnail_url != NULL) {
                        ?><img src="<?php echo $thumbnail_url?>">
                <?php }
                ?>
        </div>
        <div class="we-do-list-title">
        <?php
            the_title();
        ?>
        </div>
    </div>
</a>