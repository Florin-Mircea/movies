<?php   $connected = new WP_Query( [
    'relationship' => [
        'id'   => 'movies_to_directors',
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
    do_action('sorting_of_directors', 'sorting_array_of_directors_function');
?>