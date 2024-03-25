<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{ asset('storage/logo.jpg') }}" sizes="16x16" />
        <title>Vit Vendas</title>

        @vite(['resources/css/app.css','resources/js/app.js'])
        
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href={{asset('css/bootstrap/bootstrap.min.css')}}>
        <link rel="stylesheet" type="text/css" href={{asset('css/login/login.css')}}>
    </head>

    <body>
        @yield('conteudo')
        @yield('scripts')
    </body>
</html>