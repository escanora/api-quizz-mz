@extends('components.master')
@section('title', 'Modification des question')

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-12">
            <form action="{{ route('question.update', $question->id) }}" method="POST" class="card" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Formulaire de modification d'une question</h4>
                    <div>
                        <a href="{{ route('question.index') }}" class="btn btn-sm btn-outline-primary">Liste des questions</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label required">Texte</label>
                                <input type="text" class="form-control" name="texte" value="{{ $question->texte }}" placeholder="Entrez un texte..." required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label required">Quizz</label>
                                <select class="form-control form-select" id="quizzes_id" name="quizzes_id" required>
                                    <option value="">Choisissez un quizz...</option>
                                    @foreach ($quizzes as $quizz)
                                        <option value="{{ $quizz->id }}" {{ $quizz->id == $question->quizzes_id ? 'selected' : '' }}>
                                            {{ $quizz->titre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Image </label>
                                @if ($question->fichier)
                                    <div>
                                        <img src="{{ asset('questions/images/' . $question->fichier) }}" alt="{{ $question->texte }}" width="150">
                                    </div>
                                @else
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Changer l'image</label>
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
