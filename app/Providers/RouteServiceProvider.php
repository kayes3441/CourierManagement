<?php

namespace App\Providers;

use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

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
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

     /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const LOGIN = '/login';



    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapAdminRoutes();
    }

    protected function mapAdminRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/route.php'));
    }
}
