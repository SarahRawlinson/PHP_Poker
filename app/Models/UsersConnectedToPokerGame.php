<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersConnectedToPokerGame extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'poker_game_id'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

//    /**
//     * @return BelongsTo
//     */
//    public function poker_game(): BelongsTo
//    {
//        return $this->belongsTo(PokerGame::class);
//    }
}
