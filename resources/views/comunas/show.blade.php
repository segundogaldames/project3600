@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Comunas') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                      <tr>
                        <th>Comuna:</th>
                        <td>{{ $comuna->nombre }}</td>
                      </tr>
                      <tr>
                        <th>Región:</th>
                        <td>{{ $comuna->region->nombre }}</td>
                      </tr>
                      <tr>
                        <th>Fecha registro:</th>
                        <td>{{ $comuna->created_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                      <tr>
                        <th>Fecha modificación:</th>
                        <td>{{ $comuna->updated_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                    </table>
                    <p>
                      <a href="{{ route('comunas.edit', $comuna) }}" class="btn btn-link">Editar</a>
                      <a href="{{ route('comunas.index') }}" class="btn btn-link">Comunas</a>
                      <a href="{{ route('regions.index') }}" class="btn btn-link">Regiones</a>
                      <a href="{{ route('sedes.addSede', $comuna) }}" class="btn btn-primary">Agregar Sede</a>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Sedes de ') }} {{ $comuna->nombre }}</div>

                <div class="card-body">
                  @if (isset($sedes) && @count($sedes))
                       <table class="table table-hover">
                        <tr>
                          <th>Nombre</th>
                          <th>Dirección</th>
                        </tr>
                        @foreach ($sedes as $sede)
                          <tr>
                            <td><a href="{{ route('sedes.show', $sede) }}">{{ $sede->nombre }}</a></td>
                            <td>{{ $sede->direccion }}</a></td>
                          </tr>
                        @endforeach
                       </table>
                    @else
                        <p class="text-info">No hay sedes registradas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
