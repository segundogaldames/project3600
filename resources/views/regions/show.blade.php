@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Regiones') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                      <tr>
                        <th>Región:</th>
                        <td>{{ $region->nombre }}</td>
                      </tr>
                      <tr>
                        <th>Fecha registro:</th>
                        <td>{{ $region->created_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                      <tr>
                        <th>Fecha modificación:</th>
                        <td>{{ $region->updated_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                    </table>
                    <p>
                      <a href="{{ route('regions.edit', $region) }}" class="btn btn-link">Editar</a>
                      <a href="{{ route('regions.index') }}" class="btn btn-link">Volver</a>
                      <a href="{{ route('comunas.addComuna', $region) }}" class="btn btn-primary">Agregar Comuna</a>
                    </p>
                </div>
            </div>
            <!--vistad de usuarios asociados a un rol-->
            <div class="card">
                <div class="card-header">Comunas Región {{ $region->nombre }}</div>

                <div class="card-body">
                    @if (isset($comunas) && @count($comunas))
                       <table class="table table-hover">
                           @foreach ($comunas as $comuna)
                               <tr>
                                   <td><a href="{{ route('comunas.show', $comuna) }}">{{ $comuna->nombre }}</a></td>
                               </tr>
                           @endforeach
                       </table>
                    @else
                        <p class="text-info">No hay comunas registradas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
