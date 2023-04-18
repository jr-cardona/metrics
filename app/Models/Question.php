<?php

namespace App\Models;

use Database\Factories\QuestionFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Carbon;

/**
 * App\Models\Question
 *
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static QuestionFactory factory(...$parameters)
 * @mixin Eloquent
 */
class Question extends Model
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

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function options(): string
    {
        return implode(',', $this->options ?? []);
    }
}
