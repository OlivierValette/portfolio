<?php /* Template Name: contact */ ?>

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

	<?php while (have_posts()) : the_post();
    
        the_content();

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>
	
	<?php endwhile;?>
<?php endif;?>

<?php get_footer();