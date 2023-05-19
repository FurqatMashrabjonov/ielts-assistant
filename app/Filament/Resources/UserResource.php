<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->required()->unique(),
                Forms\Components\TextInput::make('password')->password()
                    ->required()
                    ->visibleOn('create'),
                Select::make('role')
                    ->options([
                        'super_admin' => 'Super Admin',
                        'moderator' => 'Moderator',
                        'user' => 'User',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\BadgeColumn::make('role')->enum([
                    'super_admin' => 'Super Admin',
                    'moderator' => 'Moderator',
                    'user' => 'User',
                    'admin' => 'Admin',
                ])->colors([
                    'danger' => 'super_admin',
                    'secondary' => 'moderator'
                ]),
                Tables\Columns\TextColumn::make('email')->searchable(),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->options([
                        'super_admin' => 'Super Admin',
                        'moderator' => 'Moderator',
                        'user' => 'User',
                    ])

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
