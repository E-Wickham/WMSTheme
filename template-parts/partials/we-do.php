    <div class="wwd-category">
        <h3>My Work</h3>
            <!-- anchor links on the top to this part of the website
                    then build -->


           <div x-data="{ pod: false, webdev:false, newsprod: false, jrnl: false }">
                <div class="wwd-items">
                    <div :class="jrnl ? 'active' : ''" class="wwd-item jrnl" @click="jrnl = ! jrnl">
                        <i class='bx bxs-edit-alt'></i>                        
                        <h4>Journalism</h4>
                    </div>
                    <div :class="pod ? 'active' : ''" class="wwd-item pod" @click="pod = ! pod">
                        <i class='bx bx-podcast'></i>
                        <h4>Podcasts</h4>
                    </div>
                    <div :class="webdev ? 'active' : ''" class="wwd-item web" @click="webdev = ! webdev">
                        <i class='bx bx-code-alt' ></i>                    
                        <h4>Web Development</h4>
                    </div>
                    <div :class="newsprod ? 'active' : ''" class="wwd-item news" @click="newsprod = ! newsprod">
                        <i class='bx bx-news'></i>
                        <h4>News Products</h4>
                    </div>
                </div>
                <div class="wwd-res">
                    <div x-show="jrnl" x-transition>
                        <i class='bx bx-x-circle close-btn' @click="jrnl = ! jrnl"></i>
                        <div class="wwd-res-item jrnl">
                            <img src="https://wickhammediasolutions.com/wp-content/uploads/2024/08/podcast-8687965_1280.jpg" alt="Journalism">
                            <div class="explainer">
                                <h5>Journalism</h5>
                                <div>
                                    A quick look at some of my best work in print. 
                                </div>
                                <div>
                                    <?php
                                        wp_reset_query();
                                        // Featured query - five most recent published featured posts
                                        $fqueryArgs = array( 'posts_per_page' => 3, 'offset' => 0);
                                        $topfeatured = new WP_Query ( $fqueryArgs );
                                        while ( $topfeatured->have_posts() ) :	
                                                $topfeatured->the_post();
                                                the_title();
                                        endwhile; 
                                        wp_reset_query(); // End of the loop.					
                                    ?>	
                                </div>
                                <div>
                                    <a class="aboutBtn" href="https://wickhammediasolutions.com/podcast-production/">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="pod" x-transition>
                        <i class='bx bx-x-circle close-btn' @click="pod = ! pod"></i>
                        <div class="wwd-res-item pod">
                            <img src="https://wickhammediasolutions.com/wp-content/uploads/2024/08/podcast-8687965_1280.jpg" alt="Podcast">
                            <div class="explainer">
                                <h5>Podcasts</h5>
                                <div>
                                    Podcasts I've produced, edited or written. 
                                </div>
                                <div>
                                    <?php 
                                        get_posts_by_categories([4],2)
                                    ?>
                                </div>
                                <div>
                                    <a class="aboutBtn" href="https://wickhammediasolutions.com/podcast-production/">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="webdev" x-transition>
                        <i class='bx bx-x-circle close-btn' @click="webdev = ! webdev"></i>
                        <div class="wwd-res-item web">
                            <img src="https://wickhammediasolutions.com/wp-content/uploads/2024/08/programming-1873854_1280.png" alt="Web Development">
                            <div class="explainer">
                                <h5>Web Development</h5>
                                <div>
                                    Examples of web development work.
                                </div>
                                <div>
                                    <a class="aboutBtn" href="https://wickhammediasolutions.com/web-development/">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="newsprod" x-transition>
                        <i class='bx bx-x-circle close-btn' @click="newsprod = ! newsprod"></i>
                        <div class="wwd-res-item news">
                            <img src="https://wickhammediasolutions.com/wp-content/uploads/2024/08/coffee-1869772_1280.jpg" alt="Coffee">
                            <div class="explainer">
                                <h5>News Products</h5>
                                <div>
                                    Interactives, data-driven journalism, and news products 
                                </div>
                                <div>
                                    <a class="aboutBtn" href="https://wickhammediasolutions.com/news-products/">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

           </div>
        </div>
<?php

$cat = get_categories();
var_dump($cat);

function get_posts_by_categories($categories = [], $post_count = 4) {
    // Setup WP_Query arguments
    $args = [
        'post_type' => 'post',
        'posts_per_page' => $post_count, 
        'category__in' => $categories, // Pass categories as array
        'orderby' => 'date', // Order by post date
        'order' => 'DESC', // Descending order
    ];
    // Run WP_Query
    $query = new WP_Query($args);
    // Check if the query returns any posts
    if ($query->have_posts()) {
        echo '<div class="we-do-ctn">'; // container for posts
        // Loop through the posts
        while ($query->have_posts()) {
            $query->the_post(); 
            get_template_part( 'template-parts/post/we-do-list' );                 
        }
        echo '</div>'; 
        // Reset post data
        wp_reset_postdata();
    } else {
        echo 'No post data available';
    }
}
