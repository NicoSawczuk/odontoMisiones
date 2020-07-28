<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Odonto Misiones</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/admin-lte//plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/admin-lte/dist/css/adminlte.min.css')}}">

</head>

<body class="container-fluid">
    <div class=" mt-4 row justify-content-center">
        <div class="col-md-9">
            <div class="alert bg-teal alert-dismissible">
                <h3><i class="fas fa-check-circle"></i> Registro completo</h3>

                <p>Hola {{Auth::user()->name}} {{Auth::user()->apellido}}, Bienvenido a Odonto Misiones
                    <br>Tu perfil está pendiente de revisión, en breve lo estaremos haciendo y ya podrás utilizar
                    nuestros servicios.
                    <br>
                    Por favor esperaa la revisión y
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        vuelve a iniciar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </p>
            </div>
        </div>
    </div>
</body>

</html>