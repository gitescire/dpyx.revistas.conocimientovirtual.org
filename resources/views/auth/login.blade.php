<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Iniciar sesión</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="dPyx">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/kero.css')}}">
</head>

<body >
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container my-gradient">
            <div class="h-100 bg-plum-plate bg-animation">
                
                <div class="d-flex h-100 justify-content-center align-items-center flex-column">
             <div class=""><a href="https://dpyx.site" target="_blank;” rel="noopener;”><img src="{{asset('images/default/dpyx.png')}}" width="320px" class="img-fluid" alt="" style="width:10%; margin: auto;"></a></div>

                    <div class="mx-auto app-login-box col-md-8">
                        {{-- <div class="app-logo-inverse mx-auto mb-3"></div> --}}
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                                    <x-jet-validation-errors class="mb-4" />

                                                <div class="d-flex justify-content-center">
                                                    <img src="{{url('images/dpyx.png')}}" width="200px"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div>Bienvenido</div>
                                                <span>Por favor inicia sesión con tu cuenta.</span>
                                                @if (session('status'))
                                                <div class="mb-4 font-medium text-sm text-green-600">
                                                    {{ session('status') }}
                                                </div>
                                                @endif
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input name="email" required
                                                        autofocus id="exampleEmail" placeholder="Correo electrónico"
                                                        type="email" class="form-control"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="examplePassword" placeholder="Contraseña"
                                                        type="password" class="form-control" required
                                                        autocomplete="current-password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-check"><input name="remember"
                                                id="exampleCheck" type="checkbox" class="form-check-input"><label
                                                for="exampleCheck" class="form-check-label">Recordarme
                                                contraseña</label></div>
                                        {{-- <div class="divider"></div>
                                    <h6 class="mb-0">No account? <a href="javascript:void(0);" class="text-primary">Sign
                                            up now</a></h6> --}}
                                    </div>
                                    <div class="modal-footer clearfix">
                                        @if (Route::has('password.request'))
                                        <div class="float-left">
                                            <a href="{{ route('password.request') }}"
                                                class="btn-lg btn btn-link">Recuperar
                                                contraseña</a>
                                        </div>
                                        @endif
                                        <div class="float-right">
                                            <button class="btn btn-primary btn-lg">Iniciar sesión</button>
                                        </div>
                                    </div>
                                </form>
							
                        </div>
                    </div>
                    <div class=""><a href="https://dpyx.site" target="_blank;” rel="noopener;”><img src="{{asset('images/default/world.png')}}" width="120px" class="img-fluid" alt="" style="width:5%; margin: auto;"></a></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>

</html>