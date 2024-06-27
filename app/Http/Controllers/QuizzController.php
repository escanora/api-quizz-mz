<?php

namespace App\Http\Controllers;

use App\Models\Quizz;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class QuizzController extends Controller
{
    // methode pour afficher les listes de la DB
    public function index() {
        $quizzes = Quizz::select(DB::raw("
            quizzes.id as id,
            quizzes.titre as titre,
            quizzes.description as description,
            quizzes.duree as duree,
            quizzes.heure_debut as heure_debut
        "))->paginate(8);

        return view('pages.quiz.index', compact('quizzes'));
    }

    // methode pour creer les quizz et les envoyer en DB
    public function create() {
        return view('pages.quiz.create');
    }

    // methode pour enregistrer les quizz dans la DB
    public function store(Request $request) {
        $request->validate([
            'titre',
            'description',
            'duree',
            'heure_debut'
        ]);

        $quizz = new Quizz();
        $quizz->titre = $request->titre;
        $quizz->description = $request->description;
        $quizz->duree = $request->duree;
        $quizz->heure_debut = $request->heure_debut;

        $quizz->save();

        return redirect('quiz');
    }
}
