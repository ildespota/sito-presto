<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{-- <h1>Benvenuto {{$contact['name']}}</h1> --}}
    <h1>Nuova richiesta di collaborazione</h1>
    <h3>{{$contact['name']}} ha richiesto di diventare collaboratore:</h3>
    <ul>
        <li>{{$contact['name']}}</li>
        <li>{{$contact['mail']}}</li>
        <li>{{$contact['number']}}</li>
        <li>{{$contact['address']}}</li>
    </ul>
    <p>{{$contact['body']}}</p>
</body>
</html>