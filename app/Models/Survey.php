<?php

namespace App\Models;

use App\Presenters\HasURLPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * App\Models\Survey
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection<Dimension> $dimensions
 * @property-read \Illuminate\Database\Eloquent\Collection<Question> $questions
 * @property-read int|null $dimensions_count
 * @mixin \Eloquent
 */
class Survey extends Model
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
    ];

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class)->withPivot('number', 'is_active');
    }
}
