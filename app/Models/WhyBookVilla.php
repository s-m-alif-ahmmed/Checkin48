<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class WhyBookVilla extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $guarded = [];

    protected $fillable = [
        'icon',
        'title',
        'description',
        'slug',
        'status',
    ];

    public array $translatable = [
        'title',
        'description',
    ];

}
