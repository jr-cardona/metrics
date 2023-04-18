<?php

namespace App\Models;

use Database\Factories\AnswerFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\AnswerQuestion
 *
 * @property int $id
 * @property string $value
 * @property int $question_id
 * @property int $participant_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static AnswerFactory factory(...$parameters)
 * @mixin Eloquent
 */
class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }
}
