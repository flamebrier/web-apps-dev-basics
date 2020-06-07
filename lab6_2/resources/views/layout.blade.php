<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Ubuntu, sans-serif;
            font-weight: 300;
        }
        main {
            background-color: white;
            border-radius: 10px;
            border: 1px solid lightblue;
            padding: 2% 4%;
            margin: 0 auto;
            width: 70%;
            min-width: min-content;
            box-shadow: 5px 5px 5px -5px lightblue;
            text-align: center;
        }
        h1, th {
            text-align: left;
            color: mediumvioletred;
        }
        table {
            border-collapse: collapse;
            color: darkslategray;
            margin: 0 auto;
        }
        td, th {
            text-align: justify;
            border: 1px dashed lightslategray;
            padding: 5px 10px;
            margin: 0;
        }
        header {
            text-align: left;
            margin: 2%;
        }
        .primary {
            background-color: mediumvioletred;
            border: none;
        }
        .primary:hover {
            background-color: mediumorchid;
        }
        .btn-block {
            display: inline-grid;
            width: min-content;
        }
    </style>
</head>
<body>
<main>
    <h1>@yield('title')</h1>
    <header>
        <nav>
            <a href="{{ url('/') }}" class="btn text-danger text-center" role="button">Главная</a>
            <a href="{{ url('queue/') }}" class="btn btn-dark text-center" role="button">Очередь</a>
        </nav>
        @yield('create')
        </header>
    @yield('content')
    @yield('clients')
</main>
@yield('scripts')
</body>
</html>
