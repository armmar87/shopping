<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalProduct extends Model
{
    public function getWeight(): ?float
    {
        return $this->attributes['weight'] ?? null;
    }
}
