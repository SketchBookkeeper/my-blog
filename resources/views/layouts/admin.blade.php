<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paul Allen's Blog | Admin</title>

    <!-- Scripts -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"
    ></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<header class="container mb-5 mt-2">
    <div class="row">
        @if (Auth::check())
            @include ('admin-partials.nav')
        @endif
    </div>
</header>

<body>
    <main class="container">
        @yield('content')
    </main>

    @include('admin-partials.errors')

    @include('admin-partials.messages')
</body>
</html>
