<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Analyzer</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/js/app.js" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body class="d-flex flex-column">
@include('navbar')
@include('flash::message')
@if ($errors->any())
    <div class="alert alert-danger mb-0">
        <ul class="list-style ps-0 mb-0">
            @foreach( $errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<main class="flex-grow-1">
    @yield('content')
</main>
<footer class="border-top py-3 mt-5">
    <div class="container-lg">
        <div class="text-center">
            <a href="#" target="_blank">LOCALHOST</a>
        </div>
    </div>
</footer>
<script src="/js/app.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
