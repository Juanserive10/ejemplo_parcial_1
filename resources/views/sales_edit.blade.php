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
    <form action="{{route("sales.update",  $sale->id)}}" method="post">
        @csrf
        @method("put")
        <label for="a1">Ingrese el Nombre del cliente</label>
        <input type="text" name="nombre" id="a1" value="{{$sale->customer_name}}">
        <br>
        <label for="a1">Ingrese la cantidad de venta</label>
        <input type="text" name="cantidad" id="a2" value="{{$sale->quantity}}">
        <br>
        <select name="productos" id="">
            @foreach ($products as $product)
                <option value="{{$product->id}}" {{$product->id == $sale->product_id ? 'selected': ''}}>{{$product->name}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Guardar Venta</button>
    </form>
</body>
</html>