@extends('layouts.app')

@section('title', 'Liste des Tâches')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>TODO LISTE </h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>NOUVELLE TODO
    </a>
</div>


<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Filtre par statut</h5>
        <div class="btn-group" role="group" aria-label="Filtres de statut">
            <a href="{{ route('tasks.index') }}" class="btn {{ request('statut') == '' ? 'btn-primary' : 'btn-outline-primary' }}">
                Toute
            </a>
            <a href="{{ route('tasks.index', ['statut' => 'à faire']) }}"
               class="btn {{ request('statut') == 'à faire' ? 'btn-secondary' : 'btn-outline-secondary' }}">
             À faire

            </a>
            <a href="{{ route('tasks.index', ['statut' => 'en cours']) }}"
               class="btn {{ request('statut') == 'en cours' ? 'btn-warning' : 'btn-outline-warning' }}">
                En cours

            </a>
            <a href="{{ route('tasks.index', ['statut' => 'terminée']) }}"
               class="btn {{ request('statut') == 'terminée' ? 'btn-success' : 'btn-outline-success' }}">
                Terminée
            </a>
        </div>
    </div>
</div>



@if($tasks->count() > 0)
    <div class="row">
        @foreach($tasks as $task)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">{{ $task->titre }}</h5>
                            <span class="badge
                                @if($task->statut == 'terminée') bg-success
                                @elseif($task->statut == 'en cours') bg-warning
                                @else bg-secondary
                                @endif">
                                {{ $task->statut }}
                            </span>
                        </div>
                        @if($task->description)
                            <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($task->description, 100) }}</p>
                        @endif
                        <small class="text-muted d-block mb-3">
                            Créée le {{ $task->created_at->format('d/m/Y à H:i') }}<br>
                           Modifiée le {{ $task->updated_at->format('d/m/Y à H:i') }}
                        </small>
                        <div class="btn-group w-100" role="group">
                            @if($task->statut != 'terminée')
                                <form action="{{ route('tasks.complete', $task) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="btn btn-sm btn-success">

                                        <i class="bi bi-check2 me-1"></i>Terminer
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Voulez-vous vraiment supprimer cette todo ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash me-1"></i>Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info text-center">

        <h4>Aucune todo pour le moment</h4>

    </div>
@endif
@endsection

