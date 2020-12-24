@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sedes') }}</div>

                <div class="card-body">
                    @if (isset($sedes) && @count($sedes))
                       <table class="table table-hover">
                        <tr>
                          <th>Nombre</th>
                          <th>Comuna</th>
                        </tr>
                        @foreach ($sedes as $sede)
                          <tr>
                            <td><a href="{{ route('sedes.show', $sede) }}">{{ $sede->nombre }}</a></td>
                            <td><a href="{{ route('comunas.show', $sede->comuna_id) }}">{{ $sede->comuna->nombre }}</a></td>
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
