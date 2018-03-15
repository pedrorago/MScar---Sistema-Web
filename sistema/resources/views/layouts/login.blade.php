<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    <title>MSCAR - @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta author="Mangue Tecnologia">

    <!-- GERAR ÍCONES -->

    <base href="<?= $url_base; ?>">

    <link rel='icon' href='img/icon.png'>

    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/responsive.css">

</head>

<body class="loginBody"> 
    
    <div class="content">

        @yield('content')

    </div>

    <script src="/js/jquery-3.2.1.min.js" ></script>
    <script src="/js/plugins/jquery.validate.js" ></script>
    <script src="/js/login.js"></script>

</body>
</html>