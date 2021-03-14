<?php

namespace App\Providers;

use App\Presenters\ProfilePresenter;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param UrlGenerator $url
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        Response::macro('crud', function ($object){
            return Response::json($object);
        });
        $url->forceSchema('https');
        $this->registerPresenter();
    }

    protected function registerPresenter()
    {
        //$this->app->alias('profile', ProfilePresenter::class);
        $this->app->singleton('profile', function () {
            return new ProfilePresenter();
        });
    }
}
