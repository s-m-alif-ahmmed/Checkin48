<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'villa_id',
        'name',
        'email',
        'number',
        'people',
        'country',
        'check_in_date',
        'check_out_date',
        'guest_count',
        'nights',
        'villa_day_price',
        'tax_percent',
        'tax',
        'subtotal',
        'total_amount',
        'hand_cash',
        'online_payment',
        'payment_option',
        'payment_status',
        'status',
    ];

    // Relationship with User (a booking belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Villa (a booking belongs to a villa)
    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }

    public function priceType()
    {
        return $this->belongsTo(PriceType::class, 'price_type_id');
    }

    public function userStatements()
    {
        return $this->belongsToMany(UserStatement::class, 'booking_user_statements')->withTimestamps();
    }

}
