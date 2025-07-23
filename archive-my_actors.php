<?php   $connected = new WP_Query( [
    'relationship' => [
        'id'   => 'movies_to_actors',
        'to' => get_the_ID(),
    ],
    'nopaging' => true,
] );
    if($connected -> have_posts())  {   ?>
    <div    class = "mf_movies">
        <div class = "h5">
            <?php   _e('Movies with ', 'text_domain');    ?>    <?php   the_title();    ?>
        </div>
        <div    class = "row">
            <?php   while($connected -> have_posts())   { 
                $connected -> the_post();
                echo    "<div class='col-12 mb-3 col-sm-6 col-md-4'>";
                get_template_part('template-parts/mf_movies/content-excerpt.php', 'excerpt');
                echo    "</div>";
 
            }   wp_reset_postdata();    ?>
        </div>
    </div>

  <?php }   ?>


<?php
    $movie_actors = array("Alec Baldwin", "Geena Davis", "Annie McEnroe", "Maurice Page");
?>

  <?php if( count($movie_actors) > 0 ) : foreach($movie_actors as $movie_actor) : ?>

    <?php 
        $movie_actor = '';
        $args = array(
            'post_type' => 'book',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );

    $movie_actors_query = new WP_Query( $args );
    endforeach;
endif;
    ?>

    <?php if ( $movie_actors_query->have_posts() ) : 
    endif;        
    ?>

<?php
    do_action('sorting_of_actors', 'sorting_array_of_actors_function');
?>
