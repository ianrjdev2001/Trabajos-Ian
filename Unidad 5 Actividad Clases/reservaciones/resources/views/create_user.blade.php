<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="http://127.0.0.1:8000/users/">
        @csrf
        <input type="text" placeholder="name" name="name">
        <input type="" placeholder="lastname" name="lastname">
        <button type="submit">Guardar</button>
    </form>
</body>
</html>