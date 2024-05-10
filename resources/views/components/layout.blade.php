<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="/img/logo1.png" />
    <title>Presto.it</title>
</head>
<body >

    <x-navbar />

    {{$slot}}

    <x-footer />
    
</body>
</html>