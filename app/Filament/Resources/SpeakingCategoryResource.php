<?php

namespace App\Filament\Resources;

use App\Enums\SpeakingCategoryStatus;
use App\Filament\Resources\SpeakingCategoryResource\Pages;
use App\Models\SpeakingCategory;
use Faker\Provider\Text;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\Carbon;

class SpeakingCategoryResource extends Resource
{
    protected static ?string $model = SpeakingCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('Title')->required(),
                DatePicker::make('from_date')->label('From Date')->requiredWithout('always'),
                DatePicker::make('to_date')->label('To Date')->requiredWithout('always'),
                Checkbox::make('always')->label('Always in use')->requiredWithout('from_date,to_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable(),
                Tables\Columns\TextColumn::make('status')->enum([
                    SpeakingCategoryStatus::ACTIVE => 'Active',
                    SpeakingCategoryStatus::INACTIVE => 'Inactive',
                ])->sortable(),
                BadgeColumn::make('status')
                    ->colors([
                        'success' => 'active',
                        'secondary' => 'inactive',
                    ]),
                Tables\Columns\TextColumn::make('created_at')->date('d M Y'),
                Tables\Columns\TextColumn::make('from_date')->date('M Y'),
                Tables\Columns\TextColumn::make('to_date')->date('M Y')
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
