<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credential extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'facebook_client_id',
        'facebook_client_secret_id',
        'google_client_id',
        'google_client_secret_id',
    ];

}
