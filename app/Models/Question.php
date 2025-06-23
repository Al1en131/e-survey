<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Question extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function option(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function steps(): MorphMany
    {
        return $this->morphMany(Step::class, 'stepable');
    }
}
