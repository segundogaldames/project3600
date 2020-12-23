@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Comunas') }}</div>

                <div class="card-body">
                    @if (isset($comunas) && @count($comunas))
                       <table class="table table-hover">
                          <tr>
                            <th>Comuna</th>
                            <th>Región</th>
                          </tr>
                           @foreach ($comunas as $comuna)
                               <tr>
                                   <td><a href="{{ route('comunas.show', $comuna) }}">{{ $comuna->nombre }}</a></td>
                                   <td><a href="{{ route('regions.show', $comuna->region_id) }}">{{ $comuna->region->nombre }}</a></td>
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
