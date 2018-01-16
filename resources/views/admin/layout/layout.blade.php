<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> 后台首页 </title>

    <!-- Bootstrap -->
    <link href="{{ asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('admin/build/css/custom.min.css') }}" rel="stylesheet">
    <script src="{{ asset('seajs/seajs-2.2.3/dist/sea.js') }}"></script>
    @yield('css')
    <script>
        var paths = {};
        paths.asset = '{{ asset('admin') }}';
        paths.module_js = paths.asset+'/js';
        paths.vendors = paths.asset+'/vendors';
        paths.build = paths.asset+'/build';
        js_csrf_token = '{{  csrf_token() }}';
    </script>
    <script src="{{ asset('admin/js/config.js') }}"></script>

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
               {{-- <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
                </div>--}}

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>欢迎你,</span>
                        <h2>{{ auth()->user()->name }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    @include('admin.layout.sideBar')
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                {{--<div class="sidebar-footer hidden-small">--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="Settings">--}}
                        {{--<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
                        {{--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="Lock">--}}
                        {{--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="Logout">--}}
                        {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
           @include('admin.layout.top')
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            @include('admin.layout.footer')
        </footer>
        <!-- /footer content -->
    </div>
</div>
@yield('js')
<script>
    seajs.use(['module_js/layout/layout'],function (layout) {
    })
</script>
<!-- /gauge.js -->
</body>
</html>
