<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'user_id',
        'image',
        'title',
        'slug',
        'status',
        'description',
        'body',
    ];

    public array $translatable = [
        'title',
        'description',
        'body',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Define the relationship with Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags')->withTimestamps();
    }

}
