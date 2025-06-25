<?php
/** 
 * 

*function farma_register_styles() {
 *   wp_enqueue_style('farma_styles', get_template_directory_uri() . "style.css", array(), '1.0', 'all');
*}

*add_action('wp_enqueue_scripts', )
*?>
*/
wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, '1.1', 'all');

add_theme_support( 'post-thumbnails' );

register_nav_menus(
    array('primary-menu' => 'Main Menu')
);

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	register_sidebar(
		array(
			'id'            => 'event',
			'name'          => __( 'Event Sidebar' ),
			'description'   => __( 'Sidebar to hold all the events taking place.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */

	function wpb_hook_javascript() {
		?>
			<script>
			  function menuOpen() {
				console.log('opening menu');
				let iconParent = document.querySelector('.miniMenu')
				let icon = iconParent.querySelector('i')
				console.log(icon)
				let menu = document.querySelector('.menuList');
				if (window.getComputedStyle(menu).top === "-399px") {
					icon.classList.remove("fa-bars")
					icon.classList.add("fa-times")
					menu.style.top = "83px"
					menu.style.visibility = "visible"
				} else {
					icon.classList.remove("fa-times")
					icon.classList.add("fa-bars")
					menu.style.top = "-399px"
					menu.style.visibility = "hidden"
				}

			  }
			</script>
		<?php
	}
	add_action('wp_head', 'wpb_hook_javascript');

	// Our custom post type function
function create_posttype() {
  
    register_post_type( 'Recommendations',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Recos' ),
                'singular_name' => __( 'reco' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'recos'),
            'show_in_rest' => true,
  
        )
    );

	register_post_type( 'Testimonials',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonials'),
            'show_in_rest' => true,
  
        )
    );
	register_post_type( 'Publications',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Publications' ),
                'singular_name' => __( 'Publication' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'publications'),
            'show_in_rest' => true,
			'supports' => array( 'title', 'custom-fields','thumbnail' ),
        )
    );
	register_post_type( 'Published_Work',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Published Work' ),
                'singular_name' => __( 'Published Work' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Work'),
            'show_in_rest' => true,
			'supports' => array( 'title', 'custom-fields','thumbnail' ),
        )
    );
}


// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );





}
