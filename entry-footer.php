<footer class="entry-footer">
    <?php if( is_singular( 'post' )){ ?>
        <hr>
        <!--<span class="cat-links"><?php //the_category( ', ' ); ?></span>-->
        <span class="tag-links icon-tag"><?php the_tags( '' ); ?></span>
    <?php } ?>
    <?php if( is_singular( 'portfolio' ) ){ ?>
        <hr>
        <h4><?php _e( 'Keywords for this website', 'blindslate' ); ?></h4>
        <span class="portfolio-tag-links icon-tag"><?php the_terms( $post->ID, 'portfolio_tag', '', ', ', '' ) ?></span>
    <?php } ?>
    <?php if( comments_open() ){ echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( esc_html__( 'Comments', 'blindslate' ) ) . '</a></span>'; } ?>
</footer>