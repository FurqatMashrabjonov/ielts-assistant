<?php

namespace App\Filament\Resources\SpeakingCategoryResource\Pages;

use App\Filament\Resources\SpeakingCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpeakingCategories extends ListRecords
{
    protected static string $resource = SpeakingCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
