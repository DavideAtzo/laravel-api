<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>email comment</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>E' stato inviato un commento al post.</h1>
            <div>Questo è il messaggio:</div>
            <p>{{ $comment->content }}</p>
        </div>
    </div>
</body>
</html>