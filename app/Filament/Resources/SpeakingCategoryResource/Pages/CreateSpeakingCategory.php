<?php

namespace App\Filament\Resources\SpeakingCategoryResource\Pages;

use App\Enums\SpeakingCategoryStatus;
use App\Filament\Resources\SpeakingCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpeakingCategory extends CreateRecord
{
    protected static string $resource = SpeakingCategoryResource::class;



    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['status'] = SpeakingCategoryStatus::ACTIVE;

        return $data;
    }
}
