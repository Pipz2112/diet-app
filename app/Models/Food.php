<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $guarded = ['user_id'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($food) {
            $food->user_id = auth()->id();
        });
        static::updating(function ($food) {
            if ($food->isDirty('user_id')) {
                $food->user_id = auth()->id();
            }
        });
    }
}
