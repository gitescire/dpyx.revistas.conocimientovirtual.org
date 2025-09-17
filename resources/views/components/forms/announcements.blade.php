<form action="{{$announcement ? route('announcements.update',[$announcement]) : route('announcements.store')}}"
    method="POST">
    @csrf
    @if ($announcement) @method('PUT') @endif
    <div class="card shadow border-0">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <label for="" class="text-muted text-uppercase">
                        Fecha inicial
                    </label>
                    <input type="date" value="{{$announcement ? $announcement->initial_date : ''}}" name="initial_date"
                        class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="" class="text-muted text-uppercase">
                        Fecha final
                    </label>
                    <input type="date" value="{{$announcement ? $announcement->final_date : ''}}" name="final_date"
                        class="form-control" required>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="{{route('announcements.index')}}" class="btn btn-outline-danger btn-shadow rounded-0 mr-3">
                <i class="fas fa-window-close"></i> Cancelar
            </a>
            <button class="btn btn-success btn-wide btn-shadow rounded-0">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </div>
</form>