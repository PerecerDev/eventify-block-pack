<?php 

function disable_redirect_canonical($redirect_url) {
    if (is_singular()) $redirect_url = false;
return $redirect_url;
}

add_filter('redirect_canonical','disable_redirect_canonical');

?>