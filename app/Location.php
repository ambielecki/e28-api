<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    Public function events(): HasMany {
        return $this->hasMany(Event::class);
    }
}
