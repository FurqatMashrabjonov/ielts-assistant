<?php

namespace App\Filament\Resources\SpeakingQuestionResource\Pages;

use App\Filament\Resources\SpeakingQuestionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpeakingQuestion extends EditRecord
{
    protected static string $resource = SpeakingQuestionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
