@component('mail::message')
# La revista {{$repository->name}} tiene el estatus: {{$repository->status}}.

{{$comments}}

@component('mail::button', ['url' => route('repositories.index')])
Ver revista
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
