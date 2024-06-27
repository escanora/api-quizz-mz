@extends('components.master')
@section('title', 'Gestion des quizz')

@section('content')
  <div class="row row-cards">
    <div class="col-12">
      <form class="card" action="{{ route('quiz.store') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="row row-cards">
            <div class="col-md-5">
              <div class="mb-3">
                <label class="form-label">Titre <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="titre" placeholder="Titre du quiz" value="{{ old('titre') }}">
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="mb-3">
                <label class="form-label">Durée (min) <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="duree" placeholder="Durée du quiz" value="{{ old('duree') }}">
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="mb-3">
                <label class="form-label">Heure de debut <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="heure_debut" placeholder="Heure de début" value="{{ old('heure_debut') }}">
              </div>
            </div>
            <div class="col-sm-12 col-md-12">
              <div class="mb-3">
                <label class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-end">
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
@endsection