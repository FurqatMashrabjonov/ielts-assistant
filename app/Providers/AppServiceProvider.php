<?php

namespace App\Providers;

use App\Filament\Resources\SpeakingCategoryResource;
use App\Filament\Resources\UserResource;
use App\Filament\Services\NavigationService;
use App\Models\SpeakingCategory;
use App\Models\User;
use App\Observers\UserObserver;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);

        NavigationService::navigator();
    }
}
