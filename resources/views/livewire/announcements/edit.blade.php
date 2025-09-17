<div class="mb-4">

    @section('header')
    <x-page-title title="Editar convocatoria"
        description="Este módulo permite modificar las fechas de la convocatoria seleccionada."></x-page-title>
    @endsection

    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-6">
            <x-forms.announcements :announcement="$announcement"/>
        </div>
    </div>

</div>
