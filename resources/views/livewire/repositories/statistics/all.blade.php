<div class="mb-4" x-data="data()" x-init="mounted()">

    @section('header')
    <x-page-title title="Estadisticas de {{__('containerNamePlural')}}"
        description="Este módulo permite ver la evaluación final de la revista con base en las respuestas del usuario.">
    </x-page-title>
    @endsection

    <div class="row">
        <div class="col-12 col-lg-12 mb-3">
            <div class="card shadow border-0">
                <div class="card-body" id="bubbleChartContainer">
                    <div class="row d-flex justify-content-center mb-3">
                        <div class="col-4">
                            <label for="" class="text-uppercase text-muted">Eje Y</label>
                            <select name="" id="" class="form-control" x-model="subcategoryIdOnYAxis"
                                x-on:change="setBubbleChart()">
                                @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            VS
                        </div>
                        <div class="col-4">
                            <label for="" class="text-uppercase text-muted">Eje X</label>
                            <select name="" id="" class="form-control" x-model="subcategoryIdOnXAxis"
                                x-on:change="setBubbleChart()">
                                @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="bubble-chart-container">
                        <canvas id="bubble-chart"></canvas>
                    </div>
                </div>
                {{-- <div class="card-footer"></div> --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 mb-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <canvas id="repositoryQualification"></canvas>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <div class="widget-numbers mt-0 fsize-3">
                        <span>{{$repositories->pluck('qualification')->sum() / $repositories->count()}}%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 mb-3">
            <div class="card shadow border-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center">
                        <div class="mb-2 mr-2 badge badge-danger my-auto">&nbsp;</div>
                        <div>-100% a 0% (En desarollo)</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <div class="mb-2 mr-2 badge badge-warning my-auto">&nbsp;</div>
                        <div>0% a 50% (Consolidada)</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <div class="mb-2 mr-2 badge badge-success my-auto">&nbsp;</div>
                        <div>50% a 100% (De excelencia)</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($categories as $category)
        <div class="col-12 col-lg-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <canvas category-id="{{$category->id}}"></canvas>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <div class="widget-numbers mt-0 fsize-3">
                        <span percentage-id="{{$category->id}}">0.00%</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        function data(){
            return {

                repositories: @json($repositories),
                categories: @json($categories),
                subcategories: @json($subcategories),
                subcategoryIdOnXAxis: null,
                subcategoryIdOnYAxis: null,

                mounted() {

                    this.subcategoryIdOnYAxis = this.subcategories[0].id
                    this.subcategoryIdOnXAxis = this.subcategories.slice(-1)[0].id

                    this.categories.forEach(category => {

                        // Set real punctuation to the category
                        punctuations = _.map(category.questions, function(question){
                            return _.sumBy(question.answers, function(answer) { 
                                return answer.choice ? parseFloat(answer.choice.punctuation) : 0 
                            }) / question.answers.length
                            // return _.sumBy(objects, function(o) { return o.n; });
                            // return question.answer.choice ? parseFloat(question.answer.choice.punctuation) : 0
                        })
                        category.punctuation = _.sum(punctuations)

                        // Set max punctuation to the category
                        max_punctuations = _.map(category.questions, function(question){
                            return parseFloat(question.max_punctuation)
                        })
                        category.max_punctuation = _.sum(max_punctuations)

                        category.percentage = category.punctuation / category.max_punctuation * 100

                        percentageSpan = document.querySelector(`span[percentage-id="${category.id}"]`);
                        percentageSpan.innerText = `${category.percentage.toFixed(2)}%`

                        if(category.percentage <= 0){
                            color = '#ff6384'
                        }else if(category.percentage > 0 && category.percentage <= 50){
                            color = '#f7b924'
                        }else{
                            color = '#3ac47d'
                        }

                        // Get category canvas
                        ctx = document.querySelector(`canvas[category-id="${category.id}"]`);
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: [category.short_name],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [category.percentage + 100, 100 - category.percentage],
                                    backgroundColor: [
                                        color,
                                        'rgba(220, 220, 220, 220)',
                                    ],
                                    borderColor: [
                                        color,
                                        'rgba(220, 220, 220, 220)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                rotation: 1 * Math.PI,
                                circumference: 1 * Math.PI
                            }
                        });
                    });

                    repositoriesQualification = _.sumBy(this.repositories, function(repository){
                        return repository.qualification
                    }) / this.repositories.length
                    // return _.sumBy(objects, function(o) { return o.n; });

                    if(repositoriesQualification <= 0){
                        color = '#ff6384'
                    }else if(repositoriesQualification > 0 && repositoriesQualification <= 50){
                        color = '#f7b924'
                    }else{
                        color = '#3ac47d'
                    }

                    ctx = document.getElementById('repositoryQualification');

                    // ctx.width = document.getElementById('repositoryQualificationContainer').offsetWidth
                    // ctx.height = document.getElementById('repositoryQualificationContainer').offsetHeight

                    repositoriesQualification = _.sumBy(this.repositories, function(repository){
                        return repository.qualification
                    }) / this.repositories.length

                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Calificación de todas las revistas'],
                            datasets: [{
                                label: '# of Votes',
                                data: [parseFloat(repositoriesQualification) + 100, 100 - parseFloat(repositoriesQualification)],
                                backgroundColor: [
                                    color,
                                    'rgba(220, 220, 220, 220)',
                                ],
                                borderColor: [
                                    color,
                                    'rgba(220, 220, 220, 220)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            rotation: 1 * Math.PI,
                            circumference: 1 * Math.PI
                        }
                    });

                    this.setBubbleChart()

                    // LINEAR CHART FOR ALL TACOMETERS
                    
                   

                },

                setBubbleChart(){

                    document.getElementById('bubble-chart-container').innerHTML = `<canvas id="bubble-chart"><canvas>`;

                    // $('#results-graph').remove(); // this is my <canvas> element
                    // $('#graph-container').append('<canvas id="results-graph"><canvas>');

                    console.log('set bubble chrt')
                    subcategoryIdOnXAxis = this.subcategoryIdOnXAxis
                    subcategoryIdOnYAxis = this.subcategoryIdOnYAxis
                    subcategories = this.subcategories

                    datasets = _.map(this.categories, function(category){
                        
                        questions = _.filter(category.questions, function(question){
                            return question.subcategory_id == this.subcategoryIdOnXAxis
                        }) 

                        punctuations = _.map(questions, function(question){
                            return _.sumBy(question.answers, function(answer) { 
                                return answer.choice ? parseFloat(answer.choice.punctuation) : 0 
                            }) / question.answers.length
                        })

                        // punctuations = _.map( questions, function(question){
                        //     return question.answer.choice ? parseFloat(question.answer.choice.punctuation) : 0
                        // } )

                        accesibilityPunctuation = _.sum(punctuations)

                        questions = _.filter(category.questions, function(question){
                            return question.subcategory_id == subcategoryIdOnYAxis
                        }) 

                        punctuations = _.map(category.questions, function(question){
                            return _.sumBy(question.answers, function(answer) { 
                                return answer.choice ? parseFloat(answer.choice.punctuation) : 0 
                            }) / question.answers.length
                        })
                        

                        // punctuations = _.map( questions, function(question){
                        //     return question.answer.choice ? parseFloat(question.answer.choice.punctuation) : 0
                        // } )

                        preservationPunctuation = _.sum(punctuations)

                        red = Math.floor(Math.random() * 255 + 1);
                        green = Math.floor(Math.random() * 255 + 1);
                        blue = Math.floor(Math.random() * 255 + 1);

                        return {
                            label: [category.short_name],
                            backgroundColor: `rgba(${red},${green},${blue},0.2)`,
                            borderColor: `rgba(${red},${green},${blue},1)`,
                            data: [{
                                x: accesibilityPunctuation,
                                y: preservationPunctuation,
                                r: Math.abs(accesibilityPunctuation + preservationPunctuation) / 2
                            }]
                        }
                    })

                    new Chart(document.getElementById("bubble-chart"), {
                        responsive: true,
                        // maintainAspectRatio: false,
                        type: 'bubble',
                        data: {
                        labels: "Africa",
                        datasets
                        },
                        options: {
                        title: {
                            display: true,
                            text: 'Análisis de riesgos y fortalezas del RI'
                        }, scales: {
                            yAxes: [{ 
                            scaleLabel: {
                                display: true,
                                labelString: _.find(subcategories, function(subcategory){
                                    return subcategory.id == subcategoryIdOnYAxis
                                }).name,
                                max: 110
                            },
                            ticks: {
                                    beginAtZero: true,
                                    // steps: 10,
                                    // stepValue: 5,
                                    max: 110
                                },
                                gridLines: {
                                    zeroLineWidth: 1,
                                    zeroLineColor: '#424234'
                                },
                            }],
                            xAxes: [{ 
                            scaleLabel: {
                                display: true,
                                labelString: _.find(subcategories, function(subcategory){
                                    return subcategory.id == subcategoryIdOnXAxis
                                }).name,
                            },
                            ticks: {
                                    beginAtZero: true,
                                    // steps: 10,
                                    // stepValue: 5,
                                    max: 110
                                },
                                gridLines: {
                                    zeroLineWidth: 1,
                                    zeroLineColor: '#424234'
                                },
                            }]
                        }
                        }
                    });
                }

                
            }
        }

    </script>

</div>
