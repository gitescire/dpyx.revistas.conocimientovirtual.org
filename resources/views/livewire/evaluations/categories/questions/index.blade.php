<div class="mb-4" x-data="data()" x-init="mounted()">

    @section('header')
    <x-page-title title="Contestar cuestionario"
        description="Este módulo permite responder las preguntas para evaluar {{__('messages.views.livewire.evaluations.categories.questions.index.text1')}}."></x-page-title>
    @endsection

    @if ( config('app.is_evaluable') )
    @if (Auth::user()->hasRole('usuario') && ( $evaluation->is_answered || !config('app.answers_are_necessary') ) )
    <div class="row mb-3">
        <div class="col-12">
            <form action="{{route('evaluations.send',[$evaluation])}}" method="POST" x-ref="formSendToConcytec">
                @csrf
            </form>
            <button class="btn btn-success btn-wide shadow rounded-0" {{$announcement ? '' : 'disabled'}}
                x-ref="buttonSendToConcytec" x-on:click="showWarning()">
                <i class="fas fa-paper-plane"></i> {{__("enviar cuestionario")}}
            </button>
        </div>
    </div>
    @endif
    @endif

    <div class="row">
        <div class="col-12 d-flex justify-content-end mb-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1"
                    wire:click="toggleSupplementaryQuestions()">
                <label class="custom-control-label text-uppercase text-danger" for="customCheck1">
                    ¿Mostrar preguntas complementarias?
                </label>
            </div>
        </div>
    </div>

    <ul class="nav nav-justified mb-3">
        @foreach ($categories as $category)
        <li
            {{-- class="nav-item border-bottom mr-1 {{$categoryChoosed->id == $category->id ? 'border-danger bg-red-light' : ''}}">
            --}}
            class="nav-item border-bottom mr-1 {{$categoryChoosed->id == $category->id ? 'border-danger' : ''}}">
            <a href="{{route('evaluations.categories.questions.index',[$evaluation,$category])}}"
                class="nav-link active">
                @if ($category->is_answered)
                {{-- <i class="fas fa-trash"></i> --}}
                <b>
                    <i class="nav-link-icon fas fa-check-circle text-success"></i>
                </b>
                @else
                <i class="nav-link-icon fas fa-circle text-warning"></i>
                {{-- <i class="nav-link-icon pe-7s-settings"></i> --}}
                @endif
                <span>{{$category->short_name ?? $category->name}}</span>
            </a>
        </li>
        @endforeach
    </ul>

    @foreach ($subcategories as $subcategory)
    @if ($subcategory->has_questions)
    <div class="row mb-3">
        <div class="col-12">
            <h4 class="text-uppercase text-muted">
                <span>{{$subcategory->name}}</span>
            </h4>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                        <div class="widget-chat-wrapper-outer">
                            <div class="widget-chart-content">
                                <h6 class="widget-subheading">
                                    Puntuación {{getenv('APP_NAME')}}
                                </h6>
                                <div class="widget-chart-flex">
                                    <div class="widget-numbers mb-0 w-100">
                                        <div class="widget-chart-flex">
                                            <div class="fsize-4 text-danger">
                                                <span>
                                                    {{$subcategory->total_required_punctuation}}%
                                                </span>
                                            </div>
                                            <div class="ml-auto">
                                                <div
                                                    class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                    <span class="text-danger pl-2">
                                                        <span class="pr-1">
                                                            de
                                                        </span>
                                                        <span>
                                                            {{$subcategory->max_required_punctuation}}%
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ( config('app.has_supplementary_questions') )
                @if ($subcategory->questions()->supplementaries()->get()->count())
                <div class="col-12 col-lg-3">
                    <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                        <div class="widget-chat-wrapper-outer">
                            <div class="widget-chart-content">
                                <h6 class="widget-subheading">
                                    Puntuación complementaria
                                </h6>
                                <div class="widget-chart-flex">
                                    <div class="widget-numbers mb-0 w-100">
                                        <div class="widget-chart-flex">
                                            <div class="fsize-4 text-danger">
                                                <span>
                                                    {{$subcategory->total_supplementary_punctuation}}%
                                                </span>
                                            </div>
                                            <div class="ml-auto">
                                                <div
                                                    class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                    <span class="text-danger pl-2">
                                                        <span class="pr-1">
                                                            de
                                                        </span>
                                                        <span>
                                                            {{$subcategory->max_supplementary_punctuation}}%
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif


            </div>
        </div>
        @if ($showComplementaryQuestions && $subcategory->questions->where('is_optional',1)->count() ||
        $subcategory->questions->where('is_optional',0)->count())
        <div class="col-12">
            <div class="table-responsive bg-white shadow">

                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase">Pregunta</th>
                            <th class="text-uppercase">Puntuación</th>
                            <th class="text-uppercase">Respuestas</th>
                            <th class="text-uppercase">Estatus</th>
                            <th class="text-uppercase">Observaciones</th>
                            <th class="text-uppercase">Historial</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategory->questions as $question)
                        @if ( ($showComplementaryQuestions && $question->is_optional == 1) || $question->is_optional ==
                        0)
                        <tr>
                            <td>
                                {{$question->description}}
                                @if ($question->help_text)
                                <span tabindex="0" data-toggle="popover" data-trigger="focus" title="Ayuda"
                                    data-content="{{$question->help_text}}">
                                    <i class="fas fa-question-circle text-info float-right"></i>
                                </span>
                                @endif
                                @if ($question->answer->choice && $question->answer->choice->punctuation > 0 &&
                                $question->has_description_field)
                                <br><br>
                                <span class="text-info">{{$question->description_label}}</span>
                                <textarea rows="2" class="form-control border-info" required
                                    wire:change="updateDescription({{$question->answer}}, $event.target.value)"
                                    {{$evaluation->is_answerable && $question->answer->is_updateable ? '' : 'disabled readonly'}}>{{$question->answer->description}}</textarea>
                                @endif
                            </td>
                            <td>
                                <span>{{$question->max_punctuation}}</span>
                            </td>
                            <td>
                                <select class="form-control" x-ref="{{$question->id}}" wire:loading.attr="disabled"
                                    wire:target="storeAnswer"
                                    {{$evaluation->is_answerable && $question->answer->is_updateable ? '' : 'readonly disabled'}}
                                    x-on:change="$wire.storeAnswer({{$question->id}}, $refs[{{$question->id}}].options[$refs[{{$question->id}}].selectedIndex].value )">
                                    <option value="" {{$question->answer->choice ? '' : 'selected'}} hidden>seleccionar
                                    </option>
                                    @foreach ($question->choices as $choice)
                                    <option value="{{$choice->id}}"
                                        {{$question->answer->choice && $question->answer->choice->id == $choice->id ? 'selected' : ''}}>
                                        {{$choice->description}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-center">
                                <div wire:loading wire:target="storeAnswer">
                                    <div class="spinner-border text-secondary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div wire:loading.remove wire:target="storeAnswer">
                                    <span
                                        class="badge badge-pill {{$question->answer->choice ? 'badge-success' : 'badge-warning'}}">{{$question->answer->choice ? 'contestada' : 'pendiente'}}</span>
                                </div>
                            </td>
                            <td>
                                {{-- @can('edit evaluations') --}}
                                @if ($evaluation->is_reviewable)
                                @if ($question->answer)
                                <a href="{{route('answers.show', [$question->answer])}}"
                                    class="btn btn-info btn-shadow rounded-0">
                                    <i class="fas fa-plus"></i>
                                </a>
                                @endif
                                @endif
                                {{-- @endcan --}}
                                @if ($question->answer->observation)
                                <a href="{{route('answers.show', [$question->answer])}}"
                                    class="btn btn-secondary btn-shadow rounded-0">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-shadow rounded-0" data-toggle="modal"
                                    data-target="#showAnswerHistory{{$question->answer->id}}">
                                    <i class="fas fa-history"></i>
                                </button>
                                <x-modals.answers.history :answer="$question->answer" />
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="col-12">
            <div class="card shadow border-0 mb-3">
                <div class="card-body">
                    <div class="alert alert-info w-100">
                        No hay ningúna pregunta para mostrar.
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif
    @endforeach

    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('evaluations.categories.questions.index',[$evaluation, $nextCategory])}}"
            class="btn btn-success btn-shadow btn-wide rounded-0">
            <i class="fas fa-save"></i> Continuar
        </a>
    </div>

    @can('create observations')
    @if ($evaluation->is_reviewable)
    <div class="row">
        <div class="col-12">
            <form action="{{route('repositories.send',[$evaluation->repositories()->first()])}}" method="POST">
                @csrf
                @method('POST')
                <div class="card shadow border-0 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="" class="text-muted text-uppercase">Estatus</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="evaluationAcceptedInput" name="status"
                                        class="custom-control-input" value="aprobado"
                                        {{$repository->is_aproved ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="evaluationAcceptedInput">
                                        <div class="mb-2 mr-2 badge badge-success">Aceptado</div>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="evaluationWithObservations" name="status"
                                        class="custom-control-input" value="observaciones"
                                        {{$repository->has_observations ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="evaluationWithObservations">
                                        <div class="mb-2 mr-2 badge badge-warning">Evaluado con observaciones</div>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="evaluationRejected" name="status"
                                        class="custom-control-input" value="rechazado"
                                        {{$repository->is_rejected ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="evaluationRejected">
                                        <div class="mb-2 mr-2 badge badge-danger">Rechazado</div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="" class="text-muted text-uppercase">Comentarios</label>
                                <textarea name="comments" id="" cols="30" rows="5"
                                    class="form-control">Su revista ha sido enviada.</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success btn-wide btn-shadow rounded-0">
                        <i class="fas fa-paper-plane"></i> Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @endcan

    <script>
        function data(){
        return {
            showComplementaryQuestions: false,

            mounted(){

            },

            /**
            *
            *
            */

            showWarning(){
                if(this.$refs.buttonSendToConcytec.disabled){
                    return;
                }

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "No podrás modificar ninguna respuestas hasta que el evaluador te envíe los resultados.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'SI, ENVÍALO',
                    cancelButtonText: 'CANCELAR'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.$refs.formSendToConcytec.submit()
                    }
                })
            },

        }
    }

    </script>

</div>
