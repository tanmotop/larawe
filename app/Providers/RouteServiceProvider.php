<?php

namespace App\Providers;


use Illuminate\Contracts\Foundation\Application;
use Larawe\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * RouteServiceProvider constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->router = $app['router'];
    }

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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function mapWebRoutes()
    {
        $this->router
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function mapApiRoutes()
    {
        $this->router
            ->namespace($this->namespace)
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }
}
