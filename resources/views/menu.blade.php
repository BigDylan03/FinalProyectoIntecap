<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="menu.css">
    <title>Menu</title>
</head>
<body>
    <h1>Que Desea hacer hoy?</h1>
    <div class="container">
        <div class="opcion" id="op1">
            <a href="enviar.php">Enviar Dinero</a>
        </div>
        <div class="opcion" id="op2">
            <a href="">Actualizar Informacion</a>
        </div>
        <div class="opcion" id="op3">
            <a href="">Eliminar mi cuenta</a>
        </div>

        
        <a href="{{ route('login') }}">Inicio</a>
            <a href="{{ route('logout') }}">Cerrar Sesión</a>
    </div>
</body>
</html>