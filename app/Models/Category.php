<?php

namespace App\Models;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function  posts()
{
    return $this->hasMany(Post::class);
}
    protected $fillable = [
        'name'

    ];

/**
 * Get the user that owns the Category
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */

}
