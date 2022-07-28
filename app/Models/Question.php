<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Question
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string|null $code
 * @property int $number
 * @property bool $is_active
 * @property int|null $dimension_id
 * @property int|null $survey_id
 * @property string|null $type
 * @property array|null $options
 * @property string $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Dimension|null $dimension
 * @property-read \App\Models\Survey|null $survey
 * @method static \Database\Factories\QuestionFactory factory(...$parameters)
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
