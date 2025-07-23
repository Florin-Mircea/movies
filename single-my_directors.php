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
                                        'id'   => 'movies_to_directors',
                                        'from' => get_the_ID(),
                                ],
                                'nopaging'     => true,
                                ] );
                                if($connected->have_posts()){
                                echo "<div class='directors'>";
                        
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