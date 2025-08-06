<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'villa_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function villa(){
        return $this->belongsTo(Villa::class);
    }


}
