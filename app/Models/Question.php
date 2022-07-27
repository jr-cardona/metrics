<?php

namespace App\Models;

use App\Presenters\HasURLPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Question
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property bool $is_active
 * @property string $type
 * @property int $number
 * @property int|null $dimension_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answers_count
 * @property-read \App\Models\Dimension|null $dimension
 * @property-read int|null $options_count
 * @mixin \Eloquent
 * @property array|null $options
 */
class Question extends ModelBase
{
    use HasFactory;
    use HasURLPresenter;

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
        'is_active' => 'boolean',
        'number' => 'integer',
        'dimension_id' => 'integer',
        'options' => 'array',
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'options' => '{}',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function dimension(): BelongsTo
    {
        return $this->belongsTo(Dimension::class);
    }

    public function getLastNumber(): int
    {
        if (!empty($this->dimension_id)) {
            return $this->dimension->survey->questions()
                ->orderBy('number', 'desc')
                ->value('number');
        }

        return Question::whereDoesntHave('dimension')
            ->orderBy('number', 'desc')
            ->value('number');
    }
}
