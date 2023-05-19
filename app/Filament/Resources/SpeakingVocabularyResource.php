<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpeakingVocabularyResource\Pages;
use App\Filament\Resources\SpeakingVocabularyResource\RelationManagers;
use App\Models\SpeakingVocabulary;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpeakingVocabularyResource extends Resource
{
    protected static ?string $model = SpeakingVocabulary::class;

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
                //
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
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpeakingVocabularies::route('/'),
            'create' => Pages\CreateSpeakingVocabulary::route('/create'),
            'edit' => Pages\EditSpeakingVocabulary::route('/{record}/edit'),
        ];
    }    
}
