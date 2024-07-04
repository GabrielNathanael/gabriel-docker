<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FilmModel extends Model
{
    use HasFactory, Notifiable, HasApiTokens;


    protected $fillable = [
        'title',
        'description',
        'release_year',
        'duration',
        'director',
        'genre_id',
    ];

    public function genre() {

    return $this->belongsTo("genre_models","id");
    }
}
