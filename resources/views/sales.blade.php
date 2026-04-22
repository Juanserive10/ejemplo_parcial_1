<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="{{route("sales.store")}}" method="post">
        @csrf
        <label for="a1">Ingrese el Nombre del cliente</label>
        <input type="text" name="nombre" id="a1">
        <br>
        <label for="a1">Ingrese la cantidad de venta</label>
        <input type="text" name="cantidad" id="a2">
        <br>
        <select name="productos" id="">
            @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Guardar Venta</button>
    </form>
    <h1>Listado de Ventas</h1>
    <table class = "table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre del Cliente</th>
                <th>Cantidad de compra</th>
                <th>Producto</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{$sale->id}}</td>
                    <td>{{$sale->customer_name}}</td>
                    <td>{{$sale->quantity}}</td>
                    <td>{{$sale->product->name}}</td>
                    <td>
                        <a href="{{route("sales.edit",$sale->id)}}" class = "btn btn-warning">Editar</a>
                        <form action="{{route("sales.destroy",$sale->id)}}" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit" class = "btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</body>
</html>