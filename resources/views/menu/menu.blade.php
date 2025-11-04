<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <title>Menu</title>
</head>
<body>
    <h1>Que Desea hacer hoy?</h1>
    <div class="opciones">
        <div class="opcion">
            <a href="{{route ('menu.send')}}">Enviar Dinero</a>
        </div>
        <div class="opcion">
            <a href="{{route ('menu.update')}}">Actualizar Información</a>
        </div>
        <div class="opcion">
            <a href="{{route ('menu.delete')}}">Eliminar mi cuenta</a>
    </div>
</div>
</body>
</html>