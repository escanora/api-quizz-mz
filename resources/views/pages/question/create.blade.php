@extends('components.master')
@section('title', 'Enregistrement des questions')

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-12">
            <form action="{{ route('question.store') }}" method="POST" class="card" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title ">Formulaire d'enregistrement d'une question</h4>
                    <div>
                        <a href="{{ route('question.index') }}" class="btn btn-sm btn-outline-success">Liste des questions</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label required">Texte</label>
                                <input type="text" class="form-control" name="texte" placeholder="Entrez un texte..." required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label required">Quizz</label>
                                <select class="form-control form-select select_2" id="quizzes_id" name="quizzes_id" required>
                                    <option value="">Choisissez un quizz...</option>
                                    @foreach ($quizzes as $quizz)
                                        <option value="{{ $quizz->id }}">{{ $quizz->titre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control-file" id="fichier" name="fichier">
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
