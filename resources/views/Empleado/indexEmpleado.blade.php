<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/backgroundAll.css')}}">
    <link rel="stylesheet" href="{{asset('css/productos.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
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
                <a href="{{route('logout')}}" class="nav-link">Cerrar Sesion</a>
                <a href="{{route('empleado.crear')}}" class="nav-link">Crear Producto</a>
            </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="productos">
            @foreach($productos as $prod)
            <div class="producto">
                <img src="{{$prod->img}}" alt="">
                <p>{{$prod->codigoProducto}}</p>
                <p>{{$prod->nombre}}</p>
                <p>{{$prod->descripcion}}</p>
                <p>{{$prod->categoria}}</p>
                <p>{{$prod->precio}}</p>
                <p>{{$prod->existencias}}</p>
                <a href="empleado/editarProducto/{{$prod->codigoProducto}}" class="btn btn-primary">Editar Producto</a>
                <a href="empleado/delete/{{$prod->codigoProducto}}" class="btn btn-danger">Eliminar Producto</a>
            </div>
                
            @endforeach
            </div>
        </div>
    </main>
</body>
</html>