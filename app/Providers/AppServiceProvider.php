<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts;
use App\Repositories\Eloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            Contracts\ProductRepositoryInterface::class,
            Eloquent\ProductRepository::class
        );

        $this->app->bind(
            Contracts\CategoryRepositoryInterface::class,
            Eloquent\CategoryRepository::class
        );

        $this->app->bind(
            Contracts\ColorRepositoryInterface::class,
            Eloquent\ColorRepository::class
        );

        $this->app->bind(
            Contracts\ColorProductRepositoryInterface::class,
            Eloquent\ColorProductRepository::class
        );

        $this->app->bind(
            Contracts\BrandRepositoryInterface::class,
            Eloquent\BrandRepository::class
        );

        $this->app->bind(
            Contracts\ImageRepositoryInterface::class,
            Eloquent\ImageRepository::class
        );

        $this->app->bind(
            Contracts\OrderRepositoryInterface::class,
            Eloquent\OrderRepository::class
        );

        $this->app->bind(
            Contracts\OrderDetailRepositoryInterface::class,
            Eloquent\OrderDetailRepository::class
        );

        $this->app->bind(
            Contracts\UserRepositoryInterface::class,
            Eloquent\UserRepository::class
        );

        $this->app->bind(
            Contracts\PaymentRepositoryInterface::class,
            Eloquent\PaymentRepository::class
        );
    }
}
