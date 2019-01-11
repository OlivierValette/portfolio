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
                <?php // custom field
                    if (get_field('texte')) : ?>
                    <div style="background-color: #9adffd">
                        <?php the_field('texte') ?>
                    </div>
	            <?php endif; ?>
                <?php
                    // child pages content
                    $post = get_the_ID();
                    $args = [
                        'post_type' => 'page',
                        'post_parent' => $post,
                        'orderby' => 'rand',
                    ];
                    $the_query = new WP_Query($args); ?>
                    <h4>Voir aussi...</h4>
                    <div class="pagecards">
                        <?php if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="pagecard-thumbnail">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                                <div class="pagecard-details">
                                    <h4><?php the_title() ?></h4>
                                    <?php the_excerpt(); ?>
                                    <ul class="pagecard-buttons">
                                    </ul>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
	            <?php endif; ?>
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