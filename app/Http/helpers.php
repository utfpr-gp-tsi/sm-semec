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

/**
 * Activate sidebar link
 *
 *  @param  string $path
 *  @param  string $active
 *  @return string
 */
function prettyPaginationLinks($links)
{
    $pattern = '#\?page=#';
    $replacement = '/page/';
    $one = preg_replace($pattern, $replacement, $links);

    $pattern = '#page/([1-9]+[0-9]*)/page/([1-9]+[0-9]*)#';
    $replacement = 'page/$2';

    return preg_replace($pattern, $replacement, $one);
}
