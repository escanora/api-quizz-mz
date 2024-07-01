<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ReponseController extends Controller
{
    // methode pour afficher les listes de la DB
    public function index() {
        $reponses = Reponse::with('question')->paginate(8);
        return view('pages.reponse.index', compact('reponses'));
    }

    // methode pour creer les reponse et les envoyer en DB
    public function create() {
        $questions = Question::all();
        return view('pages.reponse.create', compact('questions'));
    }

    // methode pour enregistrer les reponse dans la DB
    public function store(Request $request) {
        $request->validate([
            'texte' => 'required',
            'questions_id' => 'required',
            'est_correcte' => 'required|in:0,1'
        ]);

        $reponse = new Reponse();
        $reponse->texte = $request->texte;
        $reponse->questions_id = $request->questions_id;
        $reponse->est_correcte = (int) $request->est_correcte;

        $reponse->save();

        return redirect('/reponse');
    }


    // Affiche un reponse spécifique
    public function show($id)
    {
        $reponse = Reponse::with('question')->findOrFail($id);
        return view('pages.reponse.show', compact('reponse'));
    }

    // Affiche le formulaire d'édition
    public function edit($id)
    {
        $reponse = Reponse::findOrFail($id);
        $questions = Question::all();
        return view('pages.reponse.edit', compact('reponse', 'questions'));
    }

    // Met à jour un reponse spécifique
    public function update(Request $request, $id)
    {
        $request->validate([
            'texte' => 'required',
            'questions_id' => 'required',
            'est_correcte' => 'required|in:0,1'
        ]);

        $reponse = Reponse::findOrFail($id);
        $reponse->texte = $request->texte;
        $reponse->questions_id = $request->questions_id;
        $reponse->est_correcte = (int) $request->est_correcte;

        $reponse->save();

        return redirect('/reponse');

    }

    // Supprime un reponse spécifique
    public function destroy($id)
    {
        $reponse = Reponse::findOrFail($id);
        $reponse->delete();

        return redirect('/reponse');
    }
}
