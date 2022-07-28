<?php

namespace App\Models;

use App\Presenters\HasURLPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Survey
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection<Question> $questions
 * @mixin \Eloquent
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $questions_count
 * @method static \Database\Factories\SurveyFactory factory(...$parameters)
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

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
