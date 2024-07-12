<?php

namespace App\Models;

use HttpException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodNutrition extends Model
{
    use HasFactory;

    protected $fillable = ['food_id', 'nutrition_id', 'value'];

    public function food() : BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    public function nutrition() : BelongsTo
    {
        return $this->belongsTo(Nutrition::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function (FoodNutrition $foodNutrition) {
            $food = Food::find($foodNutrition->food_id);
            if ($food->user_id !== auth()->id()) {
                throw new HttpException(403, 'You do not have permission to assign this food.');
            }
        });
        static::updating(function (FoodNutrition $foodNutrition) {
            $food = Food::find($foodNutrition->food_id);
            if ($food->user_id !== auth()->id()) {
                throw new HttpException(403, 'You do not have permission to assign this food.');
            }
        });
    }
}
