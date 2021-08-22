<?php

if (!function_exists('activeMainLink')) {
    function activeMainLink(): string
    {
        if (request()->is('/')) {
            return 'menu-link__active';
        }
        return '';
    }
}

if (!function_exists('activeArticleLink')) {
    function activeArticleLink(): string
    {
        if ((request()->is('articles') or request()->is('articles/*'))) {
            return 'menu-link__active';
        }
        return '';
    }
}
