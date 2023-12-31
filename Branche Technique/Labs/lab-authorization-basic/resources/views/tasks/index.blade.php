@extends('layouts.master')
@include('layouts.nav')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between my-3">
            <h2>Les Tâches</h2>

            {{-- btn create --}}
            @can('create-tasks')
                <a href="{{ route('tasks.create') }}" type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nouveau Tâche
                </a>
            @endcan

        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="card">
            <div class="card-header d-flex flex-row-reverse bd-highlight">
                <div class="input-group w-25">
                    <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche"
                        aria-describedby="basic-addon1" id="search-input">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Nom de Projet</th>
                            @can('show-tasks')
                              <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody id="search-result">
                        @include('tasks.search')
                    </tbody>
                    <input type="hidden" id='page' value="1">
                </table>
            </div>
        </div>
    </div>

    {{-- script search by ajax --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS/tasks.js"></script>
@endsection
