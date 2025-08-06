<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ExpertTeamMember extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'designation',
        'image',
        'status',
        'skype',
        'email',
        'linkedin',
    ];

    public array $translatable = [
        'name',
        'designation',
    ];

}
