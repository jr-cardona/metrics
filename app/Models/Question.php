<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin \Eloquent
 */
class Question extends ModelBase
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number' => 'integer',
        'is_active' => 'boolean',
        'dimension_id' => 'integer',
        'survey_id' => 'integer',
        'options' => 'array',
    ];

    public function dimension(): BelongsTo
    {
        return $this->belongsTo(Dimension::class);
    }

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function options(): string
    {
        return implode(',', $this->options ?? []);
    }
}
