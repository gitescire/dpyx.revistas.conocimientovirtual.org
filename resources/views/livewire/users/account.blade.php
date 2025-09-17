<div class="mb-4">

    @section('header')
    <x-page-title title="Cuenta de usuario" description="Este módulo permite ver tu información de usuario.">
    </x-page-title>
    @endsection

    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="{{route('users.account.edit')}}" class="btn btn-warning btn-shadow rounded-0 float-right">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </div>
                <div class="col-12">
                    <x-forms.account />
                </div>
            </div>
        </div>
    </div>

</div>