<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body>
    <div class="container">
        @include('includes.header')
        <div id="main" class="row">
            @yield('content')
        </div>
    </div>
</body>

</html>
