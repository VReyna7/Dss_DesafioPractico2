<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/backgroundAll.css')}}">
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
                <a href="{{route('empleado.index')}}" class="nav-link">Inicio</a>
            </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <form action="{{route('empleado.guardar')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Codigo Producto</label>
                    <input type="text" name="codigoProducto" require class="form-control" placeholder="PROD###" value="{{old('codigoProducto')}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" name="nombre" require value="{{old('nombre')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Descripcion del producto</label>
                    <input type="text" name="descripcion" require value="{{old('descripcion')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="img" class="form-label">Imagen del producto</label>
                    <input type="file" name="imagen" require value="{{old('imagen')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Categoria</label>
                    <select name="categoria" id="" class="form-control">
                        @foreach($categorias as $cat)
                            <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label for="">Precio</label>
                    <input type="text" name="precio" require value="{{old('precio')}}" class="form-control">
                </div>
                <div class="">
                    <label for="">Existencias</label>
                    <input type="text" name="existencias" require value="{{old('existencias')}}" class="form-control">
                </div>
                <div class="">
                    <input type="submit" value="Crear" class="btn btn-primary">
                </div>
            </form>
        </div>
    </main>
</body>
</html>