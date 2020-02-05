<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function locations(): HasMany {
        return $this->hasMany(Location::class);
    }
}
