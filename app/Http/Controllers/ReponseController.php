<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ReponseController extends Controller
{
    // methode pour afficher les listes de la DB
    public function index() {
        $quizzes = Quizz::select(DB::raw("
            reponse.id as id,
            reponse.titre as titre,
            reponse.description as description,
        "))->paginate(8);

        return view('pages.reponse.index', compact('reponse'));
    }

    // methode pour creer les reponses et les envoyer en DB
    public function create() {
        return view('pages.reponse.create');
    }

    // methode pour enregistrer les reponses dans la DB
    public function store(Request $request) {
        $request->validate([
            'titre',
            'description',
        ]);
    }

    // Affiche un reponse spécifique
    public function show($id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        return response()->json($quiz);
    }

    // Affiche le formulaire d'édition
    public function edit($id)
    {
        //
    }

    // Met à jour une reponse spécifique
    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());
        return response()->json($quiz);
    }

    // Supprime une reponse spécifique
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        return response()->json(null, 204);

        $reponse = new Quizz();
        $reponse->titre = $request->titre;
        $reponse->description = $request->description;

        $reponse->save();

        return redirect('quiz');
    }

}