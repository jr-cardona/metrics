<?php

namespace App\Models;

use Database\Factories\ParticipantFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Participant
 *
 * @property int $id
 * @property string $document
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ParticipantFactory factory(...$parameters)
 * @mixin Eloquent
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

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
