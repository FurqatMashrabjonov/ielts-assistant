<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class Settings extends ManageRecords
{
    protected static string $resource = UserResource::class;

    public function mount(): void
    {
        abort_unless(auth()->user()->isUser(), 403);
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isUser();
    }
}
