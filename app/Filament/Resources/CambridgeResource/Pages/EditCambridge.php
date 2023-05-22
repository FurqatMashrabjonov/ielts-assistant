<?php

namespace App\Filament\Resources\CambridgeResource\Pages;

use App\Filament\Resources\CambridgeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCambridge extends EditRecord
{
    protected static string $resource = CambridgeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
