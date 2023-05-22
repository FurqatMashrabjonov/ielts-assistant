<?php

namespace App\Filament\Resources\SpeakingIdeaResource\Pages;

use App\Filament\Resources\SpeakingIdeaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpeakingIdeas extends ListRecords
{
    protected static string $resource = SpeakingIdeaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
