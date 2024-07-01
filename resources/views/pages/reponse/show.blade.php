@extends('components.master')

@section('title', 'Détails de la réponse')

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $reponse->question->texte }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ $reponse->texte }}</p>
                    @if ($reponse->fichier)
                        <img src="{{ asset('reponses/images/' . $reponse->fichier) }}" alt="Image de la réponse">
                    @endif
                    <p>{{ $reponse->est_correcte ? 'Vrai' : 'Faux' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
