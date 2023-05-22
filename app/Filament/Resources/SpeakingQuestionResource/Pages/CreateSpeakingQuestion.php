<?php

namespace App\Filament\Resources\SpeakingQuestionResource\Pages;

use App\Enums\SpeakingCategoryStatus;
use App\Enums\SpeakingQuestionStatus;
use App\Filament\Resources\SpeakingQuestionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpeakingQuestion extends CreateRecord
{
    protected static string $resource = SpeakingQuestionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['status'] = SpeakingQuestionStatus::ACTIVE;

        return $data;
    }
}
