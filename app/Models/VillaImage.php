<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VillaImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'villa_id',
        'image',
    ];

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
