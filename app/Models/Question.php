<?php

namespace App\Models;

use App\Presenters\HasURLPresenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes;

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
        'options' => 'array',
        'dimension_id' => 'integer',
        'category_id' => 'integer',
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'options' => '{}',
    ];

    public function dimension(): BelongsTo
    {
        return $this->belongsTo(Dimension::class);
    }

    public function surveys(): BelongsToMany
    {
        return $this->belongsToMany(Survey::class)->withPivot('number', 'is_active');
    }
}
