<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Custom Login</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <hr>
        @if(session()->has('flash'))
            <div class="alert alert-info"> {{ session('flash')}}</div>
        @endif

        @yield('content')
    </div>

    <script src="/js/bootstrap.min.js"></script>
</body>
</html>