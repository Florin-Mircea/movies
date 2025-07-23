<?php
	get_header();	
?>

<?php
	$posts = array(

	);

	if(count($posts) > 0)	{
		foreach($posts	as	$post)	{
			echo	$post -> title;	//Daca $post este un obiect
			//sau
			echo	$post['title'];	//Daca $post este un array
			echo	"<h1>" . get_the_title() . "</h1>";			
			echo	"<br/>";
			the_excerpt();
		}	
	}
?>

<?php	get_template_part("template-parts/navigation/navigation-top", "top");	?>

<?php
	if(have_posts())	{
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
				<?php	get_template_part("template-parts/post/content-excerpt", "excerpt");	?>
				<div>
					<?php	the_excerpt();	?>
				</div>
			</article>
			<?php
			the_excerpt();	//Descrierea scurta
		}
		echo	paginate_links()	;
	}	
?>

<nav>
<?php
	$pagination = paginate_links(array(
		'base' => get_pagenum_link(1) . '%_%',
		'format' => '/page/%#%',
		'current' => $current_page,
		'total' => $total_pages,
		'prev_text'    => __('�'),
		'next_text'    => __('�'),
		'type' => 'list'
	));
	echo "<nav>".$pagination."</nav>";
?>
</nav>


<div	id = "primary"	class = "content-area">
	<main	id = "main"	class = "site-main">
	<?php
		get_sidebar();		
	?>
	</main><!-- #main -->
</div>		

<?php    
	echo	apply_filters('mf_shorting_filter', get_the_excerpt());
?>      
			<!-- �nceput de Loop. -->
			<?php	if(have_posts()) : while(have_posts()) : the_post();	?>

			<!-- Verificam daca postarea este �n categoria 3. -->
			<!-- Daca da, atunci div-ul va primi clasa CSS "post-cat-three". -->
			<!-- �n caz contrar, div-ul va primi clasa "post". -->
			<?php
				the_post();
				get_template_part('template-parts/content/content-single', 'single' );
			?>
			<?php	if(in_category('3')) :	?>
				<div	class = "post-cat-three">
			<?php	else :	?>
				<div	class = "post">
			<?php	endif;	?>

			<!-- Afi?am Titlul postarii sub forma de link spre pagina postarii. -->
			<!-- Permalink este link-ul spre postare, func?ia �l determina automat. -->

			<h2>
				<a	href = "<?php	the_permalink();	?>"	rel = "bookmark"	title = "Permanent Link to <?php	the_title_attribute();	?>"><?php	the_title();	?></a>
			</h2>
			<?php			
			the_title();
			// If comments are open or we have at least one comment, load up the comment template.
			if(comments_open() || get_comments_number()) :
				comments_template();
			endif;	
			the_excerpt();
			?>
			<?php	endwhile;	?>
		<?php	endif;	?>

			<!-- Afi?am data (November 16th, 2009 format) -->
			<!-- ?i link spre alte postari ale autorului. -->

			<small><?php	the_time('F jS, Y');	?> by <?php	the_author_posts_link();	?></small>

			<!-- Afi?am con?inutul (textul) postarii �ntr-un div. -->

			<div class="entry">
				<?php	the_content();	?>
			</div>

			<?php	do_action('init', 'create_my_custom_post_type_and_taxonomies');	?>
		</main>
</div>

<?php				
    $movie = array("id" => "", "title" => "", "runtime" => "190");			
        foreach($movie	as	$itemKey => $item)	{	?>
			<?php
				print_r($item);
				echo	"<br/>";
				//print_r($itemKey."	".$item);				
				echo	"<br/>";
            ?>
            <div class="card" style="">
				
					<div	id="show-runtime"	class="card-body">
						<p	class="card-id">	Id:	<?php	echo	$movie["id"];		?></p>
						<p class="card-text">	Title:	<?php	echo	$movie["title"];	?></p>						
						<p class="card-text">	Runtime:	<strong><?php	echo	runtime_prettier('190'); //echo	$movie["runtime"];	?></strong></p>											
						<button	id="">Runtime</button>								
					</div>
			</div>
            <?php   

			?>					

		    <?php																	
				}					
		    ?>			


<?php
	get_footer();	
?>
