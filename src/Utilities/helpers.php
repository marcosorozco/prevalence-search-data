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

if (! function_exists('search_data')) {

    /**
     * Generate the URL to a named route.
     *
     * @param  array|string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function search_data($key)
    {
        return Url::getPrevalecenceData($key);
    }
}

if (! function_exists('old_request')) {

    /**
     * Generate the URL to a named route.
     *
     * @param  array|string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function old_request($string)
    {
        $request = Container::getInstance()->make('request');
        return $request->old($string, $request->__get($string));
    }
}

if (! function_exists('old_search_request')) {

    /**
     * Generate the URL to a named route.
     *
     * @param  array|string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function old_search_request($string)
    {
        $request = Container::getInstance()->make('request');
        return $request->old($string, search_data($string));
    }
}