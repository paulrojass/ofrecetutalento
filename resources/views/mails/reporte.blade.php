<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Reporte</title>
</head>
<body>
    <p>Hola! Se ha reportado un nuevo caso de reclamo.</p>
    <p>Estos son los datos del usuario que ha realizado la denuncia:</p>
    <ul>
        <li>Fecha: {{ $fecha }}</li>
        <li>Nombre: {{ auth()->user()->name }} {{ auth()->user()->lastname }}</li>
        <li>Correo: {{ auth()->user()->email }}</li>
        <li>Descripción del evento: {{ $nombre }}</li>
        <li>Causa del evento: {{ $causa }}</li>
        <li>Descripción del evento: {{ $descripcion }}</li>
        <li>¿Revisar los mensajes?: {{ $revisar }}</li>
    </ul>
</body>
</html>