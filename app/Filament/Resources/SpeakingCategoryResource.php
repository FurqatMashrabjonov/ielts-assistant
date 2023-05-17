<?php

namespace App\Filament\Resources;

use App\Enums\SpeakingCategoryStatus;
use App\Filament\Resources\SpeakingCategoryResource\Pages;
use App\Models\SpeakingCategory;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Carbon;

class SpeakingCategoryResource extends Resource
{
    protected static ?string $model = SpeakingCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('from')->sortable(),
                Tables\Columns\TextColumn::make('status')->enum([
                    SpeakingCategoryStatus::ACTIVE => 'Active',
                    SpeakingCategoryStatus::INACTIVE => 'Inactive',
                ])->sortable(),
                Tables\Columns\TextColumn::make('created_at')->date('d M Y')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpeakingCategories::route('/'),
            'create' => Pages\CreateSpeakingCategory::route('/create'),
            'edit' => Pages\EditSpeakingCategory::route('/{record}/edit'),
        ];
    }
}
