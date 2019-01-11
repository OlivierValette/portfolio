<?php get_header(); ?>

<?php
// get page title
$page = get_post();
$pagetitle = get_the_title($post->ID);
$pagefeaturedimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
?>

    <header class="home-header"
            style="background-image: url('<?= $pagefeaturedimage[0] ?>')">
        <h1 ><?= $pagetitle; ?></h1>
    </header>

<?php if (have_posts()) : ?>

	<main class="front-page-main">
	
		<div class="front-page-content">
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php // child pages list :
                    $children = wp_list_pages([
                        'title_li' => '<h4>' . __('Voir aussi :') . '</h4>',
                        'child_of' => $post->ID,
                    ]);
                    if ( $children ) : echo $children;
                    endif;
                ?>
            <?php endwhile;?>
        </div>
        
		<aside class="front-page-widget-area">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'sidebar' ) ) : ?>
			<?php endif; ?>
		</aside>
		
	</main>
	
	<footer class="front-page-footer">
	</footer>

<?php endif;?>

<?php get_footer();