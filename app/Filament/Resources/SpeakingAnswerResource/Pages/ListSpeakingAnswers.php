<?php

namespace App\Filament\Resources\SpeakingAnswerResource\Pages;

use App\Filament\Resources\SpeakingAnswerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpeakingAnswers extends ListRecords
{
    protected static string $resource = SpeakingAnswerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
