<?php
	get_header();	
?>

<?php
	if(have_posts())	{   ?>
        <h1>
            <?php   echo    single_term_title();    ?>
        </h1>
        <div    class="row  movies-list">

        </div>
        <?php
		while(have_posts())	{
			the_post();
			echo	"<h1><a	href=" . get_the_permalink() . ">" . get_the_title() . "</a></h1>";	//Aceasta linie de cod va afisa titlul postarii
			echo	"<br/>";
			the_title();
			?>
			<article	<?php	post_class();	?>	id="post=<?php	the_ID();		?>"	>
				<h2	class="post-title">
					<?php	the_title();	?>
				</h2>
				<?php	get_template_part("template-parts/my_movies/content-excerpt", "excerpt");	?>
				<div>
					<?php	the_excerpt();	?>
				</div>
			</article>
            <nav>
                <?php
                    echo	paginate_links();
                ?>
            </nav>
			<?php
			the_excerpt();	//Descrierea scurta
		}
		
	}	
?>

<?php

register_taxonomy('my_genres', array('my_movies', 'pages'), array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'genre'),
));

register_taxonomy('my_years', array('my_movies', 'pages'), array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'year'),
));

?>

<?php
    get_sidebar();
?>

<?php
	get_footer();	
?>