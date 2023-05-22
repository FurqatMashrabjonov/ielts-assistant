<?php

namespace App\Filament\Widgets;

use App\Models\SpeakingAnswer;
use App\Models\SpeakingCategory;
use App\Models\SpeakingQuestion;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EnglishOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Speaking Categories', SpeakingCategory::count()),
            Card::make('Speaking Questions', SpeakingQuestion::count()),
            Card::make('Speaking Answers', SpeakingAnswer::count()),
        ];
    }
}
