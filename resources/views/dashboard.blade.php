<x-app-layout>

    @section('header')
    <x-page-title title="Tablero"
        description="¡Bienvenido! Debajo aparecen una serie de instrucciones para el uso adecuado de {{getenv('APP_NAME')}}"></x-page-title>
    @endsection

    @if (auth()->user()->is_admin)
    @include('instructions.admins');
    @endif

    @if (auth()->user()->is_evaluator)
    @include('instructions.evaluators');
    @endif

    @if (auth()->user()->hasRole('usuario'))
    @include('instructions.users')
    @endif


</x-app-layout>