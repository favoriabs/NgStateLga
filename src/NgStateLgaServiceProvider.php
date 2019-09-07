<?php
namespace Favoriabs\Ngstatelga;
use Illuminate\Support\ServiceProvider;

class NgStateLgaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        include __DIR__ . '/routes.php';
        $this->loadViewsFrom(__DIR__ . '/views', 'ngstatelga');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        // publish seeds
        $this->publishes([ __DIR__ . '/seeds' => $this->app->databasePath() . '/seeds' ], 'seeds');
      // publish views
        // $this->publishes([__DIR__.'/views' => resource_path('views/ngstatelga'),], 'views');
        // $this->publishes([__DIR__.'/views' => base_path('resources/views')]);
        // $this->loadViewsFrom(base_path('resources/views'), 'ngstatelga');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ngstatelga', function() {
            return new ngstatelga;
        });
    }
}
