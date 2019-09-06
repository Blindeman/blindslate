<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="thumbnail-link"><?php the_post_thumbnail(); ?></a>
<?php endif; ?>
<div class="entry-summary">
    <?php the_excerpt(); ?>
    <?php if ( is_search() ) { ?>
        <div class="entry-links"><?php wp_link_pages(); ?></div>
    <?php } ?>
</div>