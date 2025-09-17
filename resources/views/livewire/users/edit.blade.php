<div class="mb-4">

    @section('header')
    <x-page-title title="Editar usuario"
        description="Este módulo permite modificar la información del usuario."></x-page-title>
    @endsection

    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-6">
            <x-forms.users :user="$user" />
        </div>
    </div>
</div>