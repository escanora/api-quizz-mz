@extends('components.master')

@section('title', 'Liste des quizz')

@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="card-title">Liste des quizz</h3>
          <div>
            <a href="{{ route('quiz.create') }}" class="btn btn-sm btn-outline-success">Nouveau Quiz</a>
          </div>
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
                <th>Durée</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($quizzes as $quiz)
            <tr>
              <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
              <td>{{ $quiz->titre }}</td>
              <td>{{ $quiz->description }}</td>
              <td>{{ $quiz->heure_debut }}</td>
              <td>{{ $quiz->duree }}</td>
              <td class="text-center">
                <div class="btn-group" role="group" aria-label="Actions">
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier">
                    <i class="ti ti-edit"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer">
                    <i class="ti ti-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-secondary">Affichage de <span>1</span> à <span>8</span> sur <span>16</span> entrées</p>
        <ul class="pagination m-0 ms-auto">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                <i class="ti ti-chevron-left"></i>
                pre
            </a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">2</a></li>
          <li class="page-item">
            <a class="page-link" href="#">
              next
              <i class="ti ti-chevron-right"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
