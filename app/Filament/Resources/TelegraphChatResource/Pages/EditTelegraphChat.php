<?php

namespace App\Filament\Resources\TelegraphChatResource\Pages;

use App\Filament\Resources\TelegraphChatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTelegraphChat extends EditRecord
{
    protected static string $resource = TelegraphChatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
