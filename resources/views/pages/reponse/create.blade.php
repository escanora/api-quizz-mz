@extends('components.master')
@section('title', 'Enregistrement des reponses')

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-12">
            <form action="{{ route('reponse.store') }}" method="POST" class="card" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Formulaire d'enregistrement d'une reponse</h4>
                    <div>
                        <a href="{{ route('reponse.index') }}" class="btn btn-sm btn-outline-primary">Liste des reponses</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label required">Question</label>
                                <select class="form-control form-select select_2" id="questions_id" name="questions_id" required>
                                    <option value="">Choisissez une question...</option>
                                    @foreach ($questions as $question)
                                        <option value="{{ $question->id }}" data-image="{{ $question->fichier ? asset('questions/images/' . $question->fichier) : '' }}">
                                            {{ $question->texte }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12" id="question-image" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Image de la question</label>
                                <img src="" alt="Image de la question" style="max-width: 100%; height: auto;">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label required">Reponse</label>
                                <input type="text" class="form-control" name="texte" placeholder="Entrez un texte..." required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label required">Vrai ou Faux</label>
                                <select class="form-control form-select select_2" id="est_correcte" name="est_correcte" required>
                                    <option value="">Choisissez...</option>
                                    <option value="1">Vrai</option>
                                    <option value="0">Faux</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Image de la réponse (facultatif)</label>
                                <input type="file" class="form-control" name="fichier">
                            </div>
                        </div> --}}
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

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const questionsSelect = document.getElementById('questions_id');
            const questionImageContainer = document.getElementById('question-image');
            const questionImage = questionImageContainer.querySelector('img');

            questionsSelect.addEventListener('change', function () {
                const selectedOption = questionsSelect.options[questionsSelect.selectedIndex];
                const imageUrl = selectedOption.getAttribute('data-image');

                if (imageUrl) {
                    questionImage.src = imageUrl;
                    questionImageContainer.style.display = 'block';
                } else {
                    questionImageContainer.style.display = 'none';
                }
            });
        });
    </script>
@endsection
