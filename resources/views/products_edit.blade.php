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
    <form action="{{route("products.update", $product->id)}}" method="post">
        @csrf
        @method("put")
        <label for="a1">Ingrese el Nombre del producto</label>
        <input type="text" name="nombre" id="a1" value = "{{$product->name}}">
        <br>
        <label for="a1">Ingrese el precio del producto</label>
        <input type="text" name="precio" id="a2" value = "{{$product->price}}">
        <br>
        <select name="categorias" id="">
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected': ''}} >{{$category->name}}</option>
            @endforeach
        </select>
        <button type="submit">Guardar Categoria</button>
    </form>
</body>
</html>