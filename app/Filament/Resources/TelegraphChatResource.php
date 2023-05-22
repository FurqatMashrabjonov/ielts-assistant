<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TelegraphChatResource\Pages;
use DefStudio\Telegraph\Models\TelegraphChat;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class TelegraphChatResource extends Resource
{
    protected static ?string $model = TelegraphChat::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('chat_id')->label('Chat ID'),
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('from.first_name')->label('First Name'),
                Tables\Columns\TextColumn::make('from.last_name')->label('Last Name'),
                Tables\Columns\TextColumn::make('from.username')->label('username'),
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
            'index' => Pages\ListTelegraphChats::route('/'),
            'create' => Pages\CreateTelegraphChat::route('/create'),
            'edit' => Pages\EditTelegraphChat::route('/{record}/edit'),
        ];
    }

    public function authorization(){

    }
}
