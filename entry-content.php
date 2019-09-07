<?php if ( has_post_thumbnail() && !is_singular( 'portfolio' ) ) { ?>
    <a href="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); echo esc_url( $src[0] ); ?>" title="<?php the_title_attribute(); ?>" class="thumbnail-link">
        <?php the_post_thumbnail(); ?>
    </a>
    <?php } elseif ( is_singular( 'portfolio' ) && function_exists( 'get_field' ) ) { 
        //get the acf images for a little gallery
        $aImages = get_field( 'fotos_bij_portfolio_item' );
        $sSize = "thumbnail";
        if( $aImages ){ ?>
            <ul class="portfolio-gallery">
                <?php foreach ($aImages as $image) { ?>
                    <li>
                        <figure class="gallery-item">
                            <a class="thumbnail-link" href="<?php echo $image['url']; ?>">
                                <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
                            </a>
                        </figure>
                        <figcaption class="gallery-caption wp-caption-text">
                            <?php echo $image['caption']; ?>
                        </figcaption>
                    </li>
                <?php } ?>
            </ul>
        <?php }
    } ?>
<div class="entry-content">
    <?php the_content(); ?>
    <div class="entry-links"><?php wp_link_pages(); ?></div>
</div>