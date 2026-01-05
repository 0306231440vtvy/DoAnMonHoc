<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eElectronics - HTML eCommerce Template</title>
    <link href="{{ asset('server/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('client/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/library/customzime.css') }}">
</head>

<body>
    @include('client.components.header  ')
    @include('client.components.nav')
    @yield('content')
    @include('client.components.footer')
</body>

</html>
