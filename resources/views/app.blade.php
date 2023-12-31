<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Facebook Meta -->
    <meta property="fb:pages" content="" />
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="TeachHub" />
    <meta property="og:description"
        content="Discover qualified teachers in your city and give your child the gift of personalized learning. Connectwithus and let's shape the future of education together" />
    <title>TeachHub</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./slick/slick-theme.css">
    {{--
    <link rel="stylesheet" href="./css/slick.css"> --}}
    <link rel="shortcut icon" href="./favicon.jpg" type="image/x-icon">
    <link rel="preload" as="image" href="/images/hero.png">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YWZ4FSNQHK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YWZ4FSNQHK');
    </script>

    <div id="app"></div>
    @if (request()->getHost() == 'localhost' || request()->getHost() == '127.0.0.1')
    <script src="{{ mix('/js/app.js') }}"></script>
    @else
    <script src="{{ mix('/js/app.js.gz') }}" type="text/javascript" charset="utf-8"></script>
    @endif
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>

</html>
