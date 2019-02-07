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

        $this->mapDigitadorRoutes();

        $this->mapSupervisorRoutes();

        $this->mapAdministradorRoutes();
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

    protected function mapDigitadorRoutes(){
        Route::prefix('digitador')
            ->middleware('digitador')
            ->namespace($this->namespace . '\Digitador')
            ->group(base_path('routes/digitador.php'));
    }

    protected function mapSupervisorRoutes(){
        Route::prefix('supervisor')
            ->middleware('supervisor')
            ->namespace($this->namespace . '\Supervisor')
            ->group(base_path('routes/supervisor.php'));
    }

    protected function mapAdministradorRoutes(){
        Route::prefix('administrador')
            ->middleware('administrador')
            ->namespace($this->namespace . '\Administrador')
            ->group(base_path('routes/administrador.php'));
    }
}
