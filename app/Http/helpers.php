<?php

/**
* Activate sidebar link
*
*  @param  string $path
*  @param  string $active
*  @return string
*/
function setActive($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array) $path) ? $active : '';
}
