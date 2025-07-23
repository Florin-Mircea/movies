<?php
	get_header();
?>

<h1>	
	Search results for :	<?php	echo	$_GET['S'];	?>
</h1>

<?php
	if(have_posts())	{
		while(have_posts())	{
			//the_title();
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
				<?php	get_template_part("template-parts/post/content-full", "full");	?>
				<div>
					<?php	the_excerpt();	?>
				</div>
			</article>
			<?php
			the_excerpt();	//Descrierea scurta
		}
	}
?>

<?php
	get_footer();
?>