<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'name',
        'status',
    ];

    public array $translatable = [
        'name',
    ];

    // Many-to-Many Relationship with Blogs
    // Define the relationship with Blog
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tags')->withTimestamps();
    }
}
