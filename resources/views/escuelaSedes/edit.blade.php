@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Director') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('escuelaSedes.update', $escuelaSede) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="sede" class="col-md-4 col-form-label text-md-right">{{ __('Sede: ') }}{{ $escuelaSede->sede->nombre }}</label>

                        </div>

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Director (opcional)') }}</label>

                            <div class="col-md-6">
                                <select id="user" class="form-control @error('user') is-invalid @enderror" name="user" autocomplete="sede" autofocus>
                                    <option value="{{ $escuelaSede->user_id }}">{{ $escuelaSede->user->name }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                    {{ __('Editar') }}
                                </button>
                                <a href="{{ route('sedes.show', $escuelaSede->sede_id) }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
