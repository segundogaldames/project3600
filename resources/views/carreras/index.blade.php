@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Carreras') }} | <a href="{{ route('carreras.create') }}" class="btn-light">Nueva Carrera</a></div>

                <div class="card-body">
                    @if (isset($carreras) && @count($carreras))
                       <table class="table table-hover">
                          <tr>
                            <th>Nombre</th>
                            <th>Activa</th>
                            <th>Escuela</th>
                          </tr>
                           @foreach ($carreras as $carrera)
                               <tr>
                                  <td><a href="{{ route('carreras.show', $carrera) }}">{{ $carrera->nombre }}</a></td>
                                  <td>
                                    @if ($carrera->active==1)
                                      Si
                                    @else
                                      No
                                    @endif
                                   </td>
                                   <td><a href="{{ route('escuelas.show', $carrera->escuela_id) }}">{{ $carrera->escuela->nombre }}</a></td>
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
