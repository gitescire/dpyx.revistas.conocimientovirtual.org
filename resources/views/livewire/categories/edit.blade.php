<div class="mb-4">

    @section('header')
    <x-page-title title="Editar categoria"
        description="Este módulo permite modificar la informción de la categoria seleccionada."></x-page-title>
    @endsection

    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-4">
            <form action="{{route('categories.update', [$category])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="" class="text-muted text-uppercase">Nombre</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="" class="text-muted text-uppercase">Nombre corto</label>
                                <input type="text" name="short_name" value="{{$category->short_name}}"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{route('categories.index')}}" class="btn btn-outline-danger btn-shadow rounded-0 mr-3">
                            <i class="fas fa-window-close"></i> Cancelar
                        </a>
                        <button class="btn btn-success btn-wide btn-shadow rounded-0">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>