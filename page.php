<?php
    get_header();
?>

<?php
	if(have_posts())	{
		while(have_posts())	{
            the_post();
            ?>
            <h2>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
            <?php
            the_title();	//Aceasta linie de cod va afisa titlul postarii            
            ?>
            <article	<?php	post_class("border p-4 mb-4");	?>	id="post=<?php	the_ID();	?>">
	            <h2	class="post_title">
		            <?php	the_title();	?>
	            </h2>
	            <span>
		            <?php	echo	get_the_author();	?>
	            </span>
	            <span>
		            <?php	echo	get_post_time('H:i, d.m.Y');	?>
	            </span>
	            <div    class="post-content">
		            <?php	the_content();	?>
	            </div>
	
            </article>
            <?php

			echo	"<h1>".get_the_title()."</h1>";			
            echo	"<br/>";
            the_content();
			the_excerpt();

		}	//end while
	}	//end if
?>

<?php
    get_footer();
?>