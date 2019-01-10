<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	    
        <header class="single-header"
                style="background-image: url('<?= bloginfo('template_url'); ?>/images/realisation2.jpg')">
            <h1 >
                <?php _e('Réalisation : ', 'citrouille'); ?>
                <?php the_title(); ?>
            </h1>
            <p>Ajouté le <?php the_time('l d F Y'); ?></p>
            <p>
                <?php _e('Catégories :', 'citrouille'); ?>
                <?php $categories = get_the_category(); ?>
                <?php foreach ($categories as $category) : ?>
                    &nbsp;
                    <a class="button" href="<?= get_category_link( $category->term_id ); ?>">
                        <?= $category->name; ?>
                    </a>
                <?php endforeach; ?>
            </p>
        </header>
    
        <main class="single-main">
            
            <div class="single-content">
                <?php the_content(); ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="image à la une">
            </div>

            <aside class="single-widget-area">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'sidebar' ) ) : ?>
                <?php endif; ?>
            </aside>
            
        </main>
    
    
        <footer class="single-footer">
            <h2>Commentaires</h2>
            <?php comments_template(); ?>
        </footer>
	
	<?php endwhile;?>


<?php endif;?>

<?php get_footer();