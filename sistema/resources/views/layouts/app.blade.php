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
    <link rel="stylesheet" href="/css/ionicons.css">

    <link rel="stylesheet" href="/css/plugins/select2.bootstrap.css">
    <link rel="stylesheet" href="/css/plugins/select2.css">
    
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/responsive.css">

</head>

<body> 


    <div class="content">

        @include('modais.modal-clientes')
        @include('modais.modal-pedidos')
        @include('modais.modal-servico')
        @include('modais.modal-orcamento')
        @include('modais.modal-estoque')
        @include('modais.modal-produto')

        @include('template.header')
        @include('template.sidebar')

        @yield('content')

    </div>

    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/plugins/jquery.validate.js"></script>
    <script src="/js/plugins/jquery.maxlength.min.js"></script>
    <script src="/js/plugins/select2.min.js"></script>
    <script src="/js/plugins/jquery.mask.js"></script>
	<script src="/js/plugins/Chart.min.js"></script>
    <script src="/js/app.js"></script>

</body>
</html>