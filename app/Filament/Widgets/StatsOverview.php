<?php

namespace App\Filament\Widgets;

use App\Models\SpeakingCategory;
use App\Models\User;
use DefStudio\Telegraph\Models\TelegraphBot;
use DefStudio\Telegraph\Models\TelegraphChat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Website Users', User::count()),
//                ->color('success'),

            Card::make('Telegram Chats', TelegraphChat::count()),
//                ->color('success')
//                ->description(),
            Card::make('Telegram Bots', TelegraphBot::count()),
        ];
    }
}
