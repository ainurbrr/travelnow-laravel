<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
    <title>@yield('title')</title>
</head>

<body>
    <!-- Navbar -->
    @include('includes.navbar-alternate')

    <!-- content -->
    @yield('content')

@include('includes.footer')


@stack('prepend-style')
@include('includes.script')
@stack('addon-script')

</body>

</html>