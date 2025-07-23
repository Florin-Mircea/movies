
<?php   print   "Header"; ?>

<?php

?>
<!doctype html>
<html	<?php	language_attributes();	?>>
	<head>
		<meta	charset = "<?php	bloginfo('charset');	?>"	/>
		<meta	name = "viewport"	content = "width=device-width, initial-scale=1"	/>
		<link	rel = "profile"	href = "http://gmpg.org/xfn/11"	/>		
		
		<title>Mircea Florin</title>

		<link	type = "text/css"	rel="stylesheet"    href = "style.css"	/>
		<link   type = "text/css"	rel="stylesheet"    href = "css/main.css"	/>
		<link 	type = "text/css"	rel="stylesheet" 	href = "css/bootstrap.css"	/>
		<script	type = "text/javascript"	src = "scripts/main.js"></script>

		<link	href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"	rel = "stylesheet"	integrity = "sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"	crossorigin = "anonymous"	/>
		<script	src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"	integrity = "sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"	crossorigin = "anonymous"></script>

		<script	src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"	integrity = "sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"	crossorigin = "anonymous"></script>
		<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"	integrity = "sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"	crossorigin = "anonymous"></script>

		<script	type = "text/javascript"	src = "assets/js//main.js"></script>
		<style>
			@import	url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
		</style>
	<?php   ?>
		<?php	wp_head();	?>
		
	</head>
	<body>	

		<div class="spinner">
  			<div class="double-bounce1"></div>
  			<div class="double-bounce2"></div>
		</div>
		
		<div id = "sk-circle"	class = "sk-circle">
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
  			<div class = "sk-circle-dot"></div>
		</div>		
		<div	id = "wptime-plugin-preloader">

		</div>

		

		<?php	body_class();	?> 
		<?php   get_template_part('template-parts/navigation/navigation-top', 'top');  ?>
		<?php	wp_nav_menu('primary');	?>
		<?php	wp_nav_menu('secondary');	?>    

    	<?php     ?>
		<a	class = "skip-link screen-reader-text"	href = "#content"><?php   ?></a>
		<?php
        	
		?>
	<div    id = "page" class="site">
		<div	id = "preloader-wrapper">
			<div	id = "preloader"></div>
		</div>
	<?php
    
	?>
	
	<div    id = "content"   class = "site-content">
		<?php	if(is_home())	{	?>
			

		<?php	}	?>
		<?php	get_template_part("template-parts/navigation/navigation-top", "top");	?>
		<div	class = "container">
			<div	class = "row">
				<div	class = "col-md-12 align-self-center">
					<div	class = "site-info text-center">
						<div	class = "site-copyright-text d-inline-block">
						
						