<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $data)
 * @property mixed $user_id
 * @property mixed $id;
 */
class PokerGame extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function usersConnectedToPokerGame(): HasMany
    {
        return $this->hasMany(UsersConnectedToPokerGame::class)->where('poker_game_id', $this->id);
    }
}
