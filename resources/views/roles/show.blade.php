@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                      <tr>
                        <th>Rol:</th>
                        <td>{{ $role->nombre }}</td>
                      </tr>
                      <tr>
                        <th>Fecha registro:</th>
                        <td>{{ $role->created_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                      <tr>
                        <th>Fecha modificación:</th>
                        <td>{{ $role->updated_at->format('d-m-Y H:i:s') }}</td>
                      </tr>
                    </table>
                    <p>
                      <a href="{{ route('roles.edit', $role) }}" class="btn btn-link">Editar</a>
                      <a href="{{ route('roles.index') }}" class="btn btn-link">Volver</a>
                    </p>
                </div>
            </div>
            <!--vistad de usuarios asociados a un rol-->
            <div class="card">
                <div class="card-header">Usuarios {{ $role->nombre }}</div>

                <div class="card-body">
                  @if (isset($users) && @count($users))
                       <table class="table table-hover">
                          <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Activo</th>
                          </tr>
                           @foreach ($users as $user)
                               <tr>
                                   <td><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
                                   <td>{{ $user->email }}</td>
                                   <td>
                                    @if ($user->active==1)
                                      Si
                                    @else
                                      No
                                    @endif
                                   </td>
                               </tr>
                           @endforeach
                       </table>
                    @else
                        <p class="text-info">No hay usuarios registrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
