<?php


/*
=================================================
Header Box Wrapper Chooser Hooks
=================================================
*/

add_action('lr_wrapper_choose', 'lavish_wrapper_choose_fnc');

add_action('lr_header_display', 'lavish_header_display_fnc');

/*
=================================================
Header Main Display Hooks
=================================================
*/
add_action('lr_header', 'lavish_header_fnc');

/*
=================================================
Excerpt Action Hooks
=================================================
*/
add_action('lr_excerpt', 'lavish_excerpt_fnc');

/*
=================================================
POST THUMBNAILS HOOKS
=================================================
*/
add_action('lr_thumbnail', 'lavish_thumbnail_fnc');
/*
=================================================
Post Header Hooks
=================================================
*/
add_action('lr_blog_header','lavish_blog_header_fnc');
 ?>