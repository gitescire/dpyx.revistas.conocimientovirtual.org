<div class="mb-4">

    @section('header')
    <x-page-title title="Lista de {{__('containerNamePlural')}}"
        description="{{__('messages.views.livewire.repositories.index.text1')}}"></x-page-title>
    @endsection

    @if(auth()->user()->is_evaluator || auth()->user()->is_admin)
    <div class="mb-3">
        <a href="{{route('repositories.statistics.all')}}" class="btn btn-info btn-shadow rounded-0">
            <i class="fas fa-chart-pie"></i>
        </a>
        <span class="text-info ml-2">
            AGLOMERADO GENERAL
        </span>
    </div>
    @endif

    <div class="table-responsive shadow mb-3 bg-white">
        <table class="table table-bordered m-0">
            <thead>
                <tr>
                    <th class="text-uppercase">Nombre</th>
                    <th class="text-uppercase">{{__("containerName")}}</th>
                    <th class="text-uppercase">Evaluación</th>
                    <th class="text-uppercase">Encargado</th>
                    @if (config('app.is_evaluable') && (auth()->user()->is_evaluator || auth()->user()->is_admin || config('dpyx.evaluators_shownables')) )
                    <th class="text-uppercase">Evaluador</th>
                    @endif
                    <th class="text-uppercase">Gráfica de resultados</th>
                    {{-- @if (config('app.is_evaluable') && (auth()->user()->is_evaluator || auth()->user()->is_admin || config('dpyx.evaluators_shownables')) ) --}}
                    <th class="text-uppercase">Cuestionario</th>
                    {{-- @endif --}}
                    <th class="text-uppercase">Historial</th>
                    <th class="text-uppercase">PDF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($repositories as $repository)
                <tr>
                    <td>{{$repository->name}}</td>
                    <td>
                        <span class="badge badge-{{$repository->status_color}}">
                            @if ($repository->evaluations()->latest()->first()->in_review)
                                En evaluación
                            @else
                                {{$repository->status}}
                            @endif
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-{{$repository->evaluations()->latest()->first()->status_color}}">
                        @if ($repository->is_aproved || $repository->is_rejected)
                            Concluido
                        @else
                            {{$repository->evaluations()->latest()->first()->status}}
                        @endif
                        </span>
                    </td>
                    <td>{{$repository->responsible->name}}</td>
                    @if (config('app.is_evaluable') && (auth()->user()->is_evaluator || auth()->user()->is_admin || config('dpyx.evaluators_shownables')) )
                    <td>{{$repository->evaluations()->latest()->first() ? $repository->evaluations()->latest()->first()->evaluator->name : 'N/A'}}</td>
                    @endif
                    <td>
                        <a href="{{route('repositories.statistics.show',[$repository])}}"
                            class="btn btn-info btn-shadow rounded-0 {{$repository->evaluations()->latest()->first()->answers->whereNotNull('choice_id')->count() ? '' : 'disabled'}}">
                            <i class="fas fa-chart-pie"></i>
                        </a>
                    </td>
                    {{-- @if (config('app.is_evaluable') && (auth()->user()->is_evaluator || auth()->user()->is_admin || config('dpyx.evaluators_shownables')) ) --}}
                    <td>
                        <a href="{{route('evaluations.categories.questions.index',[$repository->evaluations()->latest()->first(), $firstCategory])}}"
                            class="btn btn-{{$repository->evaluations()->latest()->first()->is_reviewed && $repository->is_aproved ? 'secondary' : 'primary'}} btn-shadow rounded-0 {{$repository->evaluations()->latest()->first()->is_viewable ? '' : 'disabled'}}">
                            <i class="fas fa-scroll"></i>
                        </a>
                    </td>
                    {{-- @endif --}}
                    <td>
                        <button type="button" class="btn btn-info btn-shadow rounded-0" data-toggle="modal"
                            data-target="#showEvaluationHistory{{$repository->evaluations()->latest()->first()->id}}">
                            <i class="fas fa-history"></i>
                        </button>
                        <x-modals.evaluations.history :evaluation="$repository->evaluations()->latest()->first()" />
                    </td>
                    <td>
                        <a href="{{route('evaluations.pdf',[$repository->evaluations()->latest()->first()])}}"
                            class="btn btn-secondary btn-shadow rounded-0">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        {{$repositories->links()}}
    </div>

</div>