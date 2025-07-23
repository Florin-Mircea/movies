<?php
    print   "This is the template file for the 'Genres' taxonomy";

    register_taxonomy('mf_genres', array('mf_movies', 'pages'), array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'genre'),
	));
?>