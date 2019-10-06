<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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

        $this->mapCandidateRoutes();

        $this->mapEmployerRoutes();

        //
    }

    /**
     * Define the "employer" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapEmployerRoutes()
    {
        Route::group([
            'middleware' => ['web', 'employer', 'auth:employer'],
            'prefix' => 'employer',
            'as' => 'employer.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/employer.php');
        });
    }

    /**
     * Define the "candidate" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapCandidateRoutes()
    {
        Route::group([
            'middleware' => ['web', 'candidate', 'auth:candidate'],
            'domain' => 'candidate.' . env('APP_DOMAIN'),
            'as' => 'candidate.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/candidate.php');
        });
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
