<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $fillable = [
        'titre',
        'description',
        'duree',
        'heure_debut',
        'modos_id'
    ];
}
