</div>
<footer id="footer">
    <div class="width">
        <?php get_sidebar(); ?>
    </div>
    <div id="copyright" class="width">
        &copy; <?php echo esc_html( date_i18n( __( 'Y', 'blindslate' ) ) ); ?>
        <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>