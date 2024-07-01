<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'quizzes_id',
        'texte',
        'fichier'
    ];

    public function quizzes() {
        return $this->belongsTo(Quizz::class, 'quizzes_id');
    }

    public function reponses() {
        return $this->hasMany(Reponse::class, 'questions_id');
    }
}
