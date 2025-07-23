<?php

if ( ! function_exists( 'theme_setup' ) ) {
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which runs
	* before the init hook. The init hook is too late for some features, such as indicating
	* support post thumbnails.
	*/
	function theme_setup() {
	 
		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'text_domain', get_template_directory() . '/languages' );
	 
		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add 'custom-logo' support
		 */
		add_theme_support( 'custom-logo' );
	 
		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );
	 
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'text_domain' ),
			'secondary' => __('Secondary Menu', 'text_domain' )
		) );
	 
		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
	}
   } // theme_setup

   add_action( 'after_setup_theme', 'theme_setup' );		   
		   
	
	function 	myfirsttheme_setup() {
		/*
		 * Load additional block styles.
		 */
		$styled_blocks = ['latest-comments'];
		foreach ( $styled_blocks as $block_name )	{
			$args = array(
				'handle' => "myfirsttheme-$block_name",
				'src' => get_theme_file_uri( "assets/css/blocks/$block_name.css" ),
				$args['path'] = get_theme_file_path( "assets/css/blocks/$block_name.css" ),
			);
			wp_enqueue_block_style( "core/$block_name", $args );
			}
		}
		add_action( 'after_setup_theme', 'myfirsttheme_setup' );		
			
/**
 * Add a sidebar.
 */
