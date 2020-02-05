<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    public function events(): HasMany {
        return $this->hasMany(Event::class);
    }

    public function group(): BelongsTo {
        return $this->belongsTo(Group::class);
    }
}
