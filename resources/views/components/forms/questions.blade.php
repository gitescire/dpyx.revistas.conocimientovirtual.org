<div x-data="data()" x-init="mounted()">
    <form action="{{$question ?  route('questions.update',[$question]) : route('questions.store')}}" method="POST">
        @csrf
        @if ($question) @method('PUT') @endif
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    {{--  --}}
                    <div class="col-12 mb-3">
                        <label for="" class="text-muted text-uppercase">
                            Pregunta
                        </label>
                        <textarea name="description" cols="30" rows="2" required
                            class="form-control">{{$question ? $question->description : ''}}</textarea>
                    </div>
                    {{--  --}}
                    <div class="col-12 mb-3">
                        <label for="" class="text-muted text-uppercase">
                            Opciones
                        </label>
                        <div class="card">
                            <div class="card-body">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        {{-- <label for="" class="text-uppercase text-muted">Texto</label><br> --}}
                                        <input type="text" placeholder="texto" class="form-control"
                                            x-model="newOption.description">
                                    </div>
                                    {{-- <label for="" class="text-uppercase text-muted">Valor</label><br> --}}
                                    <input type="number" placeholder="valor" class="form-control ml-1"
                                        x-model="newOption.punctuation">
                                    <div class="input-group-append ml-1">
                                        <button class="btn btn-info btn-shadow rounded-0" type="button"
                                            x-on:click="addOption()" x-ref="addButton"
                                            :disabled="newOption.description == '' || newOption.punctuation == ''">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                </div>


                                {{-- <label for="" class="text-uppercase text-muted">Valor</label>
                                <input type="number" class="form-control" x-model="newOption.punctuation">
                                <button class="btn btn-info btn-shadow rounded-0 mt-3" type="button"
                                    x-on:click="addOption()" x-ref="addButton">
                                    <i class="fas fa-plus"></i>
                                </button> --}}
                                <hr>

                                <template x-if="options.length == 0">
                                    <div class="alert alert-info">
                                        Debes añadir por lo menos una opción de respuesta
                                    </div>
                                </template>

                                <template x-for="option in options">
                                    {{-- <span x-text="option.id"></span> --}}
                                    <div class="input-group mb-3">
                                        <input type="hidden" :name=`options[${option.position}][id]`
                                            x-model="option.id" required>
											<div class="input-group-append ml-1">
												<button type="button" class="btn btn-danger btn-shadow rounded-0" x-on:click="deleteOption(option)">
												<i class="fas fa-trash"></i>
												</button>
										</div>
                                        <div class="input-group-prepend">
                                            <input type="text" :name=`options[${option.position}][description]`
                                                class="form-control" x-model="option.description" required>
                                        </div>
                                        <input type="text" class="form-control ml-1"
                                            :name=`options[${option.position}][punctuation]`
                                            x-model="option.punctuation" required>
                                        <template x-if="!option.id">
                                            <div class="input-group-append ml-1">
                                                <button type="button" class="btn btn-danger btn-shadow rounded-0"
                                                    x-on:click="deleteOption(option)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                </template>

                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="col-12 mb-3">
                        <label for="" class="text-muted text-uppercase">
                            Órden
                        </label>
                        <input type="number" value="{{$question ? $question->order : ''}}" name="order" min="1"
                            class="form-control" required>
                    </div>
                    {{--  --}}
                    <div class="col-12 mb-3">
                        <label for="" class="text-muted text-uppercase">
                            Categoría
                        </label>
                        <select name="category_id" class="form-control" required>
                            <option value="" hidden>seleccionar</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                {{$question && $question->category->id == $category->id ? 'selected' : ''}}>
                                {{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{--  --}}
                    <div class="col-12 mb-3">
                        <label for="" class="text-muted text-uppercase">
                            Subcategoría
                        </label>
                        <select name="subcategory_id" class="form-control" required>
                            <option value="" hidden>seleccionar</option>
                            @foreach ($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}"
                                {{$question && $question->subcategory->id == $subcategory->id ? 'selected' : ''}}>
                                {{-- {{$question->subcategory->id}} {{$subcategory->id}} </option> --}}
                            {{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{--  --}}
                    {{-- <div class="col-12 mb-3">
                        <label for="" class="text-muted text-uppercase">
                            Puntuación máxima
                        </label>
                        <input type="number" value="{{$question ? $question->max_punctuation : ''}}"
                    name="max_punctuation" min="0" class="form-control">
                </div> --}}
                {{--  --}}
                <div class="col-12 mb-3">

                    <div class="card">
                        <ul class="list-group list-group-flush">
                            @if ( config('app.has_supplementary_questions') )
                            <li class="list-group-item">
                                <label for="" class="m-0 text-muted text-uppercase">
                                    ¿La pregunta es complementaria?
                                </label>
                                <input class="float-right" type="checkbox"
                                    {{$question && $question->is_optional ? 'checked' : ''}} name="is_optional">
                            </li>
                            @endif
                            <li class="list-group-item">
                                <label for="" class="m-0 text-muted text-uppercase">
                                    ¿Incluir campo para capturar texto?
                                </label>
                                <input class="float-right" type="checkbox"
                                    {{$question && $question->has_description_field ? 'checked' : ''}}
                                    name="has_description_field">
                            </li>
                        </ul>
                    </div>


                </div>

                {{--  --}}
                <div class="col-12 mb-3">
                    <label for="" class="text-muted text-uppercase">
                        Texto en marca de agua <small>(opcional)</small>
                    </label>
                    <textarea name="description_label" cols="30" rows="2"
                        class="form-control">{{$question ? $question->description_label : ''}}</textarea>
                </div>
                {{--  --}}
                <div class="col-12 mb-3">
                    <label for="" class="text-muted text-uppercase">
                        Texto de ayuda <small>(opcional)</small>
                    </label>
                    <textarea name="help_text" cols="30" rows="2"
                        class="form-control">{{$question ? $question->help_text : ''}}</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="{{route('questions.index')}}" class="btn btn-outline-danger btn-shadow rounded-0 mr-3">
                <i class="fas fa-window-close"></i> Cancelar
            </a>
            <button class="btn btn-success btn-wide btn-shadow rounded-0" :disabled="!isStorable()">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
</div>
</form>

<script>
    function data(){
    return {

        question: @json($question),
        options: @json($choices),
        categories: @json($categories),
        subcategories: @json($subcategories),
        allQuestions: @json($allQuestions),

        newOption: {
            description: '',
            punctuation: ''
        },

        // optionExists(){
        //     if(this.options.find(option => option.punctuation == this.newOption.punctuation)){
        //         return true
        //     }
        //     return false
        // },

        isStorable(){
            if(this.options.length == 0){
                return false;
            }
            
            return true;
        },



        addOption(){
            
            this.options.push({
                id: '',
                description: this.newOption.description,
                punctuation: this.newOption.punctuation
            })

            this.newOption.description = ''
            this.newOption.punctuation = ''

            if(this.options.length >= 5){
                this.$refs.addButton.disabled = true;
            }

            this.sortOptions()
            this.enumerateOptions()
            console.log(this.options)
        },

        deleteOption(optionToTrash){
            deleted = _.remove(this.options, function(option){
                return option.punctuation == optionToTrash.punctuation
            })

            if(this.options.length < 5){
                this.$refs.addButton.disabled = false;
            }

            this.sortOptions()
            this.enumerateOptions()
        },

        sortOptions(){
            this.options = _.sortBy(this.options, function(option){
                return option.punctuation
            }).reverse()
        },

        enumerateOptions(){
            this.options.forEach((option, index) => {
                option.position = index
            });
        },

        mounted() {
            this.enumerateOptions()
        },

    }
}

</script>
</div>