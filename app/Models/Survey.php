<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Survey extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function participant(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function steps(): MorphMany
    {
        return $this->morphMany(Step::class, 'stepable');
    }
}
