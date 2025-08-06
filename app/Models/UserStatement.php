<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class UserStatement extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'statement',
    ];

    public array $translatable = [
        'statement',
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_user_statements')->withTimestamps();
    }
}
