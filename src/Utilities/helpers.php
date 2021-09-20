<?php

use Illuminate\Container\Container;

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


if (! function_exists('route_prevalence')) {

    /**
     * Generate the URL to a named route.
     *
     * @param  array|string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function route_prevalence($name, $parameters = [], $absolute = true)
    {
        return Container::getInstance()
            ->make('url', $parameters)
            ->route($name, $parameters, $absolute);
    }
}