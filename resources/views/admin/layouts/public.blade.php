<html>
<head>
    <title>这是@yield('title')</title>
</head>
<body>
    @section('sidebar')
        这是主布局侧边栏
    @show
    <div class="container">
        @yield('content')
    </div>
</body>
</html>