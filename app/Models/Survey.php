<?php

namespace App\Models;

use App\Presenters\HasURLPresenter;
use Database\Factories\SurveyFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Carbon;

/**
 * App\Models\Survey
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static SurveyFactory factory(...$parameters)
 * @mixin Eloquent
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

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
