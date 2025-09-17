<div class="mb-4">

    @section('header')
    <x-page-title title="Lista de preguntas"
        description="Este módulo permite listar las preguntas que aparecerán en las evaluaciones."></x-page-title>
    @endsection

    <div class="row">
        @foreach ($categories as $category)
        @foreach ($category->subcategories as $subcategory)
        @if ($subcategory->total_punctuation != 100)
        @if ($subcategory->total_questions > 0)
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content border-0 shadow">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading text-uppercase">{{$category->name}}</div>
                            <div class="widget-subheading text-uppercase">{{$subcategory->name}}</div>
                        </div>
                        <div class="widget-content-right">
                            @if ($subcategory->total_punctuation > 100)
                            <div class="widget-numbers text-danger">{{$subcategory->total_punctuation}}%</div>
                            {{-- @elseif($subcategory->total_punctuation == 100)
                                <div class="widget-numbers text-success">{{$subcategory->total_punctuation}}%</div>
                        --}}
                        @else
                        <div class="widget-numbers text-warning">{{$subcategory->total_punctuation}}%</div>
                        @endif
                    </div>
                </div>
                <div class="widget-progress-wrapper">
                    <div class="progress-bar-sm progress">
                        @if ($subcategory->total_punctuation > 100)
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71" aria-valuemin="0"
                            aria-valuemax="100" style="width: {{$subcategory->total_punctuation}}%;"></div>
                        {{-- @elseif($subcategory->total_punctuation == 100)
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="71" aria-valuemin="0"
                                aria-valuemax="100" style="width: {{$subcategory->total_punctuation}}%;"></div> --}}
                    @else
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="71" aria-valuemin="0"
                        aria-valuemax="100" style="width: {{$subcategory->total_punctuation}}%;"></div>
                    @endif
                </div>
                <div class="progress-sub-label">
                    <div class="sub-label-left">Máximo porcentaje</div>
                    <div class="sub-label-right">{{$subcategory->total_punctuation}}%</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif
@endforeach
@endforeach
</div>

<div class="row d-flex justify-content-between mb-3">
    <div class="col-12 col-md-6">
        <x-input-search />
    </div>
    <div class="col-12 col-md-6 d-flex justify-content-end">
            <a href="{{route('questions.create')}}" class="btn btn-success btn-wide btn-shadow rounded-0 float-right mr-2">
                <i class="fas fa-plus"></i> Agregar
            </a>
            <a href="{{route('questions.export')}}" class="btn btn-primary btn-wide btn-shadow rounded-0 float-right">
                <i class="fas fa-download"></i> Descargar
            </a>
    </div>
</div>

<x-tables.questions :questions="$questions" :sortBy="$sortBy" :sortDirection="$sortDirection" />
{{$questions->links()}}

</div>