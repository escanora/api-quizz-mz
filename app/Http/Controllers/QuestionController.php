<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    // methode pour afficher les listes de la DB
    public function index() {
        $question = Quizz::select(DB::raw("
            question.id as id,
            question.titre as titre,
            question.description as description,
        "))->paginate(8);

        return view('pages.question.index', compact('question'));
    }

    // methode pour creer les question et les envoyer en DB
    public function create() {
        return view('pages.question.create');
    }

    // methode pour enregistrer les question dans la DB
    public function store(Request $request) {
        $request->validate([
            'titre',
            'description',
        ]);
    }

    // Affiche un question spécifique
    public function show($id)
    {
        $question = Quizz::with('questions.answers')->findOrFail($id);
        return response()->json($question);
    }

    // Affiche le formulaire d'édition
    public function edit($id)
    {
        //
    }

    // Met à jour un question spécifique
    public function update(Request $request, $id)
    {
        $question = Quizz::findOrFail($id);
        $question->update($request->all());
        return response()->json($question);
    }

    // Supprime un question spécifique
    public function destroy($id)
    {
        $question = Quizz::findOrFail($id);
        $question->delete();
        return response()->json(null, 204);

        $question = new Quizz();
        $question->titre = $request->titre;
        $question->description = $request->description;

        $question->save();

        return redirect('question');
    }
}
