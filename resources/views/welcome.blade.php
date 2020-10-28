<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito';
            padding: 0;
            margin: 0;
        }

        .incompatable-browser {
            min-height: 100vh;
            background-color: #1a202c;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

    </style>


</head>

<body class="incompatable-browser">
    <div class="incompatable-browser-cont">
        <h1>You are here with us</h1>
        <h2>This page can only be viewed with a Chrome browser</h2>
    </div>
</body>

</html>
