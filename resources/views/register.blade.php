<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/registro.css') }}">
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">TextilExport</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
                <a class="nav-link" href="{{route('login')}}">Iniciar Sesion</a>
                <a class="nav-link" href="{{route('registro')}}">Registro</a>
      </div>
    </div>
  </div>
</nav>
  <div class="containerForm">
  <form method='POST' action="{{route('validar-registro')}}">
  <h4>Registrarse</h4>
  @if($errors->all())
            <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
            </div>
        @endif
    @csrf
    <input type="hidden" name="rol" value='3'>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  value="{{ old('nombre') }}" name="nombre" aria-describedby="emailHelp" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="Apellido">Apellido</label>
    <input type="text" class="form-control" id="Apellido" value="{{ old('apellido') }}" name="apellido" placeholder="Apellido">
  </div>
  <div class="form-group">
    <label for="correo">Email</label>
    <input type="email" class="form-control" id="correo"  value="{{ old('correo') }}" name="correo" placeholder="Correo">
  </div>
  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password"  name="password" placeholder="Password" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary">Registrarse</button>
</form>
        </div>
</body>
</html>