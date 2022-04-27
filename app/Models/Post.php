<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static firstOrCreate(mixed $data)
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = [];
}
