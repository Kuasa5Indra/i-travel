<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('includes.client.style')
    @stack('styles')
</head>
<body>
    @include('includes.client.navbar-alternate')
    @yield('content')

    @include('includes.client.footer')

    @include('includes.client.script')
    @stack('scripts')
</body>
</html>