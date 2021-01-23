<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> 
        @yield('title')
    </title>
    <meta name="description" content="">
    <meta name="DevelopBy" content="Smart Software Ltd, www.smartsoftware.com.bd">
   {{--  <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ ('uploads/siteconfig/')}}/{{!empty($siteConfig->faviconImage)?$siteConfig->faviconImage:''}}"> 
     <!--animation-->
    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.carousel.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.theme.default.min.css') }}"> 
     
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <style>
    @import url('https://fonts.maateen.me/kalpurush/font.css');
    body{
        font-family: 'Kalpurush', Arial, sans-serif !important;
    }
    </style>
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    