<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 */
class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];
}
