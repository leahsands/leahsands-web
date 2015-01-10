<?php

	//Set the content width based on the theme's design and stylesheet.
	 if ( ! isset( $content_width ) )
		$content_width = 600; /* pixels */


	if ( ! function_exists( 'gp_theme_setup' ) ) :
	function gp_theme_setup() {

		//Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		//Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );

		//Register A WordPress Nav Menu
		register_nav_menus( array(
			'primary' => ( 'Primary Menu' ),
		) );

	}
	endif;
	add_action( 'after_setup_theme', 'gp_theme_setup' );

	// CUSTOM ADMIN LOGIN HEADER LOGO

	function my_custom_login_logo()
	{
	    echo '<style  type="text/css"> h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/img/logo.png)  !important; } </style>';
	}
	add_action('login_head',  'my_custom_login_logo');


	//Register A Sidebar Widget
	function gp_widgets_init() {
	    register_sidebar( array(
	        'name' => ( 'Right Sidebar' ),
	        'description'   => 'The Right sidebar',
	        'class'         => '',
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h6 class="widget-title"> ',
	        'after_title' => ' </h6>',
	    ) );
	}
	add_action( 'widgets_init', 'gp_widgets_init' );

	//Register Excerpt for Blog Posts
	class Excerpt {

	  // Default length (by WordPress)
	  public static $length = 55;

	  // So you can call: my_excerpt('short');
	  public static $types = array(
	      'short' => 20,
	      'regular' => 40,
	      'long' => 70
	    );

	  /**
	   * Sets the length for the excerpt,
	   * then it adds the WP filter
	   * And automatically calls the_excerpt();
	   *
	   * @param string $new_length 
	   * @return void
	   * @author Baylor Rae'
	   */
	  public static function length($new_length = 55) {
	    Excerpt::$length = $new_length;

	    add_filter('excerpt_length', 'Excerpt::new_length');

	    Excerpt::output();
	  }

	  // Tells WP the new length
	  public static function new_length() {
	    if( isset(Excerpt::$types[Excerpt::$length]) )
	      return Excerpt::$types[Excerpt::$length];
	    else
	      return Excerpt::$length;
	  }

	  // Echoes out the excerpt
	  public static function output() {
	    the_excerpt();
	  }

	}

	//Enqueue all the required stylesheet and javascript files
	function gp_load_style_scripts() {
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_register_style('gumby', get_template_directory_uri().'/css/gumby.css','1.0', 'all');


	    wp_enqueue_style( 'gumby' );
		wp_enqueue_style( 'style', get_stylesheet_uri() );

	}
	add_action( 'wp_enqueue_scripts', 'gp_load_style_scripts' );

	
 	//add custom dash icons
	function add_menu_icons_styles(){
	?>
	 
	<style>
	#adminmenu .menu-icon-events div.wp-menu-image:before {
	  content: "\f161";
	}
	</style>
	 
	<?php
	}
	add_action( 'admin_head', 'add_menu_icons_styles' );


	//Register Custom Posts
	add_action( 'admin_init', 'my_admin' );

	function my_admin() {
	}

	add_action( 'init', 'create_portfolio' );

	function create_portfolio() {
	    register_post_type( 'portfolio',
	        array(
	            'labels' => array(
	                'name' => 'Portfolio',
	                'singular_name' => 'Portfolio Piece',
	                'add_new' => 'Add New',
	                'add_new_item' => 'Add Piece',
	                'edit' => 'Edit',
	                'edit_item' => 'Edit Piece',
	                'new_item' => 'New Piece',
	                'view' => 'View',
	                'view_item' => 'View Portfolio Piece',
	                'search_items' => 'Search Pieces',
	                'not_found' => 'No Piece found',
	                'not_found_in_trash' => 'No Pieces found in Trash (PTL)',
	                'parent' => 'Parent Portfolio Piece'
	            ),
	 
	            'public' => true,
	            'menu_position' => 2,
	            'supports' => array( 'title', 'thumbnail' ),
	            'taxonomies' => array( '' ),
	            'menu_icon' => 'dashicons-format-gallery',
	            'has_archive' => true,
	            'taxonomies' => array('category')
	        )
	    );
	}

	add_action('init', 'portfolio_add_default_boxes');
 
	function portfolio_add_default_boxes() {
	    register_taxonomy_for_object_type('category', 'demo');
	}


	add_filter( 'template_include', 'include_template_function', 1 );

	function include_template_function( $template_path ) {
	    if ( get_post_type() == 'portfolio' ) {
	        if ( is_single() ) {
	            // checks if the file exists in the theme first,
	            // otherwise serve the file from the plugin
	            if ( $theme_file = locate_template( array ( 'single-portfolio.php' ) ) ) {
	                $template_path = $theme_file;
	            } else {
	                $template_path = plugin_dir_path( __FILE__ ) . '/single-portfolio.php';
	            }
	        }
	    }
	    return $template_path;
	}

	//Walker Class - This add support for the dropdown menu in the Gumbyframework
	class Walker_Page_Custom extends Walker_Nav_menu{

		function start_lvl(&$output, $depth=0, $args=array()){
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<div class=\"dropdown\"><ul>\n";
		}

		function end_lvl(&$output , $depth=0, $args=array()){
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul></div>\n";
		}
	}