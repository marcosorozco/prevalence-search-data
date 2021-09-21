<?php

namespace MarcosOrozco\PrevalenceSearchData\Providers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\ServiceProvider;
use MarcosOrozco\PrevalenceSearchData\App\Url;

class RoutePrevalenceDataProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Redirect::macro('routeSearch',
            function ($route, $parameters = [], $status = 302, $headers = []) {
                $parameters = Url::generateArray($parameters);
                return $this->to($this->generator->route($route, $parameters), $status, $headers);
            }
        );
    }
}
