<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;

    protected $appends = ['name_and_unit'];
    public function getNameAndUnitAttribute() : string
    {
        return "$this->name ($this->unit)";
    }
}