function	wpdocs_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar', 'mircea-florin' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Widgets in this area will be shown in footer.', 'mircea-florin' ),
		'before_widget' => '<div id="%1$s" class="widget	col	%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

	function 	add_theme_scripts_and_styles() 	{
			
			wp_enqueue_style( 'slider', get_template_directory_uri() . 'assets/css/main.css', array(), 1.1, 'all' );			
			
			wp_enqueue_style( 'bootstrap-5.0.2', get_template_directory_uri() . '/modules/bootstrap-5.0.2/bootstrap.min.css/', array(), 1.1, 'all' );
			wp_enqueue_style( 'style', get_stylesheet_uri(), array('bootstrap-5.0.2') );
			wp_enqueue_style( 'popper', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'), 1.1, true );
			wp_enqueue_script( 'bootstrap-5.0.2', get_template_directory_uri() . '/modules/bootstrap-5.0.2/js/bootstrap.min.js', array('jquery', 'popper'), 1.1, true );
			wp_enqueue_script( 'main', get_template_directory_uri() . 'js/main.js', array('jquery'), 1.1, true );
			wp_enqueue_script( 'single', get_template_directory_uri() . 'single.php', array(), 1.1, true );
			//wp_enqueue_script( 'nav', get_template_directory_uri() . '/modules/bootstrap-nav-walker.php', array('jquery'), 1.1, true );
		}

	add_action( 'wp_enqueue_scripts', 'add_theme_scripts_and_styles' );

	require	get_template_directory().'/modules/bootstrap-nav-walker.php';

	function	shorting_of_excerpt_hook()	{
		$excerpt = get_the_excerpt();
		//return	word_count($excerpt, '15');
	}

	add_filter('mf_shorting_filter', 'shorting_of_excerpt_hook');

	//create a custom taxonomy name it genres for your posts

	function	create_my_custom_taxonomies()	{
 
		// Add new taxonomy, make it hierarchical like categories
		//first do the translations part for GUI
		
		  $labels = array(
			'name' => _x( 'Genres', 'taxonomy general name' ),
			'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Genres' ),
			'all_items' => __( 'All Genres' ),
			'parent_item' => __( 'Parent Genre' ),
			'parent_item_colon' => __( 'Parent Genre:' ),
			'edit_item' => __( 'Edit Genre' ), 
			'update_item' => __( 'Update Genre' ),
			'add_new_item' => __( 'Add New Genre' ),
			'new_item_name' => __( 'New Genre Name' ),
			'menu_name' => __( 'Genres' ),
		  );    
		
		// Now register the taxonomy
		  register_taxonomy('genres', array('mf_movies'), array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'genre' ),
		  ));
		 
	   }

	add_action( 'init', 'create_my_custom_taxonomies', 0 );



	   //[add_form_7] shortcode
	  function	add_form_7_func( $atts )	{
		   get_template_part( '../../plugins/all-in-one-wp-migration.7.87/all-in-one-wp-migration/loader.php', 'single' );
		}
		  
		add_shortcode( 'add_form_7', 'add_form_7_func' );
		add_action('add_form_7', 'add_form_7_func');
		
		function	create_my_custom_post_types_and_taxonomies()	{
   
		   register_post_type( 'my_movies',	//crearea unui post type se face cu aceasta functie : "register_post_type()". Aceata functie va primi doi parametri : numele cu care va opera post type-ul ('movies') si un array cu anumite caracteristici continute.
	   
			   array(
				   'labels' => array(
						   'name' => __('Movies'),
						   'singular_name' => __('Movie')
				   ),
				   'public' => true,
				   'has_archive' => true,
				   'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions'),
				   'rewrite' => array('slug' => 'movie'),	//'slug'-repr. elem. care va aparea in link.
				   'show_in_rest' => true,
			   )
		   );
	   
		   register_post_type( 'my_actors',	//crearea unui post type se face cu aceasta functie : "register_post_type()". Aceata functie va primi doi parametri : numele cu care va opera post type-ul ('movies') si un array cu anumite caracteristici continute.
	   
			   array(
				   'labels' => array(
						   'name' => __('Actors'),
						   'singular_name' => __('Actor')
				   ),
				   'public' => true,
				   'has_archive' => true,
				   'rewrite' => array('slug' => 'actor'),	//'slug'-repr. elem. care va aparea in link.
				   'show_in_rest' => true,
			   )
		   );
	   
		   register_post_type( 'my_directors',	//crearea unui post type se face cu aceasta functie : "register_post_type()". Aceata functie va primi doi parametri : numele cu care va opera post type-ul ('movies') si un array cu anumite caracteristici continute.
	   
			   array(
				   'labels' => array(
						   'name' => __('Directors'),
						   'singular_name' => __('Director')
				   ),
				   'public' => true,
				   'has_archive' => true,
				   'rewrite' => array('slug' => 'director'),	//'slug'-repr. elem. care va aparea in link.
				   'show_in_rest' => true,
			   )
		   );
	   
		   $labels = array(
			   'name' => _x('my_movies', 'Post Type General Name', 'text_domain'),
			   'singular_name' => _x('my_movie', 'Post Type Singular Name', 'text_domain'),
			   'menu_name' => __('my_movies', 'text_domain'),
			   'parent_item_colon' => __('Parent Movie', 'text_domain'),
			   'all_items' => __('All Movies', 'text_domain'),
			   'view_item' => __('View Movie', 'text_domain'),
			   'add_new_item' => __('Add New Movie', 'text_domain'),
			   'add_new' => __('Add New', 'text_domain'),
			   'edit_item' => __('Edit Movie', 'text_domain'),
			   'update_item' => __('Update Movie', 'text_domain'),
			   'search_item' => __('Search Movie', 'text_domain'),
			   'not_found' => __('Not Found', 'text_domain'),
			   'not_found_in_trash' => __('Not Found In Trash', 'text_domain'),
	   
		   );
	   
		   $args = array(
			   'label' => __('my_movies', 'text_domain'),
			   'description' => __('My text of movies', 'text_domain'),
			   'labels' => $labels,
			   //Features this CPT supports in Post Editor
			   'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions'),
			   //You can associate this CPT with a temporary of custom taxonomy
			   'taxonomies' => array('my_genres'),
			   /*
			   *
			   *Parent and child item. A non-hierarchical 
			   *
			   */
			   'hierarchical' => true,
			   'public' => true,
			   'show_ui' => true,
			   'show_in_menu' => true,
			   'show_in_nav_menus' => true,
			   'show_in_admin_bar' => true,
			   'menu_position' => 5,
			   'can_export' => true,
			   'has_archive' => true,
			   'exclude_from_search' => false,
			   'publicly_queryable' => true,
			   'capability_type' => 'post',
			   'show_in_rest' => true,
	   
		   );
	   
		   register_taxonomy('my_genres', array('my_movies', 'pages'), array(
			   'labels' => array(
				   'name' => __('Genres'),
				   'singular_name' => __('Genre')
			   ),
			   'hierarchical' => true,
			   'show_ui' => true,
			   'show_in_rest' => true,
			   'show_admin_column' => true,
			   'query_var' => true,
			   'rewrite' => array('slug' => 'genre'),
		   ));
	   
		   register_taxonomy('my_years', array('my_movies', 'pages'), array(
			   'labels' => array(
				   'name' => __('Years'),
				   'singular_name' => __('Year')
			   ),
			   'hierarchical' => true,
			   'show_ui' => true,
			   'show_in_rest' => true,
			   'show_admin_column' => true,
			   'query_var' => true,
			   'rewrite' => array('slug' => 'year'),
		   ));
	   
		   //register_post_type('movies', $args);
	   
	   }

		add_action('init', 'create_my_custom_post_types_and_taxonomies');

	function	add_text_in_admin()	{
		echo	"My text in admin";
		}
	
	add_action('admin_notices', 'add_text_in_admin');
	
	//sortare, in ordine alfabetica, a listei de actori
	function	sorting_array_of_actors_function()	{
		$movie_actors = array("Alec Baldwin", "Geena Davis", "Annie McEnroe", "Maurice Page");
		if( count($movie_actors) > 0 ) : foreach($movie_actors as $movie_actor) :
		
			$movie_actor = '';
			$args = array(
				'post_type' => 'book',
				'posts_per_page' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC'
			);
			endforeach;
		endif;
		$movie_actors_query = new WP_Query( $args );
		
		}
	
	add_action('sorting_of_actors', 'sorting_array_of_actors_function');
	
	//sortare, in ordine alfabetica, a listei de regizori
	function	sorting_array_of_directors_function()	{
		$movie_directors = array("James Cameron", "", "", "");
		if( count($movie_directors) > 0 ) : foreach($movie_directors as $movie_director) :
		
			$movie_director = '';
			$args = array(
				'post_type' => 'book',
				'posts_per_page' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC'
			);
			endforeach;
		endif;
		$movie_directors_query = new WP_Query( $args );
		
		}
	
	add_action('sorting_of_directors', 'sorting_array_of_directors_function');
	
	function	my_action_wpcf7_before_send_mail($contact_form, $abort)	{ 
		// to get form id
		   $form_id = $contact_form -> id();
		   // to get submission data $posted_data is asociative array
		  $submission = WPCF7_Submission :: get_instance(); 
		  $posted_data = $submission -> get_posted_data();
		 // It will abort mail function if we assing $abort = true;
	
	}
		   
	// add the action 
	add_action( 'wpcf7_before_send_mail', 'my_action_wpcf7_before_send_mail', 10, 2 ); 

	function	wpb_add_preloader()	{
		echo	'<div id="wptime-plugin-preloader"></div>';
	}
	
	add_action('wp_body_open', 'wpb_add_preloader');

	add_action( 'mb_relationships_init', function() {
    MB_Relationships_API::register( [
        'id'   => 'movies_to_actors',
        'from' => [
            'post_type' => 'my_movies',
            'meta_box'    => [
                'title' => 'Actors',
            ],
        ],
        'to'   => [
            'post_type'   => 'my_actors',
            'meta_box'    => [
                'title' => 'Movies',
            ],
        ],
    ] );

    MB_Relationships_API::register( [
        'id'   => 'movies_to_directors',
        'from' => [
            'post_type' => 'my_movies',
            'meta_box'    => [
                'title' => 'Directors',
            ],
        ],
        'to'   => [
            'post_type'   => 'my_directors',
            'meta_box'    => [
                'title' => 'Movies',
            ],
        ],
    ] );
} );
	
	function    runtime_prettier($length = 0)  {
		if($length == 0 ||  !is_numeric($length))    {
			return  'No runtime data';
		}   else if($length == 1) {
			return  $length." minute";
		}   else if($length > 1 && $length < 60)    {
			return  $length." minutes";
		}   else    {
			$hours = intval($length/60);
			$minutes = $length%60;
			
			if($hours == 1 && $minutes == 1)    {
				return  $hours." hour ".$minutes." minute";
			}   else if($hours == 1 && $minutes != 1)   {
				return  $hours." hour ".$minutes." minutes";
			}   else if($hours != 1 && $minutes == 1)    {
				return  $hours." hours ".$minutes." minute";
			}   else    {
				return  $hours." hours ".$minutes." minutes";
			}
			
	
			//return  $host.( )" hours".$minutes.() "   ";
		}        
	
	};

	add_action('runtime', 'runtime_prettier');

	function	check_old_movie($year = 0)	{
		if($year < (date("Y") - 40) && $year > 0)	{
			return	date("Y");
		} else {
			return	false;
		}
	}

	function	mytheme_custom_excerpt_length($length)	{
		return	15;
	}

	add_action('excerpt_length', 'mytheme_custom_excerpt_length', 999);

	function	mytheme_custom_excerpt_more($more)	{
		return	'...';
	}

	add_action('excerpt_more', 'mytheme_custom_excerpt_more');


	// Order custom post types alphabetically
	function	owd_post_order( $query ) {
    	if (($query->is_post_type_archive(array('my_directors', 'my_actors')) && $query->is_main_query() )	{
    		$query->set( 'orderby', 'title' );
    		$query->set( 'order', 'ASC' );
    	}
	}

	add_action( 'pre_get_posts', 'owd_post_order' );	
 
	function	my_custom_mail_sent($contact_form)	{
     	// to get form id
     	//$form_id = $contact_form->id();
     	// to get submission data
    	// $submission = WPCF7_Submission::get_instance(); 
		//$posted_data = $submission->get_posted_data();
		setcookie("form_submitted", 1, time() + 3600*24*365);
	}

	add_action('wpcf7_mail_sent', 'my_custom_mail_sent' );
	
/**
 * Required and Recommended Plugins
 */
require get_template_directory() . '/inc/plugins/tgm/required-plugins.php';
/**
 * Register widgets
 */
require get_template_directory() . '/inc/register-widgets.php';
/**
 * Register widgets
 */
require get_template_directory() . '/inc/meta-fields.php';
/**
 * Register Block Style
 */
require get_template_directory() . '/inc/reg-block-style.php';
/**
 * Enqueue scripts
 */
require get_template_directory() . '/inc/enqueue-scripts.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Electronic Store Comment Template.
 */
require get_template_directory() . '/inc/comment-template.php';

/**
 * Checkout Fields
 */
require get_template_directory() . '/inc/checkout-fields.php';

/**
 * Kirki Plugin Activation
 */
require get_template_directory() . '/inc/plugins/kirki/kirki.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Sidebar Control
 */
require get_template_directory() . '/inc/sidebar-control.php';

/**
 * Related Posts.
 */
require get_template_directory() . '/inc/recomended-posts.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Welcome Notice
 */
require get_template_directory() . '/inc/welcome-notice.php';

/**
 * Go Pro
 */
require get_template_directory() . '/inc/customizer/go-pro/class-customize.php';

/**
 * Plugins Installer
 */
require get_template_directory() . '/inc/plugins-installer.php';

/**
 * WooCommerce Medifications
 */
if ( class_exists( 'woocommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce-modification.php';
}

?>