<?php
/**
 * The template for displaying search forms in lavish
 * @package lavish
 * @since 1.0.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

<div class="input-group">
<input type="text" class="form-control"  placeholder="<?php echo esc_attr_x( 'Search', 'lavish' ) ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
<div class="input-group-addon">
<button class="btn btn-primary" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'lavish' ); ?>"><i class="fa fa-search"></i> </button>
</div>
</div>

</form>    
