<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class FooterButton extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'title',
        'button_one',
        'button_two',
        'button_three',
        'button_four',
        'button_five',
        'button_one_url',
        'button_two_url',
        'button_three_url',
        'button_four_url',
        'button_five_url',
    ];

    public array $translatable = [
        'title',
        'button_one',
        'button_two',
        'button_three',
        'button_four',
        'button_five',
    ];
}
