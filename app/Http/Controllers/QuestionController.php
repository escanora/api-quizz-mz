<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quizz;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    // methode pour afficher les listes de la DB
    public function index() {
        $questions = Question::select(DB::raw("
            questions.id as id,
            questions.texte as texte,
            questions.fichier as fichier,
            quizzes.titre as quizz
        "))->leftJoin('quizzes', 'quizzes.id', '=', 'questions.quizzes_id')
            ->paginate(8);

        return view('pages.question.index', compact('questions'));
    }

    // methode pour creer les question et les envoyer en DB
    public function create() {
        $quizzes = Quizz::all();
        return view('pages.question.create', compact('quizzes'));
    }

    // methode pour enregistrer les question dans la DB
    public function store(Request $request) {
        $request->validate([
            'texte' => 'required',
            'quizzes_id' => 'required',
            'fichier' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $question = new Question();
        $question->texte = $request->texte;
        $question->quizzes_id = $request->quizzes_id;

        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('questions/images'), $filename);
            $question->fichier = $filename;
        }

        $question->save();

        return redirect('/question');
    }


    // Affiche un question spécifique
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('pages.question.show', compact('question'));
    }

    // Affiche le formulaire d'édition
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $quizzes = Quizz::all();
        return view('pages.question.edit', compact('question', 'quizzes'));
    }

    // Met à jour un question spécifique
    public function update(Request $request, $id)
    {
        $request->validate([
            'texte' => 'required',
            'quizzes_id' => 'required',
            'fichier' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $question = Question::findOrFail($id);
        $question->texte = $request->texte;
        $question->quizzes_id = $request->quizzes_id;

        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('questions/images'), $filename);
            $question->fichier = $filename;
        }

        $question->save();

        return redirect('/question');

    }

    // Supprime un question spécifique
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect('/question');
    }
}
