<?php

namespace App\Providers;

use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\ProductService;
use App\Services\UserService;
use App\Services\CategoryService;
use App\Services\Interfaces\SlideServiceInterface;
use App\Services\SlideService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(SlideServiceInterface::class, SlideService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
