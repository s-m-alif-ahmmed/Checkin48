<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class SystemSetting extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'email',
        'system_name',
        'copyright_text',
        'logo',
        'favicon',
        'description',
    ];

    public array $translatable = [
        'title',
        'system_name',
        'copyright_text',
        'description',
    ];

}
