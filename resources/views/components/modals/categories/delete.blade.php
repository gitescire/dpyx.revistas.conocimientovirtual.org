<div class="modal fade" id="deleteCategory{{$categoryChoosed->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalAriaLabelledby" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('categories.destroy',[$categoryChoosed])}}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="alert alert-info fade show" role="alert">
                                <h4 class="alert-heading">¡Espera!</h4>
                                <p>
                                    La categoría <b>{{$categoryChoosed->name}}</b> cuenta con preguntas que deben ser
                                    reasignadas a otra categoría.
                                </p>
                                <hr>
                                <p class="mb-0">
                                    Selecciona la categoría a donde deseas mover las preguntas antes de eliminarlas.
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="text-uppercase text-muted">Reasignar categoría</label>
                            <select name="newCategory" class="form-control" required>
                                <option value="" hidden>seleccionar</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger btn-shadow rounded-0">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>