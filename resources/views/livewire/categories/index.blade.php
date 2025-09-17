<div class="mb-4">

    @section('header')
    <x-page-title title="Lista de categorías"
        description="Este módulo permite ver las categorías registradas para las evaluaciones."></x-page-title>
    @endsection

    <div class="row d-flext justify-content-between mb-3">
        <div class="col-12 col-lg-4">
            <x-input-search />
        </div>
        <div class="col-12 col-lg-3">
            <a href="{{route('categories.create')}}" class="btn btn-success btn-wide btn-shadow rounded-0 float-right">
                <i class="fas fa-plus"></i> Agregar
            </a>
        </div>
    </div>

    <div class="table-responsive shadow mb-3">
        <table class="table table-bordered m-0 bg-white">
            <thead>
                <tr>
                    <th class="text-uppercase">#</th>
                    <th class="text-uppercase">Nombre</th>
                    <th class="text-uppercase">Nombre corto</th>
                    <th class="text-uppercase">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->short_name}}</td>
                    <td>
                        @if ($category->questions->count())
                        <button type="button" class="btn btn-danger btn-shadow rounded-0" data-toggle="modal"
                            data-target="#deleteCategory{{$category->id}}">
                            <i class="fas fa-trash"></i>
                        </button>
                        <x-modals.categories.delete :category="$category" />
                        @else
                        <form action="{{route('categories.destroy',[$category])}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-shadow rounded-0">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @endif
                        <a href="{{route('categories.edit',[$category])}}" class="btn btn-warning btn-shadow rounded-0">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        {{$categories->links()}}
    </div>

</div>