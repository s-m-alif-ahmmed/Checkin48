<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Amenity extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'name',
        'image',
        'status',
    ];

    public array $translatable = [
        'name',
    ];

    public function villas()
    {
        return $this->belongsToMany(Villa::class, 'villa_amenities')->withTimestamps();
    }

}
