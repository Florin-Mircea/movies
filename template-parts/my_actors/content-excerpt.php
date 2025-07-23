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