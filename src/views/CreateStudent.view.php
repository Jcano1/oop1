<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/createNewStudent" method="POST">
    <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="dni">last_name:</label>
        <input type="text" id="last_name" name="last_name" required>
        
        <label for="DNI">DNI:</label>
        <input type="text" id="DNI" name="DNI" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Enviar</button>
    </form>

</body>
</html>