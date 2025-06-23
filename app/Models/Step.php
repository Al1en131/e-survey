<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Step extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function stepable(): MorphTo
    {
        return $this->morphTo();
    }

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
