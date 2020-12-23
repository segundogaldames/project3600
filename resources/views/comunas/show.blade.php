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
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
