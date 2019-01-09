<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	    
        <header class="single-header">
            <h1 style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')">
                <?php _e('Réalisation : ', 'citrouille'); ?>
                <?php the_title(); ?>
            </h1>
            <p>Ajouté le <?php the_time('l d F Y'); ?></p>
            <p>
                <p><?php _e('Catégories :', 'citrouille'); ?>
                <?php $categories = get_the_category(); ?>
                <?php foreach ($categories as $category) : ?>
                    &nbsp;<i><?= $category->name; ?></i>
                <?php endforeach; ?>
            </p>
            <?php the_category(); ?>
        </header>
    
        <main class="single-main">
            
            <div class="single-content">
                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="image à la une">
                <?php the_content(); ?>
            </div>

            <aside class="widget-area">
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

<?php get_footer(); ?>