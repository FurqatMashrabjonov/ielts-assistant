<?php

namespace App\Filament\Resources\SpeakingVocabularyResource\Pages;

use App\Filament\Resources\SpeakingVocabularyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpeakingVocabulary extends EditRecord
{
    protected static string $resource = SpeakingVocabularyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
