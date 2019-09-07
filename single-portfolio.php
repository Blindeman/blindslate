<?php get_header(); ?>
<main id="content" class="width">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'entry', 'portfolio' ); ?>
    <?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
    <?php endwhile; endif; ?>
    <?php get_template_part( 'nav', 'below-single' ); ?>
</main>
<?php get_footer(); ?>