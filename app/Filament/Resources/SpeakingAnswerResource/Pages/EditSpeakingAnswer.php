<?php

namespace App\Filament\Resources\SpeakingAnswerResource\Pages;

use App\Filament\Resources\SpeakingAnswerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpeakingAnswer extends EditRecord
{
    protected static string $resource = SpeakingAnswerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
