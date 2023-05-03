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
                        <a href="{{route('cliente.carrito')}}" class="nav-link">Volver al carrito</a>
                        <a class="nav-link" href="{{route('logout')}}">Cerrar Sesion</a>
            </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <form action="{{route('cliente.completar')}}">
                @csrf
                @method('POST')
                @if($errors->all())
                <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
                </div>
                @endif
                <div class="form-group">
                    <label for="" class="form-label">Nombre Completo</label>
                    <input type="text" name="nombre" require class="form-control" value="{{old('nombre')}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Telefono</label>
                    <input type="text" name="telefono" require class="form-control" value="{{old('telefono')}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Direccion</label>
                    <input type="text" name="Direccion" require class="form-control" value="{{old('Direccion')}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Numero de tarjeta</label>
                    <input type="text" name="tarjeta" require class="form-control" value="{{old('tarjeta')}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">CV</label>
                    <input type="text" name="cv" require class="form-control" value="{{old('cv')}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Fecha de expiracion</label>
                    <input type="text" name="fecha" require class="form-control" value="{{old('fecha')}}">
                </div>
                <input type="hidden" name="productos" value="{{$cantidad}}">
                <input type="hidden" name="total" value="{{$total}}">
                <div class="form-group">
                    <input type="submit" value="Comprar" class="btn btn-success">
                </div>
            </form>
            <p>Total a pagar:{{$total}}</p>
            <table class="table table-bordered">
                <tr>
                    <th>Codigo producto</th>
                    <th>Nombre Producto</th>
                    <th>descripcion</th>
                    <th>precio</th>
                </tr>
                @foreach($carrito as $prod)
                <tr>
                    <td>{{$prod->idProducto}}</td> 
                    <td>{{$prod->nombre}}</td> 
                    <td>{{$prod->descripcion}}</td> 
                    <td>{{$prod->precio}}</td> 
                </tr>
                @endforeach
            </table>
            <a href="" class="btn btn-primary">Comprar</a>
        </div>
    </main>
</body>
</html>