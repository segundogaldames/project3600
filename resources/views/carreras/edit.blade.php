@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Carrera') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('carreras.update', $carrera) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $carrera->nombre }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">{{ __('Código (opcional)') }}</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ $carrera->codigo }}" autocomplete="codigo" autofocus>

                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <select id="active" class="form-control @error('active') is-invalid @enderror" name="active" required autocomplete="active" autofocus>
                                    <option value="{{ $carrera->active }}">@if ($carrera->active==1) Activo @else Inactivo @endif</option>
                                    <option value="1">Activar</option>
                                    <option value="2">Desactivar</option>
                                </select>

                                @error('escuela')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="escuela" class="col-md-4 col-form-label text-md-right">{{ __('Escuela') }}</label>

                            <div class="col-md-6">
                                <select id="escuela" class="form-control @error('escuela') is-invalid @enderror" name="escuela" required autocomplete="escuela" autofocus>
                                    <option value="{{ $carrera->escuela_id }}">{{ $carrera->escuela->nombre }}</option>
                                    @foreach ($escuelas as $escuela)
                                        <option value="{{ $escuela->id }}">{{ $escuela->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('escuela')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                                <a href="{{ route('carreras.index') }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
