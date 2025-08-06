<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Villa extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'user_id',
        'country_id',
        'city_id',
        'title',
        'price',
        'description',
        'full_address',
        'map_location',
        'property_type',
        'property_label_id',
        'room',
        'bathroom',
        'balcony',
        'kitchen',
        'living_room',
        'bar',
        'pool',
        'garage',
        'check_in_time',
        'check_out_time',
        'adults',
        'childrens',
        'infants',
        'pets',
        'villa_rules',
        'signature',
        'payment_option',
        'slug',
        'status',

        // Additional fields for pricing
        'price_type_id_one',
        'price_type_id_two',
        'price_type_id_three',
        'price_type_id_four',
        'price_two',
        'price_three',
        'price_four',
    ];

    protected $casts = [
        'title' => 'array',
        'full_address' => 'array',
        'description' => 'array',
    ];

    public array $translatable = [
        'title',
        'description',
        'full_address',
        'map_location',
        'villa_rules',
    ];

     // Relationship to the first price type
     public function price_type_one()
     {
         return $this->belongsTo(PriceType::class, 'price_type_id_one');
     }

     // Relationship to the second price type
     public function price_type_two()
     {
         return $this->belongsTo(PriceType::class, 'price_type_id_two');
     }

     // Relationship to the third price type
     public function price_type_three()
     {
         return $this->belongsTo(PriceType::class, 'price_type_id_three');
     }

     // Relationship to the fourth price type
     public function price_type_four()
     {
         return $this->belongsTo(PriceType::class, 'price_type_id_four');
     }

    // Relationship with the User model (One to Many)
    public function user()
    {
        return $this->belongsTo(User::class);  // A villa belongs to one user
    }

    // Relationship with the PropertyLabel model (One to Many)
    public function propertyLabel()
    {
        return $this->belongsTo(PropertyLabel::class);  // A villa belongs to one user
    }

    // Relationship with the Country model (One to Many)
    public function country()
    {
        return $this->belongsTo(Country::class);  // A villa belongs to one user
    }

    // Relationship with the City model (One to Many)
    public function city()
    {
        return $this->belongsTo(City::class);  // A villa belongs to one user
    }


    // Relationship with the VillaImage model (One to Many)
    public function villa_images()
    {
        return $this->hasMany(VillaImage::class);  // A villa can have many reviews
    }


    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'villa_amenities')->withTimestamps();
    }

    public function statements()
    {
        return $this->belongsToMany(OwnerStatement::class, 'villa_owner_statements')->withTimestamps();
    }

    // Relationship with the Review model (One to Many)
    public function reviews()
    {
        return $this->hasMany(Review::class);  // A villa can have many reviews
    }

    // add to favourite In Villa model
    public function favouritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favourites', 'villa_id', 'user_id');
    }


    // Relationship with Booking (a villa can have many bookings)
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    //one villa have many date off
    public function dateOffs()
    {
        return $this->hasMany(VillaOffDate::class);
    }
}
