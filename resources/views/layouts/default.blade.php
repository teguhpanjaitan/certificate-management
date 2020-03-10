<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body>
    <div class="container">
        <header class="row">
            @include('includes.header')
        </header>
        <aside class="main-sidebar">
            @include('includes.sidebar')
        </aside>
        <div id="main" class="row">
            @yield('content')
        </div>
        <footer class="main-footer">
            @include('includes.footer')
        </footer>
    </div>
</body>

</html>