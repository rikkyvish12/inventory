<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body>
    <div class="container" style="background-color: rgb(232, 237, 253)">
        @include('includes.header')
        <div id="main" class="row">
            @yield('content')
        </div>
    </div>
</body>

</html>
