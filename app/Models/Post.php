<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static findOrFail(int $id)
 * @method static create(array $array)
 * @property string $description
 * @property string $title
 * @property mixed $id
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
