<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Participant
 *
 * @property int $id
 * @property string $document
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AnswerQuestion[] $answerQuestions
 * @property-read int|null $answer_questions_count
 * @method static \Database\Factories\ParticipantFactory factory(...$parameters)
 * @mixin \Eloquent
 */
class Participant extends Model
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
    ];

    public function answerQuestions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AnswerQuestion::class);
    }
}
