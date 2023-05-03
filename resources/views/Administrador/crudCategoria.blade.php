<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/backgroundAll.css') }}">
    <link rel="stylesheet" href="{{asset('css/CreacionesAdministrador.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="/admin">Registrar empleado</a>
                        <a class="nav-link" href="/admin/categorias">Registrar categoria</a>
                        <a class="nav-link" href="/admin/administradores">Registrar administrador</a>
                        <a class="nav-link" href="{{route('logout')}}">Cerrar Sesion</a>
            </div>
            </div>
        </div>
    </nav>

    <div class="containerForm">
    <form method='POST' action="{{route('registro-categoria')}}" autocomplete="off" class="form">
    <h4>Registrar categoria</h4>
    @if($errors->all())
                <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
                </div>
            @endif
        @csrf
        <input type="hidden" name="rol" value='2'>
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" id="exampleInputEmail1"  value="{{ old('nombre') }}" name="nombre" aria-describedby="emailHelp" placeholder="Nombre">
    </div>
    <button type="submit" class="btn btn-success">Registrar</button>
    </form>

    <table class="table table-dark table-striped">
            <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Options</th>
            <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->nombre}}</td>
            <td>
                <a href="/admin/deleteCategoria/{{$categoria->id}}" class='btn btn-danger'>Eliminar</a>
            </td>
            <td>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$categoria->id}}">Actualizar</a>
            </td>
        </tr>

        <div class="modal fade" id="exampleModal{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method='POST' action="/admin/editCategoria/{{$categoria->id}}" autocomplete="off">
            <h4>Editar empleado</h4>
                @method('PUT');
                @csrf
                @if($errors->all())
                <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
                </div>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1" class='text-dark'>Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  value="{{$categoria->nombre}}" name="nombre" aria-describedby="emailHelp" placeholder="Nombre">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
            </form>
        </div>
        </div>
        @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>