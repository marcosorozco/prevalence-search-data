<?php

use Illuminate\Container\Container;
use MarcosOrozco\PrevalenceSearchData\App\Url;

if (! function_exists('route_data')) {

    /**
     * Generate the URL to a named route.
     *
     * @param  array|string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function route_data($name, $parameters = [], $absolute = true)
    {
        $parameters = Url::generateArray($parameters);
        return Container::getInstance()
            ->make('url')
            ->route($name, $parameters, $absolute);
    }
}

if (! function_exists('route')) {

    /**
     * Generate the URL to a named route.
     *
     * @param  array|string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function route($name, $parameters = [], $absolute = true)
    {
        $parameters = Url::generateArray($parameters);
        return Container::getInstance()
            ->make('url')
            ->route($name, $parameters, $absolute);
    }
}