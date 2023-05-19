<?php

namespace App\Filament\Resources\SpeakingVocabularyResource\Pages;

use App\Filament\Resources\SpeakingVocabularyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpeakingVocabularies extends ListRecords
{
    protected static string $resource = SpeakingVocabularyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
