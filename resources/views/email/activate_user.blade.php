<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<p>Hola {{ $user->name }},</p>

<p>Para activar tu cuenta, haz clic en el siguiente enlace:</p>

<p><a href="{{ $activationUrl }}">Activar cuenta</a></p>

<p>Si no solicitaste este registro, ignora este mensaje.</p>

</body>
</html>