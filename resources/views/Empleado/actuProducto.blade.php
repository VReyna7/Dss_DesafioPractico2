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
            <form action="/empleado/updateProducto/{{$producto->codigoProducto}}" method="POST" enctype="multipart/formdata">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="codigoProducto" class="form-label">Codigo Producto</label>
                    <input type="text" name="codigoProducto" require disabled value="{{$producto->codigoProducto}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" require value="{{$producto->nombre}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion del producto</label>
                    <input type="text" name="descripcion" require value="{{$producto->descripcion}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen del producto</label>
                    <input type="file" name="imagen" require value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="" class="form-control">
                        @foreach($categorias as $cat)
                            <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" require value="{{$producto->precio}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="existencias">Existencias</label>
                    <input type="text" name="existencias" require value="{{$producto->existencias}}" class="form-control">
                </div>
                <div class="form-grup">
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </main>
</body>
</html>