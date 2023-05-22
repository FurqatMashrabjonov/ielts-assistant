<?php

namespace App\Filament\Resources\SpeakingQuestionResource\Pages;

use App\Filament\Resources\SpeakingQuestionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpeakingQuestions extends ListRecords
{
    protected static string $resource = SpeakingQuestionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
