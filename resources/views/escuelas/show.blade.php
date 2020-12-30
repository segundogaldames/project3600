@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Escuelas') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                      <tr>
                        <th>Escuela:</th>
                        <td>{{ $escuela->nombre }}</td>
                      </tr>
                      <tr>
                        <th>Fecha registro:</th>
                        <td>{{ $escuela->created_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                      <tr>
                        <th>Fecha modificación:</th>
                        <td>{{ $escuela->updated_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                    </table>
                    <p>
                      <a href="{{ route('escuelas.edit', $escuela) }}" class="btn btn-link">Editar</a>
                      <a href="{{ route('escuelas.index') }}" class="btn btn-link">Volver</a>
                      <a href="{{ route('escuelaSedes.addSede', $escuela) }}" class="btn btn-primary">Agregar Sede</a>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Sedes de ') }} {{ $escuela->nombre }}</div>

                <div class="card-body">
                    @if (isset($sedes) && @count($sedes))
                      <table class="table table-hover">
                        <tr>
                          <th>Sede</th>
                          <th>Dirección</th>
                          <th>Director(a)</th>
                        </tr>
                          @foreach ($sedes as $sede)
                            <tr>
                              <td><a href="{{ route('sedes.show', $sede->id) }}">{{ $sede->sede }}</a></td>
                              <td>{{ $sede->direccion }}</td>
                              <td>{{ $sede->name }}</td>
                            </tr>
                          @endforeach
                      </table>
                    @else
                      <p class="text-info">No hay sedes asociadas</p>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Carreras de ') }} {{ $escuela->nombre }}</div>

                <div class="card-body">
                  @if (isset($escuela->carreras) && @count($escuela->carreras))
                       <table class="table table-hover">
                          <tr>
                            <th>Nombre</th>
                            <th>Activa</th>
                          </tr>
                           @foreach ($escuela->carreras as $carrera)
                               <tr>
                                  <td><a href="{{ route('carreras.show', $carrera) }}">{{ $carrera->nombre }}</a></td>
                                  <td>
                                    @if ($carrera->active==1)
                                      Si
                                    @else
                                      No
                                    @endif
                                   </td>
                               </tr>
                           @endforeach
                       </table>
                    @else
                        <p class="text-info">No hay carreras registradas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
