<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class BenefitsOfJoining extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'sub_title',
        'image',
        'title_two',
        'title_three',
        'title_four',
        'status',
    ];

    public array $translatable = [
        'title',
        'sub_title',
        'title_two',
        'title_three',
        'title_four',
    ];
}
