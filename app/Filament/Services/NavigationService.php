<?php

namespace App\Filament\Services;

use App\Enums\UserRole;
use App\Filament\Resources\SpeakingAnswerResource;
use App\Filament\Resources\SpeakingCategoryResource;
use App\Filament\Resources\SpeakingIdeaResource;
use App\Filament\Resources\SpeakingQuestionResource;
use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;

class NavigationService
{

    protected static function getItems(): array
    {
            $speakingItems = [
                ...SpeakingCategoryResource::getNavigationItems(),
                ...SpeakingAnswerResource::getNavigationItems(),
                ...SpeakingIdeaResource::getNavigationItems(),
                ...SpeakingQuestionResource::getNavigationItems()
            ];

            $generalItems = [
                ...UserResource::getNavigationItems()
            ];

            return match (auth()->user()->role){
                UserRole::MODERATOR => [
                    NavigationGroup::make('Speaking')
                        ->items($speakingItems)],
                UserRole::SUPER_ADMIN => [
                    NavigationGroup::make('General')
                        ->items($generalItems),
                    NavigationGroup::make('Speaking')
                        ->items($speakingItems),
                ]
            };
    }

    public static function navigator()
    {
        Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder
                ->groups(self::getItems());
        });

    }

}
