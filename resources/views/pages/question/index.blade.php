@extends('components.master')

@section('title', 'Liste des questions')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Liste des questions</h3>
                    <div>
                        <a href="{{ route('question.create') }}" class="btn btn-sm btn-outline-primary">Nouvelle Question</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row row-cards">
                        @if (!$questions->isNotEmpty())
                            <div class="text-danger text-center">Aucune question enregistrée !</div>
                        @endif
                        @foreach ($questions as $question)
                        <div class="col-4">
                            <div class="card">
                                <div class="card-status-top bg-blue"></div>
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">{{ $question->quizz }}</h3>

                                    <form action="{{ route('question.destroy', $question->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('question.edit', $question->id) }}" class="btn btn-outline-primary btn-lg me-1" title="Modifier">
                                            <i class="ti ti-edit fs-5"></i>
                                        </a>
                                        <button type="submit" class="btn btn-outline-danger btn-lg" title="Supprimer">
                                            <i class="ti ti-trash fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    {{ $question->texte }}
                                </div>
                                @if ($question->fichier)
                                    <div class="card-footer">
                                        <img src="{{ asset('questions/images/' . $question->fichier) }}" alt="titre" width="100" height="100">
                                    </div>
                                @else
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
