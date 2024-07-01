@extends('components.master')

@section('title', 'Liste des reponses')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Liste des reponses</h3>
                    <div>
                        <a href="{{ route('reponse.create') }}" class="btn btn-sm btn-outline-primary">Nouvelle Reponse</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row row-cards">
                        @if (!$reponses->isNotEmpty())
                            <div class="text-danger text-center">Aucune reponse enregistrée !</div>
                        @endif
                        @foreach ($reponses as $reponse)
                        <div class="col-4">
                            <div class="card">
                                <div class="card-status-top bg-blue"></div>
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">{{ $reponse->question->texte }}</h3>

                                    <form action="{{ route('reponse.destroy', $reponse->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('reponse.edit', $reponse->id) }}" class="btn btn-outline-primary btn-lg me-1" title="Modifier">
                                            <i class="ti ti-edit fs-5"></i>
                                        </a>
                                        <button type="submit" class="btn btn-outline-danger btn-lg" title="Supprimer">
                                            <i class="ti ti-trash fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                                @if ($reponse->question->fichier)
                                    <div class="card-body">
                                        <img src="{{ asset('questions/images/' . $reponse->question->fichier) }}" alt="{{ $reponse->question->texte }}" class="img-fluid w-100" style="max-height: 300px; object-fit: cover;">
                                    </div>
                                @endif
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <div>{{ $reponse->texte }}</div>
                                    <div>
                                        @if ($reponse->est_correcte == 1)
                                            <span class="text-success">Vrai</span>
                                        @else
                                            <span class="text-danger">Faux</span>
                                        @endif
                                    </div>
                                </div>
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
