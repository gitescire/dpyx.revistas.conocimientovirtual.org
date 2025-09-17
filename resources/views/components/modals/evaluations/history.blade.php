<div class="modal fade" id="showEvaluationHistory{{$evaluation->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalAriaLabelledby" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Historial de evaluaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="border p-2">
                            {{$evaluation->repositories()->first()->name}}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive bg-white shadow">
                            <table class="table table-bordered m-0">
                                <thead>
                                    <tr>
                                        <th>
                                            Fecha
                                        </th>
                                        @if (config('app.is_evaluable') && (auth()->user()->is_evaluator || auth()->user()->is_admin || config('dpyx.evaluators_shownables')) )
                                        <th>
                                            Evaluador
                                        </th>
                                        @endif
                                        <th>
                                            Estatus
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{$evaluation->updated_at}}
                                        </td>
                                        @if (config('app.is_evaluable') && (auth()->user()->is_evaluator || auth()->user()->is_admin || config('dpyx.evaluators_shownables')) )
                                        <td>
                                            {{$evaluation->evaluator ? $evaluation->evaluator->name : 'N/A'}}
                                        </td>
                                        @endif
                                        <td>
                                            {{$evaluation->status}}
                                        </td>
                                    </tr>
                                    @foreach ($evaluation->repositories()->first()->evaluationsHistory()->orderBy('id','desc')->get() as $evaluationHistory)
                                    <tr>
                                        <td>
                                            {{$evaluationHistory->created_at}}
                                        </td>
                                        @if (config('app.is_evaluable') && (auth()->user()->is_evaluator || auth()->user()->is_admin || config('dpyx.evaluators_shownables')) )
                                        <td>
                                            {{$evaluationHistory->evaluator ? $evaluationHistory->evaluator->name : 'N/A'}}
                                        </td>
                                        @endif
                                        <td>
                                            {{$evaluationHistory->status}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-shadow rounded-0" data-dismiss="modal">
                    <i class="fas fa-window-close"></i>
                </button>
                {{-- <button class="btn btn-danger btn-shadow rounded-0"> --}}
                {{-- </button> --}}
            </div>

        </div>
    </div>
</div>
