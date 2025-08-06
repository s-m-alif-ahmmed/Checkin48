<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Cms extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'banner_title',
        'sub_title',
        'banner_image',
        'banner_image_mobile',
        'page_title',
        'page_description',
        'page_image',
        'button_title',
        'button_url',
        'title',
        'image',
        'status',
    ];

    public array $translatable = [
        'title',
        'banner_title',
        'button_title',
        'sub_title',
        'page_title',
        'page_description',
    ];


}
