<?php
/**
 * Template to display the search form
 */

?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="s" class="screen-reader-text"><?php _e( 'Search', 'blindslate' ); ?></label>
    <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'blindslate' ); ?>" />
</form>

<!--input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php //esc_attr_e( 'Search', 'blindslate' ); ?>" /-->