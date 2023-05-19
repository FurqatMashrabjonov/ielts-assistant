<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Enums\SpeakingCategoryStatus;
use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = \Hash::make($data['password']);

        return $data;
    }
}
