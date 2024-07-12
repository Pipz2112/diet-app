<?php

namespace App\Filament\Resources\FoodNutritionResource\Pages;

use App\Filament\Resources\FoodNutritionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFoodNutrition extends ListRecords
{
    protected static string $resource = FoodNutritionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
