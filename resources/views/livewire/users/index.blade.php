<div class="mb-4">

    @section('header')
    <x-page-title title="Lista de usuarios"
        description="Este módulo permite ver la información de los usuarios actualmente registrados."></x-page-title>
    @endsection

    <div class="row d-flext justify-content-between mb-3">
        <div class="col-12 col-lg-4">
            <x-input-search />
        </div>
        <div class="col-12 col-lg-4">
            @can('create users')
            <a href="{{route('users.create')}}" class="btn btn-success btn-wide btn-shadow rounded-0 float-right">
                <i class="fas fa-plus"></i> Añadir
            </a>
            @endcan
        </div>
    </div>

    <div class="table-responsive shadow mb-3 bg-white">
        <table id="table" class="table table-bordered m-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-uppercase">Nombre</th>
                    <th class="text-uppercase">Correo</th>
                    <th class="text-uppercase">Teléfono</th>
                    <th class="text-uppercase">Rol</th>
                    @canany(['delete users','edit users'])
                    <th class="text-uppercase">Acciones</th>
                    @endcanany
                    <th class="text-uppercase">Último acceso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        {{-- <div class="mb-2 mr-2 badge badge-{{$user->role_color}}">{{$user->roles()->first()->name}}</div> --}}
                        <div class="mb-2 mr-2 badge badge-dot badge-dot-xl badge-{{$user->role_color}}">{{$user->role_color}}</div>
                        <span>{{$user->roles()->first() ? $user->roles()->first()->name : ""}}</span>
                    </td>
                    @canany(['delete users','edit users'])
                    <td>
                        @can('delete users')
                        <x-modals.users.delete :user="$user" />
                        @endcan
                        @can('edit users')
                        <a href="{{route('users.edit',[$user])}}" class="btn btn-warning rounded-0 btn-shadow">
                            <span data-toggle="tooltip" title="Editar" wire:ignore.self>
                                <i class="fas fa-pencil-alt"></i>
                            </span>
                        </a>
                        @endcan
                    </td>
                    @endcanany
                    <td class="{{$user->is_active ? 'text-success' : 'text-danger'}}">{{$user->last_login_at ?? 'Nunca'}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        {{$users->links()}}
    </div>

    {{-- <script>
    
    var table = document.getElementById('table');
    console.log(table)
    table.scrollLeft;

    </script> --}}

</div>