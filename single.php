<div    class = "header"    id = "header">
    
    <?php   get_header();   ?>
</div>

	

  
			<!-- Început de Loop. -->
			<?php	if(have_posts()) : while(have_posts()) : the_post();	?>

			<!-- Verificăm dacă postarea este în categoria 3. -->
			<!-- Dacă da, atunci div-ul va primi clasa CSS "post-cat-three". -->
			<!-- În caz contrar, div-ul va primi clasa "post". -->
			<?php
				the_post();
				get_template_part('template-parts/content/content', 'single' );
			?>
			<?php	if(in_category('3')) :	?>
				<div	class = "post-cat-three">
			<?php	else :	?>
				<div	class = "post">
			<?php	endif;	?>

			<!-- Afi?ăm Titlul postării sub formă de link spre pagina postării. -->
			<!-- Permalink este link-ul spre postare, func?ia îl determină automat. -->

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

			<!-- Afi?ăm data (November 16th, 2009 format) -->
			<!-- ?i link spre alte postări ale autorului. -->

			<small><?php	the_time('F jS, Y');	?> by <?php	the_author_posts_link();	?></small>

			<!-- Afi?ăm con?inutul (textul) postării într-un div. -->

			<div class="entry">
				<?php	the_content();	?>
			</div>

			<?php	do_action('init', 'create_my_custom_post_type_and_taxonomies');	?>
		</main>
</div>



<div    class = "sidebar"    id = "sidebar">
   
    <?php   get_sidebar();  ?>
</div>


<div    class = "footer"    id = "footer">
    
    <?php   get_footer();   ?>
</div>

