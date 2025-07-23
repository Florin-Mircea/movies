
    <?php   print   "Footer"; ?>


<?php
		print	"Container div";
?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<footer	id = "colophon"	class = "site-footer">
		<?php
	
		?>
	
	<section	class = "site-copyright">
		<div	class = "container">
			<div	class = "row">
				<div	class = "col-md-12 align-self-center">
					<div	class = "site-info text-center">
						<div	class = "site-copyright-text d-inline-block">
						<?php
                            get_sidebar();
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <?php
        
    ?>
</footer>
	<?php   ?>	

		<div    class = "scrooltotop<?php ?>">
			<a	href = "#"     class = "rswpthemes-icon icon-angle-up-solid"></a>
		</div>
		<?php   ?>
	</div>
	<?php   get_template_part('template-parts/footer/footer-widgets', 'widgets');	?>

		<span	id = "info">
			<?php   get_template_part('template-parts/footer/site-info', 'info');	?>
		</span>
		<?php	wp_footer();	?>
	</body>
</html>
