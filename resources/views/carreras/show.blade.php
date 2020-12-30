@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Carreras') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                      <tr>
                        <th>Carrera:</th>
                        <td>{{ $carrera->nombre }}</td>
                      </tr>
                      <tr>
                        <th>Código:</th>
                        <td>
                          @if ($carrera->codigo==NULL)
                            No registrado
                          @else
                            {{ $carrera->codigo }}
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th>Escuela:</th>
                        <td>{{ $carrera->escuela->nombre }}</td>
                      </tr>
                      <tr>
                        <th>Fecha registro:</th>
                        <td>{{ $carrera->created_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                      <tr>
                        <th>Fecha modificación:</th>
                        <td>{{ $carrera->updated_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                    </table>
                    <p>
                      <a href="{{ route('carreras.edit', $carrera) }}" class="btn btn-link">Editar</a>
                      <a href="{{ route('escuelas.index') }}" class="btn btn-link">Escuelas</a>
                      <a href="{{ route('carreras.index') }}" class="btn btn-link">Volver</a>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
