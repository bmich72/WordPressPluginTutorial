<?php
function tl_save_error() {
    update_option( 'plugin_error',  ob_get_contents() );
}
add_action( 'activated_plugin', 'tl_save_error' );
/* Then to display the error message: */
echo get_option( 'plugin_error' );
/* Or you could do the following: */
file_put_contents( 'C:\errors' , ob_get_contents() ); // or any suspected variable