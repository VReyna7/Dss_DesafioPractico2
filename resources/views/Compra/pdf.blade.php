<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}

nav{
    background-color: bisque;
    width: 100%;
    min-height: 100px;
    text-align: center;
}

main{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

table{
    border: 1px solid;
    text-align: center;
}

.contenedor>p{
    font-size: 1.2em;
}

.total{
    font-size: 1.5em;
    font-weight: bold;
}

.cabecera{
    background-color: black;
    color: white;
}
</style>
<body>
    <nav>
        <h1>TextilExport</h1> 
        <h2>Comprobante de pago</h2> 
    </nav>
    <main>
    <div class="contenedor">
        <p>Nombre:{{$info['nombre']}}</p>
        <p>Telefono:{{$info['telefono']}}</p>
        <p>Direccion:{{$info['Direccion']}}</p>
        <p class="total">Total: {{$info['total']}}$</p>
    </div>
    <h1 class="text-center">Productos</h1>
    <table class="table table-bordered">
        <thead class="cabecera">
        <tr>
            <th>Codigo producto</th>
            <th>Cantidad</th>
            <th>Fecha de venta</th>
        </tr>
        </thead>
        @foreach($prod as $producto)
        <tr>
            <td>{{$producto->idProducto}}</td>
            <td>{{$producto->cantidad}}</td>
            <td>{{date('Y-m-d')}}</td>
        </tr>
        @endforeach
    </table>
    </main>
</body>
</html>