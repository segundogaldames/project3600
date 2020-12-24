@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nueva Sede') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('escuelaSedes.setSede', $escuela) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="sede" class="col-md-4 col-form-label text-md-right">{{ __('Sede') }}</label>

                            <div class="col-md-6">
                                <select id="sede" class="form-control @error('sede') is-invalid @enderror" name="sede" required autocomplete="sede" autofocus>
                                    <option value="">Seleccione...</option>
                                    @foreach ($sedes as $sede)
                                        <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('sede')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Director (opcional)') }}</label>

                            <div class="col-md-6">
                                <select id="user" class="form-control @error('user') is-invalid @enderror" name="user" autocomplete="sede" autofocus>
                                    <option value="">Seleccione...</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('user')
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
                                <a href="{{ route('escuelas.show', $escuela) }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
