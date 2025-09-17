<div class="modal fade" id="showAnswerHistory{{$answer->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalAriaLabelledby" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Historial de respuestas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="border p-2">
                            {{$answer->question->description}}
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
                                        <th>
                                            Respuesta
                                        </th>
                                        <th>
                                            Observación
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$answer->updated_at}}</td>
                                        <td>{{$answer->choice ? $answer->choice->description : 'N/A'}}</td>
                                        <td>{{$answer->observation ? $answer->observation->description : 'N/A'}}</td>
                                    </tr>
                                    @foreach ($repository->evaluationsHistory()->orderBy('id','desc')->get() as $evaluationHistory)
                                        @if($evaluationHistory->answersHistory()->where('question_id',$answer->question_id)->first())
                                        <tr>
                                            <td>
                                                {{$evaluationHistory->answersHistory()->where('question_id',$answer->question_id)->first()->created_at}}
                                            </td>
                                            <td>
                                                {{$evaluationHistory->answersHistory()->where('question_id',$answer->question_id)->first()->choice ? $evaluationHistory->answersHistory()->where('question_id',$answer->question_id)->first()->choice->description : 'N/A'}}
                                            </td>
                                            <td>
                                                    {{$evaluationHistory->answersHistory()->where('question_id',$answer->question_id)->first()->observation ? $evaluationHistory->answersHistory()->where('question_id',$answer->question_id)->first()->observation->description : 'N/A'}}
                                            </td>
                                        </tr>
                                        @endif
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
