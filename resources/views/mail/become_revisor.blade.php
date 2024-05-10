<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Un utente ha richiesto di lavorare con noi</h1>
    <h2>Ecco i suoi dati:</h2>
    <p>Nome: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>
    <p>Se vuoi renderlo Revisore clicca qui:</p>
    <a href="{{route('makeRevisor', compact('user'))}}">Rendi Revisore</a>
</body>
</html>