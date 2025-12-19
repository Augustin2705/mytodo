@extends('layouts.app')

@section('title', 'Nouvelle Tâche')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i>NOUVELLE TODO</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('titre') is-invalid @enderror"
                               id="titre"
                               name="titre"
                               value="{{ old('titre') }}"
                               required>
                        @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="statut" class="form-label">Statut <span class="text-danger">*</span></label>
                        <select class="form-select @error('statut') is-invalid @enderror"
                                id="statut"
                                name="statut"
                                required>
                            <option value="à faire" {{ old('statut') == 'à faire' ? 'selected' : '' }}>À faire</option>
                            <option value="en cours" {{ old('statut') == 'en cours' ? 'selected' : '' }}>En cours</option>
                            <option value="terminée" {{ old('statut') == 'terminée' ? 'selected' : '' }}>Terminée</option>
                        </select>
                        @error('statut')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                            Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check2 me-2"></i>Valider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

