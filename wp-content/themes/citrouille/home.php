<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<header class="home-header"
            style="background-image: url('<?= bloginfo('template_url'); ?>/images/realisation2.jpg')">
		<h1 >Réalisations</h1>
	</header>

		
    <main class="home-main">
			
        <div class="home-content">
	        <?php while (have_posts()) : the_post(); ?>
                <h2 class="content-title">
                    <?php the_title(); ?>
                </h2>
                <div class="content-thumbnail">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
                <div class="content-text">
                    <p>Ajouté le <?php the_time('l d F Y'); ?></p>
                    <p>
                        <?php _e('Catégories :', 'citrouille'); ?>
                        <?php $categories = get_the_category(); ?>
                        <?php foreach ($categories as $category) : ?>
                            &nbsp;<a href="<?= get_category_link( $category->term_id ); ?>"><?= $category->name; ?></a>
                        <?php endforeach; ?>
                    </p>
                    <?php the_excerpt(); ?>
                </div>
	        <?php endwhile;?>
        </div>
			
        <aside class="home-widget-area">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'sidebar' ) ) : ?>
            <?php endif; ?>
        </aside>
		
    </main>
		
    <footer class="home-footer">
    </footer>

<?php endif;?>

<?php get_footer(); ?>