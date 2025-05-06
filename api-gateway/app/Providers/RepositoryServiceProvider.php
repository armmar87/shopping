<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Product\Repositories\ProductRepositoryInterface;
use App\Infrastructure\Product\Repositories\EloquentProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, EloquentProductRepository::class);
    }
}

