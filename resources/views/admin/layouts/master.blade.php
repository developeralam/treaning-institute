
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

     bootstrap & fontawe
     <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/font-awesome/4.5.0/css/font-awesome.min.css') }}"/>

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fonts.googleapis.com.css') }}" />
    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace-part2.min.css') }}" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace-ie.min.css') }}" />
    
    <![endif]-->
    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('admin/assets/js/ace-extra.min.js') }}"></script>
    <!--[if lte IE 8]>
    <script src="{{ asset('admin/assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/respond.min.js') }}"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

    @yield('css')
</head>

<body class="no-skin">
@include('admin.layouts._header')

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    @include('admin.layouts._sidebar')

    <div class="main-content">
        <div class="main-content-inner">

            @include('admin.layouts._breadcrumbs')

            <div class="page-content">

{{--            @include('admin.layouts._settings')--}}

                <!-- /.ace-settings-container -->

                @yield('content', 'Default Content')
    
            <!-- /.row -->
            </div><!-- /.page-content --> 
        </div>
    </div><!-- /.main-content -->
    @include('admin.layouts._footer')
</div><!-- /.main-container --> 
    <script src="{{ asset('admin/assets/js/jquery-2.1.4.min.js') }}"></script>
    <![endif]-->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('admin/assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
    </script>
    <!-- ace scripts -->
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <script type="text/javascript">
        let activeMenu = $('.submenu li.active');
        activeMenu.parent().removeClass('nav-hide').addClass('nav-show')
        activeMenu.parent().parent().addClass('open')
    </script>  
    @yield('js')

    <script type="text/javascript">

        @if(session()->get('message'))
        swal.fire({
            title: "Success",
            text: "{{ session()->get('message') }}",
            type: "success",
            timer: 1000
        });
        @elseif(session()->get('error'))
        swal.fire({
            title: "Error",
            text: "{{ session()->get('error') }}",
            type: "error",
            timer: 1000
        });
        @endif

    </script>
</body>
</html>
