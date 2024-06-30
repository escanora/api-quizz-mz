@extends('components.master')

@section('title', 'Liste des quizz')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Liste des quizz</h3>
            <div>
                <a href="{{ route('quizz.create') }}" class="btn btn-sm btn-outline-success">Nouveau Quiz</a>
            </div>
        </div>
        <div class="card-body border-bottom py-3">
            <div class="d-flex">
                <div class="text-secondary">
                    Détail
                    <div class="mx-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                    </div>
                    entrées
                </div>
                <div class="ms-auto text-secondary">
                    Recherche:
                    <div class="ms-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1">
                            <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Tout selectionner">
                        </th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Heure de début</th>
                        <th>Durée (min)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quizz)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                            <td>{{ $quizz->titre }}</td>
                            <td>{{ $quizz->description }}</td>
                            <td>{{ Carbon\Carbon::parse($quizz->heure_debut)->format('H:i') }}</td>
                            <td>{{ $quizz->duree }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <form action="{{ route('quizz.destroy', $quizz->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('quizz.edit', $quizz->id) }}" class="btn btn-outline-primary btn-lg me-1" title="Modifier">
                                            <i class="ti ti-edit fs-5"></i>
                                        </a>
                                        <button type="submit" class="btn btn-outline-danger btn-lg" title="Supprimer">
                                            <i class="ti ti-trash fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-secondary">Affichage de <span>1</span> à <span>{{ $quizzes->count() }}</span> sur <span>{{ $quizzes->total() }}</span> entrées</p>
            <ul class="pagination m-0 ms-auto">
                {{ $quizzes->links() }}
            </ul>
        </div>
    </div>
</div>
@endsection
