@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Sede') }} de {{ $sede->comuna->nombre }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sedes.update', $sede) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="sede" class="col-md-4 col-form-label text-md-right">{{ __('Sede') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $sede->nombre }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ $sede->direccion }}" required autocomplete="nombre" autofocus placeholder="Calle y numero">

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comuna" class="col-md-4 col-form-label text-md-right">{{ __('Comuna') }}</label>

                            <div class="col-md-6">
                                <select id="comuna" class="form-control @error('comuna') is-invalid @enderror" name="comuna" required autocomplete="comuna" autofocus>
                                    <option value="{{ $sede->comuna_id }}">{{ $sede->comuna->nombre }}</option>
                                    @foreach ($comunas as $comuna)
                                        <option value="{{ $comuna->id }}">{{ $comuna->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('comuna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                                <a href="{{ route('sedes.show', $sede) }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
