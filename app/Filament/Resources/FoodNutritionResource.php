<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodNutritionResource\Pages;
use App\Filament\Resources\FoodNutritionResource\RelationManagers;
use App\Models\FoodNutrition;
use App\Models\Nutrition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FoodNutritionResource extends Resource
{
    protected static ?string $model = FoodNutrition::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('food_id')
                    ->relationship('food', 'name', function (Builder $query) {
                        return $query->where('user_id', auth()->id());
                    })
                    ->required(),
                Forms\Components\Select::make('nutrition_id')
                    ->options(Nutrition::all()->pluck('name_and_unit', 'id'))
                    ->label('Nutrition')
                    ->required(),
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('food.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nutrition.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListFoodNutrition::route('/'),
            'create' => Pages\CreateFoodNutrition::route('/create'),
            'edit' => Pages\EditFoodNutrition::route('/{record}/edit'),
        ];
    }
}
