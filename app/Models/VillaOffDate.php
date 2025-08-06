<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VillaOffDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'villa_id',
        'off_date',
    ];

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
