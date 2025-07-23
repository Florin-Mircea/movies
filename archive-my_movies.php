<?php
	get_header();	
?>

<?php
	if(have_posts())	{   ?>
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

$posts = array(

);

if(count($posts) > 0)	{
    foreach($posts	as	$post)	{
        //echo	$post -> title;	//Daca $post este un obiect
        //sau
        echo	$post['title'];	//Daca $post este un array
        echo	"<h1>" . get_the_title() . "</h1>";			
        echo	"<br/>";
        the_excerpt();
    }	
}


?>

<!-- Început de Loop. -->
    <?php   if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>

<!-- Verificăm dacă postarea este în categoria 3. -->
<!-- Dacă da, div-ul va primi clasa CSS "post-cat-three". -->
<!-- În caz contrar, div-ul va primi clasa "post". -->
    <?php
        the_post();
        get_template_part( 'template-parts/content/content', 'single' );
    ?>
    <?php   if ( in_category( '3' ) ) : ?>
        <div    class="post-cat-three">
    <?php   else : ?>
        <div    class="post">
    <?php   endif;  ?>

<!-- Afi?ăm Titlul postării sub formă de link spre pagina postării. -->
<!-- Permalink este link-ul spre postare, func?ia îl determină automat. -->

    <h2>
        <a  href = "<?php   the_permalink();    ?>" rel = "bookmark"    title = "Permanent Link to <?php    the_title_attribute();  ?>"><?php   the_title();    ?></a>
    </h2>
    <?php

        if( true == $s_post_el_is_on['show_post_author_box'] ) :
            
        endif;
// If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        if (true == $s_post_el_is_on['show_recommend_posts']) :
            echo '<div class="related-post-wrapper">';
        
            echo '</div>';
        endif;

        if(true == $s_post_el_is_on['show_post_navigation']):
            get_template_part( 'contact.php', 'single' );
    
        endif;
    ?>
    <?php	endwhile;	?>
<?php	endif;	?>

<?php
    get_sidebar();
?>

<?php
	get_footer();	
?>