@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sedes') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                      <tr>
                        <th>Sedes:</th>
                        <td>{{ $sede->nombre }}</td>
                      </tr>
                      <tr>
                        <th>Dirección:</th>
                        <td>{{ $sede->direccion }}</td>
                      </tr>
                      <tr>
                        <th>Comuna:</th>
                        <td>{{ $sede->comuna->nombre }}</td>
                      </tr>
                      <tr>
                        <th>Director:</th>
                        <td>{{ $director->user->name }}</td>
                      </tr>
                      <tr>
                        <th>Fecha registro:</th>
                        <td>{{ $sede->created_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                      <tr>
                        <th>Fecha modificación:</th>
                        <td>{{ $sede->updated_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                    </table>
                    <p>
                      <a href="{{ route('sedes.edit', $sede) }}" class="btn btn-link">Editar</a>
                      <a href="{{ route('sedes.index') }}" class="btn btn-link">Sedes</a>
                      <a href="{{ route('comunas.index') }}" class="btn btn-link">Comunas</a>
                      <a href="{{ route('escuelaSedes.edit', $director) }}" class="btn btn-link">Cambiar Director</a>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Escuelas de ') }} {{ $sede->nombre }}</div>

                <div class="card-body">
                  @if (isset($escuelas) && @count($escuelas))
                       <table class="table table-hover">
                           @foreach ($escuelas as $escuela)
                               <tr>
                                   <td><a href="{{ route('escuelas.show', $escuela->id) }}">{{ $escuela->escuela }}</a></td>
                               </tr>
                           @endforeach
                       </table>
                    @else
                        <p class="text-info">No hay escuelas registradas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
