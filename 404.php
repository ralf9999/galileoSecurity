<?php
/*
* The template for displaying 404 pages (Not Found)

 Template Name: 404
 Template Post Type: page, post
*/
?>
<?php $url = home_url()?>
<?php get_header(); ?>
<main class="">
	<div class="cl_404Box">
		<div class="cl_404Area">
			<div class="cl_roboterBox">
				<img src="<?= home_url('wp-content/themes/galileoSecurity/assets/img/roboter.svg') ?>" alt="Roboter">
			</div>
			<div class="textBox">
				<h1>Ups!</h1>
				<h4>Es sieht so aus, als ob die Seite, die Sie suchen, nicht mehr existiert oder verschoben wurde.<br/>Bitte versuchen Sie es erneut oder gehen Sie zurück zur</h4><a href="<?= $url; ?>">Startseite.</a>     
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>