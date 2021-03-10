<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\View\Forms\Components\ColorComponent;
use App\View\Forms\Components\PriceComponent;
use Laraeast\LaravelBootstrapForms\Facades\BsForm;

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
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BsForm::registerComponent('price', PriceComponent::class);
        BsForm::registerComponent('color', ColorComponent::class);
        Paginator::useBootstrap();
    }
}
