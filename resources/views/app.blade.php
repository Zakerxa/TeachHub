<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Facebook Meta -->
    <meta property="fb:pages" content="100240385045148" />
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="TeachHub" />
    <meta property="og:description" content="" />
    <title>TeachHub</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./slick/slick.css">
    <link rel="stylesheet" href="./slick/slick-theme.css">
    <link rel="shortcut icon" href="images/circle.png" type="image/x-icon">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div id="app"></div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="./slick/slick.min.js"></script>
</body>

</html>
