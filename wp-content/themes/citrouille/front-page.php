<?php get_header(); ?>

<?php
// get page title
$page = get_post();
$pagetitle = get_the_title($post->ID);
$pagefeaturedimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
?>

    <header class="front-page-header"
            style="background-image: url('<?= $pagefeaturedimage[0] ?>')">
        <h1 ><?= $pagetitle; ?></h1>
    </header>

<?php if (have_posts()) : ?>

	<main class="front-page-main">
	
        <?php while (have_posts()) : the_post(); ?>
        
            <article class="front-page-content">
             
                <div class="front-page-avatar">
                    <?php // custom avatar field
                        if (get_field('avatar')) : ?>
                                <img src="<?php the_field('avatar') ?>" alt="avatar">
                        <?php endif; ?>
                 
                    <?php // custom links fields
                        if ( have_rows('liens') ): ?>
                            <div class="list-group">
                                <?php while ( have_rows('liens') ) : the_row(); ?>
                                    <br>
                                    <a class="list-group-item" href="<?php the_sub_field('lien-url'); ?>">
                                        <i class="fa fa-<?php the_sub_field('lien-icone'); ?> fa-2x fa-fw"></i>
                                        <?php the_sub_field('lien-nom'); ?>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                </div>
                
                <div class="front-page-post">
                    <?php // post content
                        the_content(); ?>
                </div>
                
                <?php // child pages content
                    $post = get_the_ID();
                    $args = [
                        'post_type' => 'page',
                        'post_parent' => $post,
                        'orderby' => 'rand',
                    ];
                    $the_query = new WP_Query($args); ?>
                
            </article>
        
            <aside class="front-page-aside-area">
                <?php // custom text field
                if (get_field('texte')) : ?>
                    <div class="front-page-texte">
                        <?php the_field('texte') ?>
                    </div>
                <?php endif; ?>
            </aside>
        
        <?php endwhile;?>
		
        <section class="front-page-content">
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
                <?php endif; ?>
            </div>
        </section>
        
	</main>
	
	<footer class="front-page-footer">
	</footer>

<?php endif;?>

<?php get_footer();