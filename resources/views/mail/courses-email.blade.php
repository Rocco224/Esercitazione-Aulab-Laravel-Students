<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        Ciao {{ $name }},<br>
        Attualmente sei iscritto ai seguenti corsi: 
        @foreach($courses as $course)
        {{ $course }}
        @endforeach
    </div>
</body>

</html>