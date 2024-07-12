<?php

namespace App\Filament\Resources\FoodNutritionResource\Pages;

use App\Filament\Resources\FoodNutritionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoodNutrition extends EditRecord
{
    protected static string $resource = FoodNutritionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
