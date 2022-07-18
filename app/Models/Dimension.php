<?php

namespace App\Models;

use App\Presenters\URLTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Dimension
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<Question> $questions
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Dimension whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dimension whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dimension whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dimension whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dimension whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Dimension extends Model
{
    use HasFactory;
    use URLTrait;
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
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
