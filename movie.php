<?php
				$movies_filtered = array_filter($movies, 'find_movie_by_id');

				if(isset($movies_filtered)	&&	$movies_filtered)	{
					$movie = reset($movies_filtered);
				}
				var_dump($movie);		
			?>			

		<h1><?php	echo	$movies[$_GET['movie_id']['title']];	?></h1>
		<h1><?php	//echo	$movies;	?></h1>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  			<div class="container-fluid">
    			<a class="navbar-brand" href="index.php">Home</a>
    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      				<span class="navbar-toggler-icon"></span>
    			</button>
    			<div class="collapse navbar-collapse" id="navbarSupportedContent">
      				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<?php	
						echo	basename(__FILE__, '.php'); "<br/>";
						echo	basename($_SERVER['PHP_SELF']);
						foreach($menu_items	as	$menu_item)	{	?>
							<li class="nav-item">
          						<a class="nav-link <?php	if(basename($_SERVER['PHP_SELF']) == $menu_item['url'])	echo	'active';	?>" aria-current="page" href="<?php	echo	$menu_item['url'];	?>"><?php	echo	$menu_item['title'];	?></a>
        					</li>
						<?php	}	?>
        				<li class="nav-item">
          					<a class="nav-link active" aria-current="page" href="index.php">Home</a>
        				</li>
        				<li class="nav-item">
          					<a class="nav-link" href="index.php">Home</a>
        				</li>
        				<li class="nav-item dropdown">
          					<a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            					Home
          					</a>
          					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            					<li><a class="dropdown-item" href="index.php">Home</a></li>
            					<li><a class="dropdown-item" href="index.php">Home</a></li>
            					<li><hr class="dropdown-divider"></li>
            					<li><a class="dropdown-item" href="index.php">Home</a></li>
          					</ul>
        				</li>
        				<li class="nav-item">
          					<a class="nav-link disabled" href="index.php" tabindex="-1" aria-disabled="true">Home</a>
        				</li>
      				</ul>
      				<form class="d-flex">
        				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        				<button class="btn btn-outline-success" type="submit">Home</button>
      				</form>
    			</div>
  			</div>
		</nav>
		
		
		<section    class="content">    

		<?php    
    
    $revMessages = showRevMessages();
    if(count($revMessages) == 0)    {
				print   'The revMess list is empty!';    
		?>
			<script>
				alert("Fii primul care lasa un review pentru acest film");
			</script>
		<?php    
    } else {
		?>
		<table  width="500" border="1">
    	<thead>
    	<tr>
        	<th>Name:</th>        
        	<th>E-mail:</th>
        	<th>Rev Mess:</th>        
        	<th></th>
    	</tr>
    	</thead>
    	<tbody>
        	<?php
        	foreach ($revMessages as $revMessage) {
            	print   "<tr>";
                	print   "<td>".$revMessage['name']."</td>";
                	print   "<td>".$revMessage['email']."</td>";
                	print   "<td>".$revMessage['revMess']."</td>";                              
                	print   "<td>";
        	?>
            	<a  href = "index.php?movieId = <?php print   $revMessage['id']; ?>">View</a>
        	<?php
            	print   "</td>";
            	print   "</tr>";            
        	}
			?>        
		</tbody>

			<?php
        		}                
			?>    
		</table>

		<form   method="post"   action="#"  id="form"	>
    		<table>
        	<tr>
            	<td>Name</td>
            	<td><input  type="text" name = "name" id="name"   /></td>
            	<td id="nameError"></td>
        	</tr>        
        	<tr>
            	<td>Email</td>
            	<td><input  type="text" name = "email" id="name"   /></td>            
        	</tr>
				<tr>
            	<td>Review Message</td>
            	<td><input  type="textarea" name = "revMess" id="revMess"   /></td>            
        	</tr>
        	<tr>         
				<td><button	type="submit"	name="agreement"	value="Sunt de acord cu procesarea datelor cu caracter personal">Sunt de acord cu procesarea datelor cu caracter personal</button></td>
            	<td><input  type="submit"   name = "revRegistering"  value="Register"    onclick="verifying()"  /></td>            
        	</tr>        
    		</table>
		</form>

		<?php
			if(isset($_POST['revRegistering'])	&& isset($_POST['agreement']))    {               
        		$name = $_POST['name'];
        		$email = $_POST['email'];    
        		$revMess = $_POST['revMess'];
        		$revRegister =  revRegistering($name, $email, $revMess);       
        		if($revRegister)    {
				?>
					<script>
						alert("The review sent successfully!");
					</script>
				<?php
            		print   'Registered message successfully!';
        		} else {
            		print   'Error to registering!';
        		}                                    
    		}    

		?>

		<?php
			showRevMessagesWithoutEmail();
		?>

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
				$_GET['movie_1'] = "http://mircea-florin.local/wp-admin/demo/movie_1.php";
				$movie_1 = $_GET['movie_1'];

				/*
				function	movie_filter($movie)	{
					return($movie & 1);
				}
				*/

			  //print_r(array_filter($movies, "movie_filter($movie)"));
			  
			?>

		<?php																																									
			$movie_actors = array("Alec Baldwin", "Geena Davis", "Annie McEnroe", "Maurice Page");
			foreach($movie_actors	as	$actors)	{	?>
				<?php	$i;	$id; ?>
					<div class="col">
						<div class="p-3 border bg-light">
									
						</div>
				</div>							

				<div class="card" style="">
					<a	href=""><img src="" class="card-img-top" alt=""></a>
					<div class="card-body">											
						<p class="card-text">	
							<ul>
								<?php	

								print	"<li>";								
								print_r($actors);	
								print	"</li>";
								
								?>
							</ul>
						</p>								
		
					</div>
				</div>
			<?php
				require_once    'includes/archive-movie.php'; 														
			?>
		</div>
</div>

		<?php																	
			}					
		?>			
		<?php
			foreach($movie_actors as $actors)	{
		?>
				<ul>
					<li><?php	print_r($actors);	?></li>
				</ul>
		<?php
			}
		?>

			<form	action = "#"	method = "post"	>

				<input	type = "hidden"	name = "check"	value = "1"	/>
				<input	type = "submit"	name = "fav"	value = "Favorite"	/>
				<button	type = "submit"	name = "fav"	value = "Favorite"	>Favorite</button>
			</form>

			<?php

				if(isset($_POST)	&&	!empty($_POST))	{

					if(isset($_POST['fav'])	&&	!empty($_POST['fav']))	{						
						//header("location : add_movie.php");
						$_GET['movie_1'] = "http://mircea-florin.local/wp-admin/demo/movie_1.php#";
						//setcookie($_GET['movie'], "1 an", time() + 3600*24*365);
						print	"The value is"	.$_POST['check'].	"!";
					}
				}

				if(isset($_COOKIE['movie_1']))	{
					echo	"movie_1". $_COOKIE['movie_1']."<br/>";
				}
			?>
			<?php
				if(isset($movie)	&&	$movie)	{
			?>
				<div	class="row">
					<div	class="col-md-4	col-lg-3	mb-4">
						alt="<?php	echo	$movie['title'];	?>"	/>
					<a>	</a>
					</div>
					<div	class="col-md-8 col-lg-9">
						<?php	$old_movie = check_old_movie($movie['year']);	?>
					</div	class = "row	justify-content-between">
						<div	class = "col-auto">
							<div	class="h3">
								<?php	echo	$movie['year'];	?>
								<?php	if($old_movie)	{	?>
									<span	class="badge	bg-secondary">Old Movie:<?php		echo	$old_movie;	?>years </span>
								<?php	}	?>
							</div>
						<div	class = "col-auto	text-end">
									<?php
										$fav_movies = array();
										//$fav_stats = array();
										$movie_favorites_filename = './assets/movie-favorites.json';
										$fav_stats = json_decode(file_get_contents($movie_favorites_filename), true);	

										
										if(!$fav_stats)	$fav_stats = array();

										//$movie_favorites = json_decode(file_get_contents('../assets/movie-favorites.json'), true)['movie_favorites'];

										if(isset($_COOKIE['fav_movies']))	{
											$fav_movies = json_decode($_COOKIE['fav_movies'], true);
										}	

										if(isset($_POST['fav']))	{

											if($_POST['fav'] == '1'	&&	!in_array($_GET['movie_id'], $fav_movies))	{
												$fav_movies[] = $_GET['movie_id'];
												if(array_key_exists($_GET['movie_id'], $fav_stats))	{
													$fav_stats[$_GET['movie_id']]++;
												}	else	{
													$fav_stats[$_GET['movie_id']] = 1;
												}
												
												//setcookie("fav_movies", json_encode, time() + (86400 * 30 * 12));
											}	elseif($_POST['fav'] == '0'	&&	in_array($_GET['movie_id'], $fav_movies)	{
												
												if(($key = array_search($_GET['movie_id'], $fav_movies)) !== false)	{
													unset($fav_movies[$key]);
													//setcookie("fav_movies", json_encode, time() + (86400 * 30 * 12));
													
													if($fav_stats[$_GET['movie_id']] > 0)	$fav_stats[$_GET['movie_id']]--;
												}
											}
											setcookie("fav_movies", json_encode, time() + (86400 * 30 * 12));
											file_put_contents($movie_favorites_filename, json_encode($fav_stats));
											header('Location:' . $_SERVER['REQUEST_URL']);
										}

										//var_dump($fav_stats);
										var_dump($_POST);
										//var_dump($_COOKIE);
										//var_dump($fav_movies);
										var_dump($_SERVER['REQUEST_URL']);

									?>
									<form	action = ""	method = "POST">	
										<input	type = "hidden"	name = "fav"	value = "<?php	echo	(in_array($_GET['movie_id']));		?>"	/>"
										<button	type = "submit"	class = "btn	btn-danger	position-relative	<?php		echo	(in_array($_GET['movie_id']), $fav_movies);	?>">

											<span	class = "position-absolute	top-0	start-100	translate-middle	badge	rounded">
												<?php	echo	(if(isset($fav_stats($_GET['movie_id']))))	{
													$fav_stats($_GET['movie_id']);
												}	else	{
													0;
												});	
												?>
												<?php	echo	$current_movie_fav_stats = 	(isset($fav_stats($_GET['movie_id'])) ? $fav_stats($_GET['movie_id']) : 0);	?>
												<span	class = "vissualy-hidden	">
													<?php	
														//echo	$fav_stats($_GET['movie_id']);
														echo	$current_movie_fav_stats;
													?>	
												</span>
											</span>
											<?php	
												echo	(in_array($_GET['movie_id'], $fav_movies));
											?>
											<?php	if(in_array($_GET['movie_id'], $fav_movies))	{
												echo	"Delete from Favorites";
											}	else	{
												echo	"Add to Favorites";
											}		?>	Add to Favorites
										</button>
									</form>
						</div>
						</div>
					</div>
					<div	class="description-mb-3">
							<?php	echo	$movie['plot'];	?>
					</div>
					<div	class="mb-3">
							Genres:	<strong><?php	echo	implode(', ', $movie['genres']);	?></strong>
					</div>
					<div	class="mb-3">
							Directed by:	<strong>James cameron</strong>
					</div>
					<div	class="mb-3">
							Runtime:	<strong><?php	runtime_prettier(123);	?></strong>
					</div>
					<h5>Cast:</h5>
					<?php	echo	$movie['actors'];	?>
					<ul>
							<?php	$actors = explode(', ', $movie['actors']);	var_dump($actors);	
								foreach($actors	as	$actor)	{
									echo	'<li>'.$actor.'</li>';
								}
							?>
					</ul>
								<?php	include_once	'../includes/movie-rating.php';	?>
								<?php	include_once	'../includes/movie-reviews.php';	?>
				</div>
		<?php	
				}	else	{	?>
				<h1>
					Movie Page
				</h1>
				<p>
					Error: No movie
				</p>
				<a	href="movies.php"	class="btn	btn-primary">
					That's All!!!
				</a>
		<?php
				}
		?>
		</section>
		
		
		<?php	require_once    'includes/footer.php';	?>			    

<?php

?>