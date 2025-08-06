<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class OurMission extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'sub_title',
        'media',
        'heading_one_title',
        'heading_one_description',
        'heading_two_title',
        'heading_two_description',
        'heading_three_title',
        'heading_three_description',
        'status',
    ];

    public array $translatable = [
        'title',
        'sub_title',
        'heading_one_title',
        'heading_one_description',
        'heading_two_title',
        'heading_two_description',
        'heading_three_title',
        'heading_three_description',
    ];

}
