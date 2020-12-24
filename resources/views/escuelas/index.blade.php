@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Escuelas') }} | <a href="{{ route('escuelas.create') }}" class="btn-light">Nueva Escuela</a></div>

                <div class="card-body">
                    @if (isset($escuelas) && @count($escuelas))
                       <table class="table table-hover">
                           @foreach ($escuelas as $escuela)
                               <tr>
                                   <td><a href="{{ route('escuelas.show', $escuela) }}">{{ $escuela->nombre }}</a></td>
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
