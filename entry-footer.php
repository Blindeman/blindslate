<footer class="entry-footer">
    <?php if( is_singular( 'post' )){ ?>
        <span class="cat-links"><?php the_category( ', ' ); ?></span>
        <span class="tag-links"><?php the_tags( '' ); ?></span>
    <?php } ?>
    <?php if( is_singular( 'portfolio' ) ){ ?>
        <span class="portfolio-tag-links"><?php the_terms( $post->ID, 'portfolio_tag', '', ', ', '' ) ?></span>
    <?php } ?>
    <?php if( comments_open() ){ echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( esc_html__( 'Comments', 'blindslate' ) ) . '</a></span>'; } ?>
</footer>