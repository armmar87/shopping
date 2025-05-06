<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalProduct extends Model
{
    public function getDownloadUrl(): ?string
    {
        return $this->attributes['download_url'] ?? null;
    }
}
