<?php
if (!function_exists('routeIs')) {
    function routeIs($route, $return_ontrue = 'active', $return_onfalse = null)
    {
        return request()->routeIs($route) ? $return_ontrue : $return_onfalse;
    }
}
