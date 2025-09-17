<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Recuperar contraseña</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Kero HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/kero.css')}}">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <form method="POST" action="/reset-password">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="modal-body">
                                        <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                                <x-jet-validation-errors class="mb-4" />

                                                <div class="d-flex justify-content-center">
                                                    <img src="{{url('images/logo.png')}}" width="120px"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div>Modifica tu contraseña,</div>
                                                <span>Completa y envía el formulario.</span>
                                                @if (session('status'))
                                                <div class="mb-4 font-medium text-sm text-green-600">
                                                    {{ session('status') }}
                                                </div>
                                                @endif
                                            </h4>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label for="" class="text-uppercase text-muted">Correo</label>
                                                <div class="position-relative form-group">
                                                    <input name="email" id="exampleEmail" type="email"
                                                        value="{{old('email', $request->email)}}" class="form-control"
                                                        readonly required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="text-uppercase text-muted">Contraseña</label>
                                                <div class="position-relative form-group"><input name="password"
                                                        id="examplePassword" placeholder="Password" type="password"
                                                        class="form-control" required autocomplete="new-password"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="text-uppercase text-muted">Confirmar
                                                    contraseña</label>
                                                <div class="position-relative form-group"><input
                                                        name="password_confirmation" required
                                                        placeholder="confirmar contraseña" autocomplete="new-password"
                                                        type="password" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="divider"></div>
                                    </div>
                                    <div class="modal-footer clearfix">
                                        <div class="float-right">
                                            <button class="btn btn-primary btn-lg">Cambiar contraseña</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">dPyx - {{getenv('APP_NAME')}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>