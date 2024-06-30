@extends('components.master')
@section('title', 'Enregistrement des quizz')

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-12">
            <form action="{{ route('quizz.store') }}" method="POST" class="card">
                @csrf
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title ">Formulaire d'enregistrement d'un quizz</h4>
                    <div>
                        <a href="{{ route('quizz.index') }}" class="btn btn-sm btn-outline-success">Liste des quizzes</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row g-5">
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-md-6 col-xl-12">
                                    <div class="mb-3">
                                        <label class="form-label required">Titre</label>
                                        <input type="text" class="form-control" name="titre" placeholder="Entrez un titre..." required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Durée (min)</label>
                                        <input type="number" class="form-control" name="duree" placeholder="Entrez une durée..." required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Heure de début</label>
                                        <input type="time" class="form-control" name="heure_debut" placeholder="Entrez une heure de début..." required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="6" placeholder="Ecrivez une description du quizz.."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
