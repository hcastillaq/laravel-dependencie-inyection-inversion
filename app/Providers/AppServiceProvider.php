<?php

namespace App\Providers;

use App\Core\Repositories\Interfaces\NoteRepository;
use App\Core\Repositories\NoteRepositoryEloquent;
use App\Core\Repositories\NoteRepositoryInMemory;
use App\Core\Services\NoteService;
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
        $this->app
            ->singleton(
                NoteRepository::class,
                NoteRepositoryEloquent::class
            );
        $this->app
            ->singleton(
                NoteService::class,
                function ($app) {
                    return  new NoteService(
                        $app->make(NoteRepository::class)
                    );
                }
            );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
