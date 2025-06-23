<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Essay extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function answers(): MorphMany
    {
        return $this->morphMany(Answer::class, 'answerable');
    }
}
