@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Comunas') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('comunas.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                            Comunas
                        </a>
                        <a href="{{ route('regions.index') }}" class="list-group-item list-group-item-action">Regiones</a>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Carreras') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('carreras.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                            Carreras
                        </a>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Sedes') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('escuelas.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                            Escuelas
                        </a>
                        <a href="{{ route('sedes.index') }}" class="list-group-item list-group-item-action">Sedes</a>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                            Usuarios
                        </a>
                        <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action">Roles</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
