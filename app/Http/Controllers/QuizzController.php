<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

        return view('pages.quizz.index', compact('quizzes'));
    }

    // methode pour creer les quizz et les envoyer en DB
    public function create() {
        return view('pages.quizz.create');
    }

    // methode pour enregistrer les quizz dans la DB
    public function store(Request $request) {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'duree' => 'required',
            'heure_debut' => 'required|date_format:H:i'
        ]);

        $quizz = new Quizz();
        $quizz->titre = $request->titre;
        $quizz->description = $request->description;
        $quizz->duree = $request->duree;
        $quizz->heure_debut = Carbon::createFromFormat('H:i', $request->heure_debut)->format('H:i');

        $quizz->save();


        return redirect('quizz');
    }

    // Affiche un quizz spécifique
    public function show($id)
    {
        $quizz = Quizz::findOrFail($id);
        return view('pages.quizz.show', compact('quizz'));
    }

    // Affiche le formulaire d'édition
    public function edit($id)
    {
        return view('pages.quizz.edit');
    }

    // Met à jour un quizz spécifique
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'titre' => 'required',
        //     'description' => 'required',
        //     'duree' => 'required',
        //     'heure_debut' => 'required|date_format:H:i'
        // ]);

        // $quizz = Quizz::findOrFail($id);
        // $quizz->titre = $request->titre;
        // $quizz->description = $request->description;
        // $quizz->duree = $request->duree;
        // $quizz->heure_debut = $request->heure_debut;

        // $quizz->save();

        // return redirect('quizz');
    }

    // Supprime un quizz spécifique
    public function destroy($id)
    {
        $quizz = Quizz::findOrFail($id);
        $quizz->delete();

        return back();
    }
}
