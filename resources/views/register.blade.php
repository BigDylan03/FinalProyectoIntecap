<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro exitoso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background: #f0f9f0;
        }
        h2 {
            color: green;
        }
        a button {
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }
        a button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <h2>✅ Su información se ha registrado exitosamente</h2>
    <a href="{{route ('welcome')}}"><button>Regresar a la página inicial</button></a>
</body>
</html>
