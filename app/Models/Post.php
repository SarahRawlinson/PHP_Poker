<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(int $id)
 * @property string $description
 * @property string $title
 */
class Post extends Model
{
    use HasFactory;
}
