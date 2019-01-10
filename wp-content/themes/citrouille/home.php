<?php get_header(); ?>

<?php
// get page title
$pagetitle = get_the_title(get_option('page_for_posts', true));
$pagefeaturedimage = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts', true)),'full');
?>

<header class="home-header"
        style="background-image: url('<?= $pagefeaturedimage[0] ?>')">
    <h1 ><?= $pagetitle; ?></h1>
</header>

<?php if (have_posts()) : ?>
		
    <main class="home-main">
        
        <div class="home-content">
	        <?php while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="home-link">
                    <h2 class="content-title">
                        <?php the_title(); ?>
                    </h2>
                    <div class="content-thumbnail">
                        <img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="content-text">
                        <p>Ajouté le <?php the_time('l d F Y'); ?></p>
                        <?php the_excerpt(); ?>
                    </div>
                </a>
                <p>
                    <?php $categories = get_the_category(); ?>
                    <?php foreach ($categories as $category) : ?>
                        &nbsp;<a class="button" href="<?= get_category_link( $category->term_id ); ?>">
                            <?= $category->name; ?>
                        </a>
                    <?php endforeach; ?>
                </p>
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

<?php get_footer();