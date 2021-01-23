<!DOCTYPE html>
<html lang="en">

    <?php $name =\App\SiteConfig::first(); ?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title> <?= $name ? $name->name:null?> </title>
    {{-- - {{ config('app.name') }} --}}
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fonts.googleapis.com.css') }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace-rtl.min.css') }}" />

    <style>
        .login-layout{
            /*background-color: whitesmoke;*/
        }
    </style>


</head>

<body class="login-layout light-login">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <div class="grey mt-5" id="id-text2">
                                    <strong>

                                        <?php $name?$name->name:null?>
                                    </strong>
                                </div>
                            </h1>
                        </div>
                        <br/><br/>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h2 style="text-align: center;
                                        font-size: 30px;
                                        font-weight: bold;"
                                        >Administritive Login</h2>

                                        <h4 class="text-center"
                                            style="background-color: #428BCA;
                                            color: white;
                                            padding: 10px;
                                            margin: 30px 0px;
                                            font-size: 18px;
                                            font-weight: bold;">
                                            <?php
                                                $name =\App\SiteConfig::first(); 
                                            ?>
                                            <?php $name?$name->name:null?>
                                            MM IT AGENT SOFTWARE
                                        </h4>

                                        <div class="space-6"></div>

                                        <form action="{{ route('login') }}" method="post">

                                            @csrf

                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">

                                                        @if(session()->get('massage'))

                                                        <div class="alert alert-{{ session()->get('type') }}">
                                                            <button type="button" class="close" data-dismiss="alert">
                                                                <i class="ace-icon fa fa-times"></i>
                                                            </button>

                                                            <strong>
                                                                @if(session()->get('type') == 'danger')
                                                                <i class="ace-icon fa fa-times"></i>
                                                                Error !
                                                                @else
                                                                <i class="ace-icon fa fa-check-circle-o"></i>
                                                                Success !
                                                                @endif
                                                            </strong>

                                                            {{ session()->get('massage') }}
                                                            <br />
                                                        </div>
                                                        @endif
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email" autofocus>
                                                        <i class="ace-icon fa fa-envelope"></i>
                                                        @error('email')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="current-password">
                                                        <i class="ace-icon fa fa-lock"></i>
                                                        @error('password')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </span>
                                                </label>

                                                <div class="space"></div>

                                                <div class="clearfix">
                                                    <!--  <label class="inline">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"> Remember Me</span>
                                                </label> -->

                                                    <button type="submit" class="width-100 pull-right btn btn-sm btn-primary">
                                                      <!--  <i class="ace-icon fa fa-key"></i> -->
                                                        <span class="bigger-110">Login</span>
                                                    </button>
                                                    <?php
                                                    // echo password_hash("1234567", PASSWORD_DEFAULT);
                                                    ?>
                                                </div>
                                                <div class="space-4"></div>
                                            </fieldset>
                                            <h6 class="text-center" style=" display:block;">Powered by
                                                <a href="https://www.mmitsoft.com/" target="_blank">
                                                    <span style="color:#428BCA;">MM IT SOFT LTD.</span>
                                                </a>
                                            </h6>
                                        </form>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->

                            <div id="forgot-box" class="forgot-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header red lighter bigger">
                                            <i class="ace-icon fa fa-key"></i>
                                            Retrieve Password
                                        </h4>

                                        <div class="space-6"></div>
                                        <p>
                                            Enter your email and to receive instructions
                                        </p>

                                        <form>
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="email" class="form-control" placeholder="Email" />
                                                        <i class="ace-icon fa fa-envelope"></i>
                                                    </span>
                                                </label>

                                                <div class="clearfix">
                                                    <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                        <i class="ace-icon fa fa-lightbulb-o"></i>
                                                        <span class="bigger-110">Send Me!</span>
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div><!-- /.widget-main -->

                                    <div class="toolbar center">
                                        <a href="#" data-target="#login-box" class="back-to-login-link">
                                            Back to login
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.forgot-box -->

                            <div id="signup-box" class="signup-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header green lighter bigger">
                                            <i class="ace-icon fa fa-users blue"></i>
                                            New User Registration
                                        </h4>

                                        <div class="space-6"></div>
                                        <p> Enter your details to begin: </p>

                                        <form>
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="email" class="form-control" placeholder="Email" />
                                                        <i class="ace-icon fa fa-envelope"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control" placeholder="Username" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" class="form-control" placeholder="Password" />
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" class="form-control" placeholder="Repeat password" />
                                                        <i class="ace-icon fa fa-retweet"></i>
                                                    </span>
                                                </label>

                                                <label class="block">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl">
                                                        I accept the
                                                        <a href="#">User Agreement</a>
                                                    </span>
                                                </label>

                                                <div class="space-24"></div>

                                                <!-- <div class="clearfix">
                                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">Reset</span>
                                                </button>

                                                <button type="button" class="width-65 pull-right btn btn-sm btn-success">
                                                    <span class="bigger-110">Register</span>

                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </div> -->
                                            </fieldset>
                                        </form>
                                    </div>

                                    <!-- <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        <i class="ace-icon fa fa-arrow-left"></i>
                                        Back to login
                                    </a>
                                </div> -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.signup-box -->
                        </div><!-- /.position-relative -->

                        <div class="navbar-fixed-top align-right">
                            <br />
                            &nbsp;
                            <a id="btn-login-dark" href="#">Dark</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-blur" href="#">Blur</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-light" href="#">Light</a>
                            &nbsp; &nbsp; &nbsp;
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="{{ asset('admin/assets/js/jquery-2.1.4.min.js') }}"></script>


    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('admin/assets/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
    </script>

    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>


    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            $(document).on('click', '.toolbar a[data-target]', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                $('.widget-box.visible').removeClass('visible'); //hide others
                $(target).addClass('visible'); //show target
            });
        });



        //you don't need this, just used for changing background
        jQuery(function($) {
            $('#btn-login-dark').on('click', function(e) {
                $('body').attr('class', 'login-layout');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'blue');

                e.preventDefault();
            });
            $('#btn-login-light').on('click', function(e) {
                $('body').attr('class', 'login-layout light-login');
                $('#id-text2').attr('class', 'grey');
                $('#id-company-text').attr('class', 'blue');

                e.preventDefault();
            });
            $('#btn-login-blur').on('click', function(e) {
                $('body').attr('class', 'login-layout blur-login');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'light-blue');

                e.preventDefault();
            });

        });
    </script>
</body>

</html>
