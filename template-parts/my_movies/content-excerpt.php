<div	class = "col-12	col-md-6	col-lg-4	mb-4"	id = "movie	<?php	echo	get_the_ID();	?>">
			<div	class = "card">
				
				<div	class = "card-body">
					<h5	class = "card-title"><?php	the_title();	?></h5>
					<p	class = "card-text">
					<?php	the_excerpt();	?>
						<?php
							echo	substr($movie['plot'], 0, 100) .	"...";
						?>
					</p>
					<a	href = "<?php	the_permalink();	?><?php	echo	get_the_ID();	?>"	class = "btn	btn-primary">Read more</a>
				</div>
			</div>
</div>

    <div class="card" style="">
			<a	href=""><img src="" class="card-img-top" alt=""></a>
			<div class="card-body">
				<p	class="card-id">	<?php	echo	get_the_ID();	?></p>
				<p class="card-text">	<?php	the_title();	?></p>
				<p class="card-text">	<?php	echo	$movie["year"];	?></p>
				<p class="card-text">	<?php	echo	$movie["runtime"];	?></p>
				
				<p class="card-text">	<?php	echo	$movie["director"];	?></p>
				<p class="card-text">	<?php	echo	$movie["actors"];	?></p>
				<p class="card-text">	<?php	echo	$movie["plot"];	?></p>
				<h5 class="card-text"><?php	echo	$movie["posterUrl"];	?></h5>
				<p class="card-text"><?php	echo	$movie["plot"];	?></p>							
				
			</div>
	</div>

	<div class="card" style="">
		<a	href="movie.php?movie_id=<?php	echo	get_the_ID();	?>"><img src="" class="card-img-top" alt=""></a>
			<div class="card-body">
												
			</div>
	</div>

<?php

?>