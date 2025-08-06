<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
        'provider',
        'google_id',
        'provider_token',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at'     => 'datetime',
            'password'              => 'hashed',
            'terms_and_policy'      => 'boolean',
            'name'                  => 'string',
            'username'              => 'string',
            'email'                 => 'string',
            'number'                => 'string',
            'address'               => 'string',
            'avatar'                => 'string',
            'gender'                => 'string',
            'role'                  => 'string',
            'provider'             => 'string',
            'provider_id'              => 'string',
            'reset_code'            => 'string',
            'reset_code_expires_at' => 'datetime',
        ];
    }


    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function villas()
    {
        return $this->hasMany(Villa::class);
    }


   // add to favourite In User model
    public function favourites()
    {
        return $this->belongsToMany(Villa::class, 'favourites', 'user_id', 'villa_id');
    }


    // Relationship with Booking (a user can have many bookings)
   public function bookings()
   {
       return $this->hasMany(Booking::class);
   }

    // User has many WithdrawRequests
    public function withdrawRequests()
    {
        return $this->hasMany(WithdrawRequest::class);
    }
}
