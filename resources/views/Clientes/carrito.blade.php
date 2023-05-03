<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/backgroundAll.css') }}">
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
                        <a href="{{route('cliente.index')}}" class="nav-link">Seguir comprando</a>
                        <a class="nav-link" href="{{route('logout')}}">Cerrar Sesion</a>
            </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <th>Codigo producto</th>
                    <th>Nombre Producto</th>
                    <th>descripcion</th>
                    <th>precio</th>
                    <th>operaciones</th>
                </tr>
                @foreach($carrito as $prod)
                <tr>
                    <td>{{$prod->idProducto}}</td> 
                    <td>{{$prod->nombre}}</td> 
                    <td>{{$prod->descripcion}}</td> 
                    <td>{{$prod->precio}}</td> 
                    <td><a href="/cliente/borrar/{{$prod->idProducto}}" class="btn btn-danger">Eliminar Producto</a></td> 
                </tr>
                @endforeach
            </table>
            <p>Total:{{$total}}</p>
            @if($carrito->count())
            <a href="{{route('cliente.comprar')}}" class="btn btn-primary">Comprar</a>
            @endif
        </div>
    </main>
</body>
</html>