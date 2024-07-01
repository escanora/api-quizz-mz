@extends('components.master')
@section('title', 'Modification des réponses')

@section('content')
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form action="{{ route('reponse.update', $reponse->id) }}" method="POST" class="card" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Formulaire de modification d'une réponse</h4>
                        <div>
                            <a href="{{ route('reponse.index') }}" class="btn btn-sm btn-outline-primary">Liste des réponses</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label required">Question</label>
                                    <select class="form-control form-select" id="questions_id" name="questions_id" required>
                                        <option value="">Choisissez une question...</option>
                                        @foreach ($questions as $question)
                                            <option value="{{ $question->id }}" data-image="{{ $question->fichier ? asset('questions/images/' . $question->fichier) : '' }}" {{ $question->id == $reponse->questions_id ? 'selected' : '' }}>
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
                                    <input type="text" class="form-control" name="texte" value="{{ $reponse->texte }}" placeholder="Entrez un texte..." required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label required">Vrai ou Faux</label>
                                    <select class="form-control form-select" id="est_correcte" name="est_correcte" required>
                                        <option value="1" {{ $reponse->est_correcte == 1 ? 'selected' : '' }}>Vrai</option>
                                        <option value="0" {{ $reponse->est_correcte == 0 ? 'selected' : '' }}>Faux</option>
                                    </select>
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

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const questionsSelect = document.getElementById('questions_id');
        const questionImageContainer = document.getElementById('question-image');
        const questionImage = questionImageContainer.querySelector('img');

        function updateQuestionImage() {
            const selectedOption = questionsSelect.options[questionsSelect.selectedIndex];
            const imageUrl = selectedOption.getAttribute('data-image');

            if (imageUrl) {
                questionImage.src = imageUrl;
                questionImageContainer.style.display = 'block';
            } else {
                questionImageContainer.style.display = 'none';
            }
        }

        // Appel initial pour définir l'image au chargement de la page
        updateQuestionImage();

        questionsSelect.addEventListener('change', updateQuestionImage);
    });
</script>
@endsection
