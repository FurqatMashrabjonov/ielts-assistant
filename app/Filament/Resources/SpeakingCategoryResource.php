<?php

namespace App\Filament\Resources;

use App\Enums\SpeakingCategoryStatus;
use App\Filament\Resources\SpeakingCategoryResource\Pages;
use App\Models\SpeakingCategory;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;

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
//                FileUpload::make('attachment')->disk('cambridge')
            ]);
    }

    public static function table(Table $table): Table
    {
        $res = $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->sortable(),
                Tables\Columns\TextColumn::make('status')->enum([
                    SpeakingCategoryStatus::ACTIVE => 'Active',
                    SpeakingCategoryStatus::INACTIVE => 'Inactive',
                ])->sortable(),
                BadgeColumn::make('status')->colors(['success' => 'active', 'secondary' => 'inactive',])->sortable(),
                Tables\Columns\TextColumn::make('created_at')->date('d M Y')->sortable(),
                Tables\Columns\TextColumn::make('from_date')->date('M Y'),
                Tables\Columns\TextColumn::make('to_date')->date('M Y')
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
            ]);


        return $res;
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
