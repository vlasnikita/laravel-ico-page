<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use Config;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $locale = Request::segment(1);

//        dd(Config::get('app.locales'));
//        dd(base_path().'/vendor/autoload.php');
//        if(array_key_exists($locale, ['en' => 'English'])) {
        if(array_key_exists($locale, $this->app->config->get('app.locales'))) {
            $this->app->setLocale($locale);

            Route::group(['namespace' => $this->namespace, 'prefix' => $locale], function ($router) {
                require base_path('routes/web.php');
            });
        } else {
            Route::group(['namespace' => $this->namespace], function ($router) {
                require base_path('routes/web.php');
            });
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
