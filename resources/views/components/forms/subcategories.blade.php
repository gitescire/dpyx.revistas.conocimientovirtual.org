<form action="{{$subcategory ? route('subcategories.update',[$subcategory]) : route('subcategories.store')}}"
    method="POST">
    @csrf
    @if ($subcategory) @method('PUT') @endif
    <div class="card shadow border-0">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <label for="" class="text-muted text-uppercase">
                        Nombre
                    </label>
                    <input type="text" name="name" value="{{$subcategory ? $subcategory->name : ''}}" required
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="{{route('subcategories.index')}}" class="btn btn-outline-danger btn-shadow rounded-0 mr-3">
                <i class="fas fa-window-close"></i> Cancelar
            </a>
            <button class="btn btn-success btn-wide btn-shadow rounded-0">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </div>
</form>