<?php

namespace App\Providers;

use App\Presenters\ProfilePresenter;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
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
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Response::macro('crud', function ($object){
            return Response::json($object);
        });

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
