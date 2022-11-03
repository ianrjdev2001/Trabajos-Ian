<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="http://127.0.0.1:8000/clients">
        @csrf
        <label for="">Nombre:</label>
        <input type="text" placeholder="Name" name="name">
        <br>
        <label for="">Phone Number</label>
        <input type="text" placeholder="Ingrese su telefono" name="phone_number">
        <br>
        <label for="">Email</label>
        <input type="email" placeholder="Email" name="email">
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>