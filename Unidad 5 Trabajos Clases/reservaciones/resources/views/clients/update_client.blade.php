<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{url('clients/')}}">
        @method('PUT')
        @csrf
        <label for="">Nombre:</label>
        <input type="text" placeholder="Name" name="name" value="{{$client->name}}">
        <br>
        <label for="">Phone Number</label>
        <input type="text" placeholder="Ingrese su telefono" name="phone_number" value ="{{$client->phone_number}}">
        <br>
        <label for="">Email</label>
        <input type="email" placeholder="Email" name="email" value ="{{$client->email}}">
        <br>
        <input type="hidden" placeholder="Name" name="id" value="{{$client->id}}">
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>