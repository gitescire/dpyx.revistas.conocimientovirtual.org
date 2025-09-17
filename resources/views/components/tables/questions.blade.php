<div class="table-responsive shadow bg-white mb-3">
    <table class="table m-0">
        <thead>
            <tr>
                <th nowrap class="text-uppercase" wire:click="sortBy('id')" style="cursor:pointer">
                    @if ($sortBy != 'id')
                    <i class="text-muted fas fa-sort"></i>
                    @elseif($sortDirection == 'asc')
                    <i class="fas fa-sort-up"></i>
                    @else
                    <i class="fas fa-sort-down"></i>
                    @endif
                    ID
                </th>
                <th nowrap class="text-uppercase" wire:click="sortBy('description')" style="cursor:pointer">
                    @if ($sortBy != 'description')
                    <i class="text-muted fas fa-sort"></i>
                    @elseif($sortDirection == 'asc')
                    <i class="fas fa-sort-up"></i>
                    @else
                    <i class="fas fa-sort-down"></i>
                    @endif
                    Descripción
                </th>
                <th nowrap class="text-uppercase" wire:click="sortBy('max_punctuation')" style="cursor:pointer">
                    @if ($sortBy != 'max_punctuation')
                    <i class="text-muted fas fa-sort"></i>
                    @elseif($sortDirection == 'asc')
                    <i class="fas fa-sort-up"></i>
                    @else
                    <i class="fas fa-sort-down"></i>
                    @endif
                    Puntuación
                </th>
                <th nowrap class="text-uppercase" wire:click="sortBy('order')" style="cursor:pointer">
                    @if ($sortBy != 'order')
                    <i class="text-muted fas fa-sort"></i>
                    @elseif($sortDirection == 'asc')
                    <i class="fas fa-sort-up"></i>
                    @else
                    <i class="fas fa-sort-down"></i>
                    @endif
                    Órden
                </th>
                <th nowrap class="text-uppercase" wire:click="sortBy('category.name')" style="cursor:pointer">
                    @if ($sortBy != 'category.name')
                    <i class="text-muted fas fa-sort"></i>
                    @elseif($sortDirection == 'asc')
                    <i class="fas fa-sort-up"></i>
                    @else
                    <i class="fas fa-sort-down"></i>
                    @endif
                    Categoría
                </th>
                <th nowrap class="text-uppercase" wire:click="sortBy('subcategory.name')" style="cursor:pointer">
                    @if ($sortBy != 'subcategory.name')
                    <i class="text-muted fas fa-sort"></i>
                    @elseif($sortDirection == 'asc')
                    <i class="fas fa-sort-up"></i>
                    @else
                    <i class="fas fa-sort-down"></i>
                    @endif
                    Subcategoría
                </th>
                <th nowrap class="text-uppercase">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
            <tr>
                <td>{{$question->id}}</td>
                <td>{!! str_replace(['\n\r','\n','\r'], '<br />', $question->description) !!}</td>
                <td>Max. {{$question->max_punctuation}}%</td>
                <td>{{$question->order}}</td>
                <td>{{$question->category->name}}</td>
                <td>{{$question->subcategory->name}}</td>
                <td class="d-flex justify-content-between">
                    <form action="{{route('questions.destroy',[$question])}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-shadow rounded-0">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <a href="{{route('questions.edit',[$question])}}" class="btn btn-warning btn-shadow rounded-0 ml-1">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>