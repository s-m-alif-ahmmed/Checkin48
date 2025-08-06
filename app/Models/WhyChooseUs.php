<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class WhyChooseUs extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'image',
        'description',
        'slug',
        'status',
    ];

    public array $translatable = [
        'title',
        'description',
    ];

}
