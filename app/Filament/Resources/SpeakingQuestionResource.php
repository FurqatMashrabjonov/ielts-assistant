<?php

namespace App\Filament\Resources;

use App\Enums\SpeakingCategoryStatus;
use App\Enums\SpeakingQuestionStatus;
use App\Filament\Resources\SpeakingQuestionResource\Pages;
use App\Filament\Resources\SpeakingQuestionResource\RelationManagers;
use App\Models\SpeakingCategory;
use App\Models\SpeakingQuestion;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpeakingQuestionResource extends Resource
{
    protected static ?string $model = SpeakingQuestion::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Select::make('speaking_category_id')
                    ->label('Category')->options(SpeakingCategory::query()->pluck('title', 'id'))->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->wrap(),
                Tables\Columns\TextColumn::make('speakingCategory.title')->sortable(),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('status')->enum([
                    SpeakingQuestionStatus::ACTIVE => 'Active',
                    SpeakingCategoryStatus::INACTIVE => 'Inactive',
                ])->sortable(),
                BadgeColumn::make('status')->colors(['success' => 'active', 'secondary' => 'inactive',])->sortable(),
                Tables\Columns\TextColumn::make('created_at')->date('d M Y')->sortable(),
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
            'index' => Pages\ListSpeakingQuestions::route('/'),
            'create' => Pages\CreateSpeakingQuestion::route('/create'),
            'edit' => Pages\EditSpeakingQuestion::route('/{record}/edit'),
        ];
    }
}
