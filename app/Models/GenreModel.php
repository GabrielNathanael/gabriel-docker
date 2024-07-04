<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenreModel extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
    ];

}
