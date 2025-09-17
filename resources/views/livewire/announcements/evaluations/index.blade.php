<div wire:ignore>

    @section('header')
        <x-page-title title="Evaluaciones de convocatoria"
            description="Este módulo podrás ver la lista de las evaluciones de la convocatoria.">
        </x-page-title>
    @endsection

    <div class="row">
        <div class="col-12 text-muted">
            <div class="d-inline-block pr-4">
                <div>
                    <small>
                        <i class="fas fa-calendar"></i> fecha de inicio
                    </small>
                </div>
                {{ $announcement->initial_date }}
            </div>
            <div class="d-inline-block">
                <div>
                    <small>
                        <i class="fas fa-calendar"></i> fecha de fin
                    </small>
                </div>
                {!! $announcement->final_date ?? 'N/A' !!}
            </div>
        </div>
    </div>

    <div class="table-responsive shadow bg-white">
        <table class="table table-bordered m-0">
            <tbody>
                @foreach ($announcement->evaluations as $evaluation)
                    <tr>
                        <td>
                            <div><small class="text-muted">revista</small></div>
                            {{ $evaluation->repositories()->first()->name ?? null }}
                        </td>
                        <td>
                            <div><small class="text-muted">responsable</small></div>
                            {{ $evaluation->repositories()->first()->responsible->name ?? null }}
                        </td>
                        <td>
                            <div><small class="text-muted">evaluador</small></div>
                            {{ $evaluation->evaluator->name ?? null }}
                        </td>
                        <td>
                            <div><small class="text-muted">acciones</small></div>
                            <a href="{{route('evaluations.pdf',[$evaluation])}}"
                                class="btn btn-secondary btn-shadow rounded-0">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
