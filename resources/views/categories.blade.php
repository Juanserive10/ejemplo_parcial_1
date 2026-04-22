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
    <form action="{{route("categories.store")}}" method="post">
        @csrf
        <label for="a1">Ingrese el Nombre de la Categoria</label>
        <input type="text" name="nombre" id="a1">
        <br>
        <button type="submit">Guardar Categoria</button>
    </form>
    <h1>Listado de Categorias</h1>
    @if (@session("error"))
        {{session("error")}}
    @endif
    <table class = "table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route("categories.edit",$category->id)}}" class = "btn btn-warning">Editar</a>
                        <form action="{{route("categories.destroy",$category->id)}}" method="post">
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