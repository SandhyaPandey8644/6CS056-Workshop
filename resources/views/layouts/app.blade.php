
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Workshop 2')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    @include('partials.navbar')

    <main class="container">
        @if(session('success'))
            @include('components.alert', ['type' => 'success', 'message' => session('success')])
        @endif

        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
