<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class DynamicPage extends Model
{

    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'page_title',
        'page_slug',
        'page_content',
        'status',
    ];

    public array $translatable = [
        'page_title',
        'page_content',
    ];

}
