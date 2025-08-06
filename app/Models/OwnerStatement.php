<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class OwnerStatement extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'statement',
    ];

    public array $translatable = [
        'statement',
    ];

    public function villas()
    {
        return $this->belongsToMany(Villa::class, 'villa_owner_statements')->withTimestamps();
    }

}
