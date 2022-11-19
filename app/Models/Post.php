<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
