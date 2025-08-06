<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PriceType extends Model
{

    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'status',
    ];

    public array $translatable = [
        'name',
    ];

    // Relationship to villas
    public function villas()
    {
        return $this->hasMany(Villa::class, 'price_type_id_one');
    }

    public function villas_two()
    {
        return $this->hasMany(Villa::class, 'price_type_id_two');
    }

    public function villas_three()
    {
        return $this->hasMany(Villa::class, 'price_type_id_three');
    }

    public function villas_four()
    {
        return $this->hasMany(Villa::class, 'price_type_id_four');
    }
}
