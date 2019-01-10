<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<main class="front-page-main">
	
		<header class="front-page-content">
			<?php while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<p><?php the_post_thumbnail('thumbnail'); ?></p>
				<?php the_content(); ?>
			<?php endwhile;?>
		</header>
		
		<aside class="front-page-widget-area">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'sidebar' ) ) : ?>
			<?php endif; ?>
		</aside>
		
	</main>
	
	<footer class="front-page-footer">
	</footer>

<?php endif;?>

<?php get_footer(); ?>