@extends('components.master')
@section('title', 'Modification des quizz')

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-12">
            <form action="{{ route('quizz.update', $quizz->id) }}" method="POST" class="card">
                @csrf
                @method('PUT')
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title ">Formulaire d'enregistrement d'un quizz</h4>
                    <div>
                        <a href="{{ route('quizz.index') }}" class="btn btn-sm btn-outline-success">Liste des quizzes</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label required">Titre</label>
                                <input type="text" class="form-control" name="titre" value="{{ $quizz->titre }}" placeholder="Entrez un titre..." required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label required">Durée (min)</label>
                                <input type="number" class="form-control" name="duree" value="{{ $quizz->duree }}" placeholder="Entrez une durée..." required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label required">Heure de début</label>
                                <input type="time" class="form-control" name="heure_debut" value="{{ Carbon\Carbon::parse($quizz->heure_debut)->format('H:i') }}" placeholder="Entrez une heure de début..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="6" placeholder="Ecrivez une description du quizz..">{{ $quizz->description }}</textarea>
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