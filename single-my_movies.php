<?php
	get_header();
?>

<?php
	$runtime = get_field("my_runtime");

?>

<div id="primary" class="content-area">
	    <main id="main" class="site-main">

        <!-- Început de Loop. -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>        

				<article>
						<h1	class="title"><?php	the_title();	?></h1>							
						<div	class="row	">
							<div	class="col-md-3">
								<?php	if(has_post_thumbnail())	{	?>
									<img	src="<?php	echo	get_the_post_thumbnail_url();	?>"	alt=""	/>
								<?php	}	else	{	?>

								<?php	}	?>
							</div>
							<div	class="col-md-9">
									<?php	echo	runtime_prettier(get_field('runtime'));	?>
							</div>
							<div>
									<?php	$genres = get_the_terms(get_the_ID(), 'my_genres');	
									$i = 0;
									foreach($genres as $genre)	{
									?>
										<?php	if($i !== 0)	echo	'/'	;?><a href="<?php	echo	get_the_permalink($genre->term_id)) ?>"><?php	echo	$genre->name);	?></a>
									<?php	$i++;	} ?>
							</div>
							<div>
									<?php	$years = get_the_terms(get_the_ID(), 'my_years');	
									if(count($years))	{
										$year = $years[0];
										?>
											<a href="<?php	echo	get_term_link($year->term_id)) ?>"><?php	echo	$year->name);	?></a>
										<?php
										}
									$i = 0;
									?>
							</div>
							
										<?php
											
											$connected = new WP_Query( [
												'relationship' => [
														'id'   => 'movies_to_actors',
														'from' => get_the_ID(),
												],
												'nopaging'     => true,
												] );
												if($connected->have_posts()){
												echo "<div class='actors'>";
										
												echo __('Actors', 'text_domain').": ";
												
												$i = 0; 
												while ( $connected->have_posts() )	{ 
														$connected->the_post();
														
														if($i !== 0)	{echo ", ";}
														echo "<a href='". get_the_permalink() ."'>". get_the_title() ."</a>";
														
														$i++; 
													} 
												wp_reset_postdata(); 
												unset($i); 
												
												echo "</div>"; // div class="actors"
											}
										unset($connected);

										?>
							
						</div>
					</article>

        <!-- Afișăm Titlul postării sub formă de link spre pagina postării. -->
        <!-- Permalink este link-ul spre postare, funcția îl determină automat. -->
    
        	<?php 	echo	"The permalink is: " . the_permalink();	?> 
					<?php 	echo	"<br/>"; ?> 
					<?php 	echo	"The title attribute: " . the_title_attribute(); ?>
					<?php 	echo	"<br/>"; ?> 
					<?php 	echo	"The post: " . the_post(); ?>
					<?php 	echo	"<br/>"; ?> 
					<?php 	echo	"The title: " . the_title(); ?>
          <?php 	echo	"<br/>"; ?> 
					<?php
						$res = has_post_thumbnail(get_field('posterUrl'));
						if(isset($res)	{
							echo	"Poster Url: " . get_field('posterUrl', $post => the_ID());
						}
					?>
					<?php 	echo	"The year: " . get_field('year', $post => the_ID()); ?>
					<?php 	echo	"<br/>"; ?> 
					<?php 	echo	"The runtime: " . get_field('runtime', $post => the_ID()); ?>
					<?php 	echo	"<br/>"; ?> 
					<?php 	echo	"Genres: " . get_field('genres', $post => the_ID()); ?>
					<?php 	echo	"<br/>"; ?> 
					<?php 	echo	"Director: " . get_field('director', $post => the_ID()); ?>
					<?php 	echo	"<br/>"; ?> 
					<?php 	echo	"Actors: " . get_field('actors', $post => the_ID()); ?>
					<?php 	echo	"<br/>"; ?> 
					<?php 	echo	"Plot: " . get_field('plot', $post => the_ID()); ?>

          <?php   
            echo    "<br/>"; 
            the_terms($post => ID, 'my_genres', 'Genres', ', ', ' ');
          ?>

					<p	class="green-title">			
						Duration : 				
							<span	id="movie-runtime-toggler">

							</span>
							<span	id="movie-runtime"	data-runtime="<?php	echo	$runtime;	?>">
								<?php	echo	$runtime;	?> 
							</span> min.
					</p>

					
        <?php   endwhile;       ?>
    <?php   endif;    ?>
        
    <!-- Afișăm data (November 16th, 2009 format) -->
    <!-- și link spre alte postări ale autorului. -->

    <small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>

    

        <div class="entry">
            <?php the_content(); ?>
						<?php	
							echo	"<br/>";
							echo	"The time" . get_field('time', $post => the_ID());
							echo	"<br/>";
							echo	"The year" . get_field('year', $post => the_ID());
							echo	"<br/>";
							echo	"The time" . get_post_meta($post => the_ID(), 'runtime', true);
						?>
        </div>

        <!-- Afișăm categoriile din care face parte postarea, separate prin virgulă. -->

        <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
</div> <!-- închidem primul div (cel din IF-ul pentru categoria 3) -->

<?php				
        $movie = array("id" => "1", "poster" => "<a href='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpvHkcb9rYGubIUm01i7L8tRPKmEJOow7RIZFFsZcVxIBOk2e-CApdv9oAY41lLmlb90w&usqp=CAU'><img src='images/betlejuice poster'/></a>", "title" => "Beetlejuice", "year" => "1988", "runtime" => "92", "genres" => "Comedy", "Fantasy", "director" => "Tim Burton", "actors" => "Alec Baldwin, Geena Davis, Annie McEnroe, Maurice Page", "plot" => "A couple of recently deceased ghosts contract the services of a \"bio-exorcist\" in order to remove the obnoxious new owners of their house.", "posterUrl" => "<a href='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpvHkcb9rYGubIUm01i7L8tRPKmEJOow7RIZFFsZcVxIBOk2e-CApdv9oAY41lLmlb90w&usqp=CAU'>Betlejuice Poster</a>");			
            foreach($movie	as	$itemKey => $item)	{	?>
					<?php
						print_r($item);
							echo	"<br/>";
						//print_r($itemKey."	".$item);				
						echo	"<br/>";
                    ?>
            <div class="card" style="">
							<a	href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpvHkcb9rYGubIUm01i7L8tRPKmEJOow7RIZFFsZcVxIBOk2e-CApdv9oAY41lLmlb90w&usqp=CAU"><img src="images/betlejuice poster.png" class="card-img-top" alt=""></a>
							<div class="card-body">
								<p	class="card-id">	Id:	<?php	echo	$movie["id"];		?></p>
								<p class="card-text">	Title:	<?php	echo	$movie["title"];	?></p>
								<p class="card-text">	Year:	<?php	echo	$movie["year"];		?></p>
								<p class="card-text">	Runtime:	<strong><?php	echo	runtime_prettier('194'); //echo	$movie["runtime"];	?></strong></p>
								<p class="card-text">	Genres:	<?php	echo	$movie["genres"];	?></p>
								<p class="card-text">	"Director:	<?php	echo	$movie["director"];	?></p>
								<p class="card-text">	Cast:	<ul><li><?php	echo	$movie["actors"];	?></li></ul></p>
								<p class="card-text">	Plot:	<?php	echo	$movie["plot"];		?></p>
								<h5 class="card-text">Poster Url:	<?php	echo	$movie["posterUrl"];	?></h5>										
														
							</div>
						</div>              				

		    <?php																	
				}					
		    ?>			

<?php

	$connected = new WP_Query([
		'relationship' => [
				'id' => 'movies_to_actors',
				'from' => get_the_ID(),
			],
			'nopaging' => true,
	]);
	if($connected -> have_posts())	{
		echo	"<div class='actors'>";
		echo	__('Actors', 'text_domain') . ": ";
	
		$i = 0; 
		while($connected -> have_posts())	{ 
			$connected->the_post();			
			if($i !== 0)	{
				echo	", ";
			}
			echo	"<a href='". get_the_permalink() ."'>". get_the_title() ."</a>";			
			$i++; 
		} 
		wp_reset_postdata(); 
		unset($i); 
	
		echo	"</div>"; // div class="actors"
	}
	unset($connected); 

	echo	"<br/>";

	$connected = new WP_Query([
		'relationship' => [
				'id' => 'movies_to_directors',
				'from' => get_the_ID(),
			],
			'nopaging' => true,
	]);
	if($connected -> have_posts())	{
		echo	"<div class='directors'>";
		echo	__('Directors', 'text_domain') . ": ";
	
		$i = 0; 
		while($connected -> have_posts())	{ 
			$connected -> the_post();			
			if($i !== 0)	{
				echo	", ";
			}
			echo	"<a href='". get_the_permalink() ."'>". get_the_title() ."</a>";			
			$i++; 
		} 
		wp_reset_postdata(); 
		unset($i); 
	
		echo	"</div>"; // div class="actors"
	}
	unset($connected); 

?>

<?php
	get_footer();
?>
