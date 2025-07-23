
<article	<?php	post_class("border p-4 mb-4");	?>	id="post=<?php	the_ID();	?>">
	<h2	class="post_title">
		<?php	the_title();	?>
	</h2>
	<?php	echo	get_the_author();	?>
	<div>
		<?php	the_excerpt();	?>
	</div>
	<a 	href="<?php	the_permalink();	?>">Read More</a>
</article>

<?php
	
?>

