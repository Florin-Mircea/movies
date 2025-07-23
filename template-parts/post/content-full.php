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
	<div>
		<?php	the_content();	?>
	</div>
	
</article>

